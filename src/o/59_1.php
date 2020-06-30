<?php

/**
 * Class Solution
 * 剑指 Offer 59 - I. 滑动窗口的最大值
 * @link https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof/
 */
class Solution
{

    /**
     * 循环解法
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k)
    {
        $answer = [];
        for ($i = 0; $i <= count($nums) - $k; $i++) {
            $answer[] = max(array_slice($nums, $i, $k));
        }

        return $answer;
    }

    /**
     * 链表解决
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow1($nums, $k)
    {
        $queue = new SplQueue();
        $answer = [];
        for ($j = 0, $i = 1 - $k; $j < count($nums); $j++, $i++) {
            if ($i > 0 && $queue->bottom() == $nums[$i - 1]) {
                $queue->dequeue();
            }
            while (!$queue->isEmpty() && $queue->top() < $nums[$j]) {
                $queue->pop();
            }
            $queue->enqueue($nums[$j]);
            if ($i >= 0) {
                $answer[] = $queue->bottom();
            }
        }

        return $answer;
    }
}

$obj = new Solution();
$res = $obj->maxSlidingWindow1([1, 3, 1, 2, 0, 5], 3);
print_r($res);