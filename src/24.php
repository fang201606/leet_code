<?php

/**
 * Class Solution
 * 24.两两交换链表中的节点
 * @link https://leetcode-cn.com/problems/swap-nodes-in-pairs/
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        if (is_null($head) || is_null($head->next)) {
            return $head;
        }
        $first_node = $head;
        $second_node = $head->next;
        $first_node->next = $this->swapPairs($second_node->next);
        $second_node->next = $first_node;
        return $second_node;
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
