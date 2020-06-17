<?php

/**
 * Class Solution
 * 8.字符串转换整数 (atoi)
 * @link https://leetcode-cn.com/problems/string-to-integer-atoi/
 */
class Solution
{
    private $int_min = 0;
    private $int_max = 0;
    private $state = 'start';
    private $sign = 1;
    private $ans = 0;
    private $table = [
        'start' => ['start', 'signed', 'in_number', 'end'],
        'signed' => ['end', 'end', 'in_number', 'end'],
        'in_number' => ['', '', 'in_number', ''],
        'end' => ['end', 'end', 'end', 'end']
    ];

    public function __construct()
    {
        $this->int_max = pow(2, 31) - 1;
        $this->int_min = -pow(2, 31);
    }

    private function getCol($c)
    {
        if ($c == ' ') {
            return 0;
        } elseif ($c == '+' || $c == '-') {
            return 1;
        } elseif (is_numeric($c)) {
            return 2;
        }
        return 3;
    }

    private function getS($c)
    {
        $this->state = $this->table[$this->state][$this->getCol($c)];
        if ($this->state == 'in_number') {
            $this->ans = $this->ans * 10 + intval($c);
            $this->ans = $this->sign == 1 ? min($this->ans, $this->int_max) : min($this->ans, -$this->int_min);
        } elseif ($this->state == 'signed') {
            $this->sign = $c == '+' ? 1 : -1;
        }
    }

    /**
     * 普通方法
     * @param String $str
     * @return Integer
     */
    function myAtoi($str)
    {
        $int_max = 2147483647;
        $int_min = -2147483648;
        $str = trim($str);
        if (empty($str)) return 0;
        if (!is_numeric($str[0]) && $str[0] != '-' && $str[0] != '+') return 0;

        $ans = $str[0];
        for ($i = 1; $i < strlen($str); $i++) {
            if (is_numeric($str[$i])) {
                $ans .= $str[$i];
            } else {
                break;
            }
        }
        $ans = intval($ans);
        $ans = min($int_max, $ans);
        $ans = max($int_min, $ans);
        return $ans;
    }

    /**
     * 自动机解法
     * @param $str
     * @return float|int
     */
    public function myAtoi1($str)
    {
        for ($i=0;$i<strlen($str);$i++) {
            $this->getS($str[$i]);
        }
        return $this->sign * $this->ans;
    }
}

$obj = new Solution();
echo $obj->myAtoi1("-11111111111111112a");
