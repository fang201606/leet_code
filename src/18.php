<?php

/**
 * Class Solution
 * 18.四数之和
 * @link https://leetcode-cn.com/problems/4sum/
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        sort($nums);
        $ans = [];
        $length = count($nums);
        for ($a = 0; $a < $length - 3; $a++) {
            if ($a > 0 && $nums[$a] == $nums[$a - 1]) continue;
            for ($b = $a + 1; $b < $length - 2; $b++) {
                if ($b > $a + 1 && $nums[$b] == $nums[$b] - 1) continue;
                $c = $b + 1;
                $d = $length - 1;
                while ($c < $d) {
                    $sum = $nums[$a] + $nums[$b] + $nums[$c] + $nums[$d];
                    if ($sum < $target) {
                        $c++;
                    } else if ($sum > $target) {
                        $d--;
                    } else {
                        $ans_val = [$nums[$a], $nums[$b], $nums[$c], $nums[$d]];
                        if (!in_array($ans_val, $ans)) {
                            $ans[] = $ans_val;
                        }
                        //确保nums[c] 改变了
                        while ($c < $d && $nums[$c + 1] == $nums[$c]) {
                            $c++;
                        }
                        //确保nums[d] 改变了
                        while ($c < $d && $nums[$d - 1] == $nums[$d]) {
                            $d--;
                        }
                        $c++;
                        $d--;
                    }
                }
            }

        }
        return $ans;
    }
}

$obj = new Solution();
$res = $obj->fourSum([-3, -2, -1, 0, 0, 1, 2, 3], 0);
print_r($res);