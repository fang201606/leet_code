<?php

/**
 * Class Solution
 * 14.最长公共前缀
 * @link https://leetcode-cn.com/problems/longest-common-prefix/
 */
class Solution
{

    /**
     * 暴力破解
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        if (count($strs) == 0 || empty($strs)) return '';
        $strs_length = count($strs);
        $str = '';
        $j = 0;
        while (true) {
            if ($j > strlen($strs[0]) - 1) {
                break;
            }
            $current_val = $strs[0][$j];
            for ($i = 1; $i < $strs_length; $i++) {
                if ($j > strlen($strs[$i]) - 1) {
                    break;
                }
                if ($strs[$i][$j] != $current_val) {
                    break;
                }
            }
            if ($i != $strs_length) {
                break;
            }
            $j++;
            $str .= $current_val;
        }
        return $str;
    }
}

$obj = new Solution();
var_dump($obj->longestCommonPrefix(["flower"]));
var_dump($obj->longestCommonPrefix(["a", '']));
var_dump($obj->longestCommonPrefix(["flower","flow","flight"]));
var_dump($obj->longestCommonPrefix(["dog","racecar","car"]));