<?php

/**
 * Class Solution
 * 1014.最佳观光组合
 * @link https://leetcode-cn.com/problems/best-sightseeing-pair/
 */
class Solution
{

    /**
     * 暴力破解，超时未通过
     * @param Integer[] $A
     * @return Integer
     */
    function maxScoreSightseeingPair($A)
    {
        $n = count($A);
        $max = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                $current = $A[$i] + $A[$j] + $i - $j;
                if ($current > $max) {
                    $max = $current;
                }
            }
        }
        return $max;
    }

    /**
     * 参考题解枚举法
     * @link https://leetcode-cn.com/problems/best-sightseeing-pair/solution/zui-jia-guan-guang-zu-he-by-leetcode-solution/
     * @param array $A
     * @return integer
     */
    public function maxScoreSightseeingPair1($A)
    {
        $n = count($A);
        $mx = $A[0] + 0;
        $ans = 0;
        for ($j = 1; $j < $n; $j++) {
            $ans = max($ans, $A[$j] - $j + $mx);
            $mx = max($mx, $A[$j] + $j);
        }

        return $ans;
    }
}

$obj = new Solution();
echo $obj->maxScoreSightseeingPair1([8, 1, 5, 2, 6]);