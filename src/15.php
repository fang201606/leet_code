<?php

/**
 * Class Solution
 * 15.三数之和
 * @link https://leetcode-cn.com/problems/3sum/
 */
class Solution
{
    /**
     * 暴力解法,三重循环,超时未通过
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        if (!$nums || ($len = count($nums)) < 3) {
            return [];
        }
        $res = [];
        sort($nums);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                for ($k = $j + 1; $k < $len; $k++) {
                    if (($nums[$i] + $nums[$j] + $nums[$k]) == 0) {
                        $item = [$nums[$i], $nums[$j], $nums[$k]];
                        if (!in_array($item, $res)) {
                            $res[] = $item;
                        }
                    }
                }
            }
        }
        return $res;
    }

    /**
     * 排序+双指针
     * @param $nums
     * @return array
     */
    public function threeSum1($nums)
    {
        $n = count($nums);
        sort($nums);
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1]) {
                continue;
            }
            $third = $n - 1;
            $target = -$nums[$i];
            for ($second = $i + 1; $second < $n; $second++) {
                if ($second > $i + 1 && $nums[$second] == $nums[$second - 1]) {
                    continue;
                }
                while ($second < $third && $nums[$second] + $nums[$third] > $target) {
                    --$third;
                }
                if ($second == $third) {
                    break;
                }
                if ($nums[$second]+$nums[$third]==$target) {
                    $res[] = [$nums[$i], $nums[$second], $nums[$third]];
                }
            }
        }
        return $res;
    }
}

$obj = new Solution();
//$nums = [-1, 0, 1, 2, -1, -4];
$nums = [-4, -2, -2, -2, 0, 1, 2, 2, 2, 3, 3, 4, 4, 6, 6];
$res = $obj->threeSum1($nums);
print_r($res);