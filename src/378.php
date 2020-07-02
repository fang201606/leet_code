<?php

/**
 * Class Solution
 * 378. 有序矩阵中第K小的元素
 * @link https://leetcode-cn.com/problems/kth-smallest-element-in-a-sorted-matrix/
 */
class Solution
{

    /**
     * 直接合并数据，然后排序，最后得出值
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($matrix, $k)
    {
        $arr = [];
        foreach ($matrix as $item) {
            $arr = array_merge($arr, $item);
        }
        sort($arr);

        return $arr[$k - 1];
    }

    /**
     * 归并排序\二分查找
     * @link https://leetcode-cn.com/problems/kth-smallest-element-in-a-sorted-matrix/solution/you-xu-ju-zhen-zhong-di-kxiao-de-yuan-su-by-leetco/
     * @param Integer[][] $matrix
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest1($matrix, $k)
    {
        return 1;
    }
}

$obj = new Solution();
echo $obj->kthSmallest([[1, 5, 9], [10, 11, 13], [12, 13, 15]], 8);