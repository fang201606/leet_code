<?php

/**
 * Class Solution
 * 17.电话号码的字母组合
 * @link https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number/
 */
class Solution
{
    /**
     * 回溯法
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        $combination = [
            2 => ['a', 'b', 'c'],
            3 => ['d', 'e', 'f'],
            4 => ['g', 'h', 'i'],
            5 => ['j', 'k', 'l'],
            6 => ['m', 'n', 'o'],
            7 => ['p', 'q', 'r', 's'],
            8 => ['t', 'u', 'v'],
            9 => ['w', 'x', 'y', 'z']
        ];
        $ans = [];
        for ($i = 0; $i < strlen($digits); $i++) {
            $ans = $this->toString($ans, $combination[$digits[$i]]);
        }
        return $ans;
    }

    private function toString($ans, $val)
    {
        $res = [];
        if (count($ans) < 1) return $val;
        foreach ($ans as $v) {
            foreach ($val as $v1) {
                $res[] = $v . $v1;
            }
        }

        return $res;
    }
}

$obj = new Solution();
$res = $obj->letterCombinations('23');
print_r($res);