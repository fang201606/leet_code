<?php

/**
 * Class Solution
 * 16.最接近的三数之和
 * @link https://leetcode-cn.com/problems/3sum-closest/
 */
class Solution
{

    /**
     * 双指针法
     * @link https://leetcode-cn.com/problems/3sum-closest/solution/hua-jie-suan-fa-16-zui-jie-jin-de-san-shu-zhi-he-b/
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        sort($nums);
        $n = count($nums);
        $ans = PHP_INT_MIN;
        for ($i = 0; $i < count($nums); $i++) {
            $left = $i + 1;
            $right = $n - 1;
            while ($left < $right) {
                $sum = $nums[$i] + $nums[$left] + $nums[$right];
                if (abs($target - $sum) < abs($target - $ans)) {
                    $ans = $sum;
                }
                if ($sum < $target) {
                    $left++;
                } elseif ($sum > $target) {
                    $right--;
                } else {
                    return $ans;
                }
            }
        }

        return $ans;
    }
}

$obj = new Solution();
echo $obj->threeSumClosest([-1, 2, 1, -4, 1], 3);