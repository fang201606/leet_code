<?php

/**
 * Class Solution
 * 10.正则表达式匹配
 * @link https://leetcode-cn.com/problems/regular-expression-matching/
 */
class Solution
{
    /**
     * 回溯法
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        if (empty($p)) return empty($s);
        $first_match = (!empty($s) && ($p[0] == $s[0] || $p[0] == '.'));
        if (strlen($p) >= 2 && $p[1] == '*') {
            return $this->isMatch($s, substr($p, 2)) || ($first_match && $this->isMatch(substr($s, 1), $p));
        } else {
            return $first_match && $this->isMatch(substr($s, 1), substr($p, 1));
        }
    }

    /**
     * TODO 动态规划法
     * @link https://leetcode-cn.com/problems/regular-expression-matching/solution/zheng-ze-biao-da-shi-pi-pei-by-leetcode/
     * @param $s
     * @param $p
     */
    public function isMatch1($s, $p)
    {

    }
}

$obj = new Solution();
$table = [
    ['aa', 'a'], //false
    ['aa', 'a*'], //true
    ['ab', '.*'], //true
    ['aab', 'c*a*b'], //true
    ['mississippi', 'mis*is*p*.'], //false
    ['assa', 'assa'] //true
];

$s = $table[1];
$res = $obj->isMatch($s[0], $s[1]);
var_dump($res);