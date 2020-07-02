<?php

/**
 * Class Solution
 * 面试题 16.18.模式匹配
 * @link https://leetcode-cn.com/problems/pattern-matching-lcci/
 */
class Solution
{

    /**
     * @link https://leetcode-cn.com/problems/pattern-matching-lcci/solution/mo-shi-pi-pei-by-leetcode-solution/
     * @param String $pattern
     * @param String $value
     * @return Boolean
     */
    function patternMatching($pattern, $value)
    {
        $count_a = 0;
        $count_b = 0;
        for ($i = 0; $i < strlen($pattern); $i++) {
            if ($pattern[$i] == 'a') {
                $count_a++;
            } else {
                $count_b++;
            }
        }
        if ($count_a < $count_b) {
            $temp = $count_a;
            $count_a = $count_b;
            $count_b = $temp;
            for ($i = 0; $i < strlen($pattern); $i++) {
                $pattern[$i] = $pattern[$i] == 'a' ? 'b' : 'a';
            }
        }
        if (empty($value)) {
            return $count_b == 0;
        }
        if (empty($pattern)) {
            return false;
        }
        for ($len_a = 0; $count_a * $len_a <= strlen($value); $len_a++) {
            $rest = strlen($value) - $count_a * $len_a;
            if (($count_b == 0 && $rest == 0) || ($count_b != 0 && $rest % $count_b == 0)) {
                $len_b = ($count_b == 0 ? 0 : intval($rest / $count_b));
                $pos = 0;
                $correct = true;
                $value_a = '';
                $value_b = '';
                for ($i = 0; $i < strlen($pattern); $i++) {
                    $ch = $pattern[$i];
                    if ($ch == 'a') {
                        $sub = substr($value, $pos, $len_a);
                        if (strlen($value_a) == 0) {
                            $value_a = $sub;
                        } elseif ($value_a != $sub) {
                            $correct = false;
                            break;
                        }
                        $pos += $len_a;
                    } else {
                        $sub = substr($value, $pos, $len_b);
                        if (strlen($value_b) == 0) {
                            $value_b = $sub;
                        } elseif ($value_b != $sub) {
                            $correct = false;
                            break;
                        }
                        $pos += $len_b;
                    }
                }
                if ($correct && $value_a != $value_b) {
                    return true;
                }
            }
        }
        return false;
    }
}

$obj = new Solution();
$res = $obj->patternMatching('bbb', 'xxxxxx');
var_dump($res);