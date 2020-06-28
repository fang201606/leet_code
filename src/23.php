<?php

/**
 * Class Solution
 * 23.合并K个排序链表
 * @link https://leetcode-cn.com/problems/merge-k-sorted-lists/
 */
class Solution
{

    /**
     * 顺序合并
     * @link https://leetcode-cn.com/problems/merge-k-sorted-lists/solution/he-bing-kge-pai-xu-lian-biao-by-leetcode-solutio-2/
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $ans = null;
        for ($i = 0; $i < count($lists); $i++) {
            $ans = $this->mergeTwoLists($ans, $lists[$i]);
        }
        return $ans;
    }

    private function mergeTwoLists($l1, $l2)
    {
        if ($l1 == null) {
            return $l2;
        } elseif ($l2 == null) {
            return $l1;
        } elseif ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}


class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}