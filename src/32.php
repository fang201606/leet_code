<?php

/**
 * Class Solution
 * 32. 最长有效括号
 * @link https://leetcode-cn.com/problems/longest-valid-parentheses/
 */
class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $maxans = 0;
        $dp = array_fill(0, strlen($s), 0);

        for ($i = 1; $i < strlen($s); $i++) {
            if ($s[$i] == ')') {
                if ($s[$i - 1] == '(') {
                    $dp[$i] = ($i >= 2 ? $dp[$i - 2] : 0) + 2;
                } else if ($i - $dp[$i - 1] > 0 && $s[$i - $dp[$i - 1] - 1] == '(') {
                    $dp[$i] = $dp[$i - 1] + (($i - $dp[$i - 1]) >= 2 ? $dp[$i - $dp[$i - 1] - 2] : 0) + 2;
                }
                $maxans = max($maxans, $dp[$i]);
            }
        }
        return $maxans;

    }
}

$obj = new Solution();
echo $obj->longestValidParentheses('(()');