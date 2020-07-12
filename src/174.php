<?php

/**
 * Class Solution
 * 174. 地下城游戏
 * @link https://leetcode-cn.com/problems/dungeon-game/
 */
class Solution
{

    /**
     * @param Integer[][] $dungeon
     * @return Integer
     */
    function calculateMinimumHP($dungeon)
    {
        $n = count($dungeon);
        $m = count(current($dungeon));
        $dp = array_fill(0, $n + 1, array_fill(0, $m + 1, PHP_INT_MAX));
        $dp[$n][$m - 1] = $dp[$n - 1][$m] = 1;
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $m - 1; $j >= 0; $j--) {
                $min = min($dp[$i + 1][$j], $dp[$i][$j + 1]);
                $dp[$i][$j] = max($min - $dungeon[$i][$j], 1);
            }
        }
        return $dp[0][0];
    }
}

$obj = new Solution();
echo $obj->calculateMinimumHP([[-2, -3, 3], [-5, -10, 1], [10, 30, -5]]);