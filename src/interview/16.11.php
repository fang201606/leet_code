<?php

/**
 * Class Solution
 * 面试题 16.11. 跳水板
 * @link https://leetcode-cn.com/problems/diving-board-lcci/
 */
class Solution
{

    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    function divingBoard($shorter, $longer, $k)
    {
        $min = $shorter * $k;
        $mid = $longer - $shorter;
        $res = [];
        if ($k == 0) return [];
        if ($mid == 0) {
            $res[] = $min;
        } else {
            for ($i = 0; $i <= $k; $i++) {
                $res[] = $min + $mid * $i;
            }
        }
        return $res;
    }
}

$obj = new Solution();
$res = $obj->divingBoard(1, 1, 1000000);
print_r($res);