<?php

/**
 * Class Solution
 * 41.缺失的第一个正数
 * @link https://leetcode-cn.com/problems/first-missing-positive/
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums)
    {
        for ($i = 1; $i <= count($nums) + 1; $i++) {
            if (!in_array($i, $nums)) {
                return $i;
            }
        }
        return 1;
    }

    /**
     * 哈希表解法
     * @link https://leetcode-cn.com/problems/first-missing-positive/solution/que-shi-de-di-yi-ge-zheng-shu-by-leetcode-solution/
     * @param $nums
     * @return int
     */
    public function firstMissingPositive1($nums)
    {
        $n = count($nums);
        foreach ($nums as $key => $num) {
            if ($num <= 0) {
                $nums[$key] = $n + 1;
            }
        }
        for ($i = 0; $i < $n; $i++) {
            $num = abs($nums[$i]);
            if ($num <= $n) {
                $nums[$num - 1] = -abs($nums[$num - 1]);
            }
        }
        for ($i = 0; $i < $n; $i++) {
            if ($nums[$i] > 0) {
                return $i + 1;
            }
        }
        return $n + 1;
    }
}

$obj = new Solution();
echo $obj->firstMissingPositive1([1, 2, 0]);