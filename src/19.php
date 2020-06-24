<?php

/**
 * Class Solution
 * 19.删除链表的倒数第N个节点
 * @link https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/
 */
class Solution
{

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $dump = new ListNode();
        $dump->next = $head;
        $left = $right = $dump;
        for ($i = 0; $i < $n + 1; $i++) {
            $right = $right->next;
        }
        while ($right) {
            $left = $left->next;
            $right = $right->next;
        }
        $left->next = $left->next->next;
        return $dump->next;
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

$obj = new Solution();
$obj->removeNthFromEnd([1, 2], 2);