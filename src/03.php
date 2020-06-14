<?php

/**
 * Class Solution
 * 3.无重复字符的最长子串
 * @link https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 */
class Solution
{

    /**
     * 暴力破解,双重for循环
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $target = 0;
        $n = strlen($s);
        for ($i = 0; $i < $n; $i++) {
            $item = [$s[$i]];
            $j = $i + 1;
            while ($j < $n && !in_array($s[$j], $item)) {
                $item[] = $s[$j];
                $j++;
            }
            if (count($item) > $target) {
                $target = count($item);
            }
        }

        return $target;
    }

    // TODO 滑动窗口解决问题
}

$s = '';
$obj = new Solution();
echo $obj->lengthOfLongestSubstring($s);