<?php

/**
 * Class Solution
 * 125.验证回文串
 * @link https://leetcode-cn.com/problems/valid-palindrome/
 */
class Solution
{
    /**
     * 双指针解法
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        if (strlen($s) < 2) return true;
        $s = strtolower($s) ;
        $l = strlen($s) - 1;
        $i = 0;
        $ans = true;
        while ($i < $l) {
            while (preg_match('/^[a-z|0-9]$/', $s[$i]) != 1 && $i < $l) {
                $i++;
            }
            while (preg_match('/^[a-z|0-9]$/', $s[$l]) != 1 && $i < $l) {
                $l--;
            }
            if ($s[$i++] != $s[$l--]) {
                $ans = false;
                break;
            }
        }
        return $ans;
    }
}

$obj = new Solution();
$res = $obj->isPalindrome(".,");
var_dump($res);