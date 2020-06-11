<?php

/**
 * Class Solution
 * 739.根据每日 气温 列表，请重新生成一个列表，对应位置的输出是需要再等待多久温度才会升高超过该日的天数。如果之后都不会升高，请在该位置用 0 来代替。
 * @link https://leetcode-cn.com/problems/daily-temperatures/
 */
class Solution
{

    /**
     * 暴力破解，超时未通过
     * @param Integer[] $T
     * @return Integer[]
     */
    function dailyTemperatures($T)
    {
        $res = [];
        $l = count($T);
        foreach ($T as $k => $v) {
            $i = $k + 1;
            $is_true = false;
            while ($i < $l) {
                if ($T[$i++] > $T[$k]) {
                    $is_true = true;
                    break;
                }
            }
            $res[] = !$is_true ? 0 : $i - $k - 1;
        }

        return $res;
    }

    /**
     * 数组模拟栈,依旧超时
     * @param $T
     * @return array
     */
    public function dailyTemperatures1($T)
    {
        $length = count($T);
        $res = array_fill(0, $length, 0);
        $st = [];
        for ($i = 0; $i < $length; $i++) {
            while (!empty($st) && ($T[$i] > $T[current($st)])) {
                $t = array_shift($st);
                $res[$t] = $i - $t;
            }
            array_unshift($st, $i);
        }

        return $res;
    }

    /**
     * PHP单调栈,未超时
     * @param $T
     * @return array
     */
    public function dailyTemperatures2($T)
    {
        $n = count($T);
        $ans = array_fill(0, $n, 0);
        if ($n == 0) return $ans;
        $stack = new SplStack();
        for ($i = 0; $i < $n; ++$i) {
            while (!$stack->isEmpty() && $T[$stack->top()] < $T[$i]) {
                // 出栈
                $top = $stack->pop();
                $ans[$top] = $i - $top;
            }

            $stack->push($i);
        }
        return $ans;
    }
}

$obj = new Solution();
$temperatures = [73, 74, 75, 71, 69, 72, 76, 73];
//$temperatures = [55,38,53,81,61,93,97,32,43,78];
$res = $obj->dailyTemperatures1($temperatures);
print_r($res);