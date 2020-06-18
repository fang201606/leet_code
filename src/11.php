<?php

/**
 * Class Solution
 * 11.盛最多水的容器
 * @link https://leetcode-cn.com/problems/container-with-most-water/
 */
class Solution
{

    /**
     * 暴力破解法，超时未通过
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $n = count($height);
        $ans = 0;
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $val = ($j - $i) * min($height[$i], $height[$j]);
                $ans = max($ans, $val);
            }
        }
        return $ans;
    }

    /**
     * 双指针解法
     * @param array $height
     * @return int
     */
    public function maxArea1($height)
    {
        $i = 0;
        $j = count($height) - 1;
        $ans = 0;
        while ($i < $j) {
            $ans = max($ans, ($j - $i) * min($height[$i], $height[$j]));

            if ($height[$i] < $height[$j]) {
                $i++;
            } else {
                $j--;
            }
        }

        return $ans;
    }
}

$obj = new Solution();
echo $obj->maxArea1([7, 1, 1, 1, 1, 1, 10, 8]);