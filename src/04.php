<?php

/**
 * Class Solution
 * 4.寻找两个正序数组的中位数
 * @link https://leetcode-cn.com/problems/median-of-two-sorted-arrays/
 */
class Solution
{

    /**
     * 将两数组合并后排序,最后求中位数
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $num = array_merge($nums1, $nums2);
        sort($num);
        $n = count($num);
        $i = floor($n / 2);
        if ($n % 2 == 0) {
            $res = ($num[$i] + $num[$i - 1]) / 2;
        } else {
            $res = $num[$i];
        }
        return $res;
    }
}

$obj = new Solution();
echo $obj->findMedianSortedArrays([1, 3], [2]);