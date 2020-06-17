<?php

/**
 * Class Solution
 * 6.Z字形变换
 * @link https://jsbodi.coding.net/p/hitaxi-admin-v2
 */
class Solution
{

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        if ($numRows == 1) return $s;
        $n = strlen($s);
        $rows = array_fill(0, min($numRows, $n), '');
        $cur_row = 0;
        $going_down = false;
        for ($i = 0; $i < $n; $i++) {
            $rows[$cur_row] .= $s[$i];
            if ($cur_row == 0 || $cur_row == $numRows - 1) {
                $going_down = !$going_down;
            }
            $cur_row += $going_down ? 1 : -1;
        }
        $ans = '';
        foreach ($rows as $v) {
            $ans .= $v;
        }
        return $ans;
    }
}

$obj = new Solution();
echo $obj->convert('LEETCODEISHIRING', 4);