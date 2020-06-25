<?php

/**
 * Class Solution
 * 139.单词拆分
 * @link https://leetcode-cn.com/problems/word-break/
 */
class Solution
{

    /**
     * 解答错误，遇到特殊情况下识别错误
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict)
    {
        $word_length = [];
        foreach ($wordDict as $item) {
            in_array(strlen($item), $word_length) || $word_length[] = strlen($item);
        }
        sort($word_length);
        $i = 0;
        while ($i < strlen($s)) {
            $is_exists = false;
            foreach ($word_length as $item) {
                $str = substr($s, $i, $item);
                if (in_array($str, $wordDict)) {
                    $i += $item;
                    $is_exists = true;
                    break;
                }
            }
            if (!$is_exists) {
                return false;
            }
        }

        return true;
    }

    /**
     * 动态规划
     * @link https://leetcode-cn.com/problems/word-break/solution/dan-ci-chai-fen-by-leetcode-solution/
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak1($s, $wordDict)
    {
        $dp = array_fill(0, strlen($s) + 1, false);
        $dp[0] = true;
        for ($i = 1; $i <= strlen($s); $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($dp[$j] && in_array(substr($s, $j, ($i - $j)), $wordDict)) {
                    $dp[$i] = true;
                    break;
                }
            }
        }

        return $dp[strlen($s)];
    }
}

$obj = new Solution();
$res = $obj->wordBreak1('applepenapple', ["apple", "pen"]);
var_dump($res);