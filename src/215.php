<?php

/**
 * Class Solution
 * 215.数组中的第K个最大元素
 * @link https://leetcode-cn.com/problems/kth-largest-element-in-an-array/
 */
class Solution
{

    /**
     * 排序后取值
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $n = count($nums);
        sort($nums);
        return $nums[$n - $k];
    }

    /**
     * 快排，分治算法
     * @link https://leetcode-cn.com/problems/kth-largest-element-in-an-array/solution/shu-zu-zhong-de-di-kge-zui-da-yuan-su-by-leetcode-/
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest1($nums, $k)
    {
        return $this->quickSelect($nums, 0, count($nums) - 1, count($nums) - $k);
    }

    private function quickSelect(&$nums, $l, $r, $k)
    {
        $q = $this->randomPartition($nums, $l, $r);
        if ($q == $k) {
            return $nums[$q];
        } else {
            return $q < $k ? $this->quickSelect($nums, $q + 1, $r, $k) : $this->quickSelect($nums, $l, $q - 1, $k);
        }
    }

    private function randomPartition(&$nums, $l, $r)
    {
        $i = rand(0, $r - $l) + $l;
        $this->swap($nums, $i, $r);
        return $this->partition($nums, $l, $r);
    }

    private function partition(&$nums, $l, $r)
    {
        $x = $nums[$r];
        $i = $l - 1;
        for ($j = $l; $j < $r; $j++) {
            if ($nums[$j] <= $x) {
                $this->swap($nums, ++$i, $j);
            }
        }
        $this->swap($nums, $i + 1, $r);
        return $i + 1;
    }

    private function swap(&$nums, $i, $j)
    {
        $temp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $temp;
    }
}

$obj = new Solution();
$res = $obj->findKthLargest1([1], 1);
var_dump($res);