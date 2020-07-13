<?php

/**
 * Class Solution
 * 350. 两个数组的交集 II
 * @link https://leetcode-cn.com/problems/intersection-of-two-arrays-ii/
 */
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        $nums = [];
        foreach ($nums1 as $val) {
            $index = array_search($val, $nums2);
            if ($index !== false) {
                $nums[] = $val;
                unset($nums2[$index]);
            }
        }
        return $nums;
    }
}

$obj = new Solution();
$res = $obj->intersect([1, 2, 2, 1], [2]);
print_r($res);