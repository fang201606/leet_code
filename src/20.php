<?php

/**
 * Class Solution
 * 20.有效的括号
 * @link https://leetcode-cn.com/problems/valid-parentheses/
 */
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $mapping = [
            '(' => 1, '[' => 2, '{' => 3,
            ')' => -1, ']' => -2, '}' => -3
        ];
        $arr = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $current_value = $mapping[$s[$i]];
            if ($current_value > 0) {
                $arr[] = $current_value;
            } else {
                $last_value = intval(array_pop($arr));
                if ($last_value + $current_value != 0) {
                    return false;
                }
            }
        }
        return count($arr) > 0 ? false : true;
    }
}

$obj = new Solution();
$res = $obj->isValid('(]');
var_dump($res);