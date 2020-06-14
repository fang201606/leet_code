<?php

/**
 * Class Solution
 * 1300. 转变数组后最接近目标值的数组和
 * @link https://leetcode-cn.com/problems/sum-of-mutated-array-closest-to-target/
 */
class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $target
     * @return Integer
     */
    function findBestValue($arr, $target)
    {
        sort($arr);
        $n = count($arr);
        $prefix = [0];
        for ($i = 1; $i <= $n; $i++) {
            $prefix[$i] = $prefix[$i - 1] + $arr[$i - 1];
        }
        $ans = 0;
        $diff = $target;
        for ($i = 0; $i <= $arr[$n - 1]; $i++) {
            $min_index = 0;
            $max_index = $n - 1;
            while ($min_index < $max_index) {
                $mid = floor(($min_index + $max_index) / 2);
                if ($arr[$mid] >= $i) {
                    $max_index = $mid;
                } else {
                    $min_index = $mid + 1;
                }
            }
            $index = $min_index;

            $cut = $prefix[$index] + ($n - $index) * $i;
            if (abs($cut - $target) < $diff) {
                $ans = $i;
                $diff = abs($cut - $target);
            }
        }

        return $ans;
    }
}

$arr = [1547, 83230, 57084, 93444, 70879];
$target = 71237;
$obj = new Solution();
echo $obj->findBestValue($arr, $target);