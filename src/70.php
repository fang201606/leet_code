<?php

/**
 * Class Solution
 * 70.爬楼梯
 * @link https://leetcode-cn.com/problems/climbing-stairs/
 */
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n < 3) {
            return $n;
        }
        $a = $b = $c = 1;
        for ($i = 2; $i <= $n; $i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }

        return $c;
    }
}

$obj = new Solution();
$n = 6;
echo $obj->climbStairs($n);