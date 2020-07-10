<?php

/**
 * Class Solution
 * 309. 最佳买卖股票时机含冷冻期
 * @link https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-with-cooldown/
 */
class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $dp[] = [-$prices[0], 0, 0];
        $n = count($prices);
        if ($n == 0) return 0;
        for ($i = 1; $i < $n; $i++) {
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][2] - $prices[$i]);
            $dp[$i][1] = $dp[$i - 1][0] + $prices[$i];
            $dp[$i][2] = max($dp[$i - 1][1], $dp[$i - 1][2]);
        }
        return max($dp[$n - 1][1], $dp[$n - 1][2]);
    }
}

$obj = new Solution();
echo $obj->maxProfit([1, 2, 3, 0, 2]);