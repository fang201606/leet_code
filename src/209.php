<?php

/**
 * Class Solution
 * 209.长度最小的子数组
 * @link https://leetcode-cn.com/problems/minimum-size-subarray-sum/
 */
class Solution
{

    /**
     * 双指针
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums)
    {
        $answer = PHP_INT_MAX;
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            $sum = 0;
            $j = $i;
            while ($j < $n) {
                $sum += $nums[$j];
                if ($sum >= $s) {
                    $answer = min($j - $i + 1, $answer);
                    break;
                }
                $j++;
            }
        }
        return ($answer == PHP_INT_MAX) ? 0 : $answer;
    }
}

$obj = new Solution();
echo $obj->minSubArrayLen(11, [1, 2, 3, 4, 5]);