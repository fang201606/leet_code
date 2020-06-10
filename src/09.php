<?php

/**
 * Class Solution
 * 9.判断一个整数是否是回文数。回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。
 * @link https://leetcode-cn.com/problems/palindrome-number/
 */
class Solution
{
    /**
     * 直接利用函数 strrev() 翻转字符串,然后判断是否相等
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        $y = strrev((string)$x);
        return ($x == $y) ? true : false;
    }

    /**
     * 利用双指针,判断数据是否对称
     * @param Integer $x
     * @return Boolean
     */
    public function isPalindrome1($x)
    {
        $x = strval($x);
        $left_index = 0;
        $right_index = strlen($x) - 1;
        while ($left_index <= $right_index) {
            if ($x[$left_index++] != $x[$right_index--]) {
                return false;
            }
        }
        return true;
    }

    /**
     * 取出后半段数字进行翻转,然后和前半段比较是否相等(数学方法)
     * @param int $x
     * @return bool
     */
    public function isPalindrome2(int $x)
    {
        if ($x < 0 || ($x % 10 == 0 && $x != 0)) {
            return false;
        }
        $reverted_number = 0;
        while ($x > $reverted_number) {
            $reverted_number = $reverted_number * 10 + $x % 10;
            $x = floor($x / 10);
        }

        return ($x == $reverted_number) || ($x == floor($reverted_number / 10));
    }
}

$obj = new Solution();
$nums = 1000021;
var_dump($obj->isPalindrome2($nums));