<?php

/**
 * Class Solution
 * 12.整数转罗马数字
 * @link https://leetcode-cn.com/problems/integer-to-roman/
 */
class Solution
{

    /**
     * 硬编码数字
     * @param Integer $num
     * @return String
     */
    function intToRoman($num)
    {
        $nums = [
            ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'],
            ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC'],
            ['', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM'],
            ['', 'M', 'MM', 'MMM']
        ];
        $ans = '';
        $n = 1000;
        while ($num > 0) {
            $val = intval($num / $n);
            $ans .= $nums[strlen($n) - 1][$val];

            $num %= $n;
            $n /= 10;
        }
        return $ans;
    }

    /**
     * 贪心算法
     * @param $num
     * @return string
     */
    public function intToRoman1($num)
    {
        $values = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
        $symbols = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
        $ans = '';
        for ($i = 0; $i < count($values) && $num >= 0; $i++) {
            while ($values[$i] <= $num) {
                $num -= $values[$i];
                $ans .= $symbols[$i];
            }
        }
        return $ans;
    }
}

$obj = new Solution();
echo $obj->intToRoman1(1245);