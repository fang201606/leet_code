<?php

/**
 * Class Solution
 * 63.不同路径 II
 * @link https://leetcode-cn.com/problems/unique-paths-ii/
 */
class Solution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        $row = count($obstacleGrid);
        $col = count(current($obstacleGrid));
        $dp = array_fill(0, $row, array_fill(0, $col, 0));
        $dp[0][0] = $obstacleGrid[0][0] == 1 ? 0 : 1;

        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                if ($obstacleGrid[$i][$j] == 1) {
                    continue;
                }
                $top = $j - 1;
                $left = $i - 1;
                if ($top >= 0) {
                    $dp[$i][$j] += $dp[$i][$top];
                }
                if ($left >= 0) {
                    $dp[$i][$j] += $dp[$left][$j];
                }
            }
        }

        return $dp[$row - 1][$col - 1];
    }
}

$obj = new Solution();
echo $obj->uniquePathsWithObstacles([[1, 0]]);