<?php

/**
 * Class Solution
 * 200.岛屿数量
 * @link https://leetcode-cn.com/problems/number-of-islands/
 */
class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $nr = count($grid);
        if ($nr == 0) return 0;
        $nc = count(current($grid));
        $num_islands = 0;
        for ($i = 0; $i < $nr; $i++) {
            for ($j = 0; $j < $nc; $j++) {
                // 表示当前是个岛屿
                if ($grid[$i][$j] == '1') {
                    $num_islands += 1;
                    $grid[$i][$j] = 0;
                    $neighbors = new SplQueue();
                    $neighbors->push([$i, $j]); //加入队列
                    while (!$neighbors->isEmpty()) {
                        $rc = $neighbors->pop();
                        $col = current($rc);
                        $row = end($rc);
                        // 左
                        if ($col - 1 >= 0 && $grid[$col - 1][$row] == '1') {
                            $neighbors->push([$col - 1, $row]);
                            $grid[$col - 1][$row] = 0;
                        }
                        // 上
                        if ($row - 1 >= 0 && $grid[$col][$row - 1] == '1') {
                            $neighbors->push([$col, $row - 1]);
                            $grid[$col][$row - 1] = 0;
                        }
                        // 右
                        if ($col + 1 <= $nr && $grid[$col + 1][$row] == '1') {
                            $neighbors->push([$col + 1, $row]);
                            $grid[$col + 1][$row] = 0;
                        }
                        // 下
                        if ($row + 1 <= $nc && $grid[$col][$row + 1] == '1') {
                            $neighbors->push([$col, $row + 1]);
                            $grid[$col][$row + 1] = 0;
                        }
                    }
                }
            }
        }
        return $num_islands;
    }
}

$obj = new Solution();
echo $obj->numIslands([["1", "1", "1", "1", "0"], ["1", "1", "0", "1", "0"], ["1", "1", "0", "0", "0"], ["0", "0", "0", "0", "0"]]);