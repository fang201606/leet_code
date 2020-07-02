<?php

/**
 * Class Solution
 * 718. 最长重复子数组
 * @link https://leetcode-cn.com/problems/maximum-length-of-repeated-subarray/
 */
class Solution
{

    /**
     * 字符串查找法，超时未通过
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer
     */
    function findLength($A, $B)
    {
        $B = implode('-', $B) . '-';
        $n = count($A);
        $answer = 0;
        for ($i = 0; $i < $n; $i++) {
            $temp = '';
            $j = $i;
            while ($j < $n) {
                $temp .= $A[$j++] . '-';
                if (preg_match("/^(.*-)?($temp)(.*-)?$/", $B)) {
                    $answer = max($answer, $j - $i);
                } else {
                    break;
                }
            }
        }

        return $answer;
    }

    /**
     * DP解法
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer
     */
    public function findLength1($A, $B)
    {
        $n = count($A);
        $m = count($B);
        $dp = array_fill(0, $n + 1, array_fill(0, $m + 1, 0));
        $ans = 0;
        for ($i = $n - 1; $i >= 0; $i--) {
            for ($j = $m - 1; $j >= 0; $j--) {
                $dp[$i][$j] = $A[$i] == $B[$j] ? $dp[$i + 1][$j + 1] + 1 : 0;
                $ans = max($ans, $dp[$i][$j]);
            }
        }
        return $ans;
    }
}

$obj = new Solution();
echo $obj->findLength1([0, 0, 0, 0, 0], [0, 0, 0, 0, 0]);