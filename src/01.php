<?php

/**
 * Class Solution
 * 1.两数之和
 * @link https://leetcode-cn.com/problems/two-sum/
 */
class Solution
{
    /**
     * 利用 array_search() 函数查找
     * @param $nums
     * @param $target
     * @return array
     */
    function twoSum($nums, $target)
    {
        foreach ($nums as $k => $v) {
            $a = $target - $v;
            $i = array_search($a, $nums);
            if ($i !== false && $i != $k) {
                return [$k, $i];
            }
        }
    }
}

$obj = new Solution();
$nums = [2, 7, 11, 15];
$target = 9;
$res = $obj->twoSum($nums, $target);
print_r($res);