<?php

/**
 * Class Solution
 * 5.最长回文子串
 * @link https://leetcode-cn.com/problems/longest-palindromic-substring/
 */
class Solution
{

    /**
     * 暴力破解,超时未通过
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $str = '';
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 1; $j <= ($n - $i); $j++) {
                $temp = substr($s, $i, $j);
                if ($temp == strrev($temp) && (strlen($temp)) > strlen($str)) {
                    $str = $temp;
                }
            }
        }
        return $str;
    }

    /**
     * 动态规划解法
     * @param string $s
     * @return string
     * @link https://leetcode-cn.com/problems/longest-palindromic-substring/solution/zui-chang-hui-wen-zi-chuan-by-leetcode-solution/
     */
    public function longestPalindrome1($s)
    {
        $n = strlen($s);
        $dp = array_fill(0, $n, array_fill(0, $n, false));
        $ans = '';
        for ($l = 0; $l < $n; $l++) {
            for ($i = 0; $i < $n; $i++) {
                $j = $i + $l;
                if ($j >= $n) {
                    break;
                }
                if ($l == 0) {
                    $dp[$i][$j] = true;
                } elseif ($l == 1) {
                    $dp[$i][$j] = ($s[$i] == $s[$j]);
                } else {
                    $dp[$i][$j] = ($dp[$i + 1][$j - 1] && ($s[$i] == $s[$j]));
                }
                if ($dp[$i][$j] && ($l + 1 > strlen($ans))) {
                    $ans = substr($s, $i, $j - $i + 1);
                }
            }
        }
        return $ans;
    }
}

$obj = new Solution();
echo $obj->longestPalindrome1('babad');