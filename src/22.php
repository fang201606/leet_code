<?php

/**
 * Class Solution
 * 22.括号生成
 * @link https://leetcode-cn.com/problems/generate-parentheses/
 */
class Solution
{
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $ans = [];
        $this->generate($n, $n, '', $ans);
        return $ans;
    }

    private function generate($left_length, $right_length, $str, &$ans)
    {
        // 规定先取左括号，即右括号用完时表示结束
        if ($right_length > 0) {
            // 当左括号用完时，只能追加右括号
            if ($left_length == 0) {
                $this->generate($left_length, $right_length - 1, $str . ')', $ans);
            } elseif ($left_length == $right_length) { //当左右相等时，只能追加右括号
                $this->generate($left_length - 1, $right_length, $str . '(', $ans);
            } elseif ($left_length < $right_length) { //当左括号小于右括号时，即可追加左括号也可追加右括号
                $this->generate($left_length - 1, $right_length, $str . '(', $ans);
                $this->generate($left_length, $right_length - 1, $str . ')', $ans);
            }
        } else {
            $ans[] = $str;
        }
    }
}

$obj = new Solution();
$res = $obj->generateParenthesis(3);
print_r($res);