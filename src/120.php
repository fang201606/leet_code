<?php

/**
 * Class Solution
 * 120. 三角形最小路径和
 * @link https://leetcode-cn.com/problems/triangle/
 */
class Solution
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        $n = count($triangle);
        $f[0][0] = $triangle[0][0];
        for ($i = 1; $i < $n; $i++) {
            $f[$i][0] = $f[$i - 1][0] + $triangle[$i][0];
            for ($j = 1; $j < $i; $j++) {
                $f[$i][$j] = min($f[$i - 1][$j], $f[$i - 1][$j - 1]) + $triangle[$i][$j];
            }
            $f[$i][$i] = $f[$i - 1][$i - 1] + $triangle[$i][$i];
        }

        return min(end($f));
    }
}

$obj = new Solution();
echo $obj->minimumTotal([[2], [3, 4], [6, 5, 7], [4, 1, 8, 3]]);