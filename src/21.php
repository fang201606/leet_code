<?php

/**
 * Class Solution
 * 21.合并两个有序链表
 * @link https://leetcode-cn.com/problems/merge-two-sorted-lists/
 */
class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function mergeTwoLists($l1, $l2)
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

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists1($l1, $l2)
    {
        $answer = [];
        while (true) {
            if ($l1 == null && $l2 == null) {
                break;
            }
            if (is_null($l1)) {
                $answer[] = $l2->val;
                $l2 = $l2->next;
            } elseif (is_null($l2)) {
                $answer[] = $l1->val;
                $l1 = $l1->next;
            } elseif ($l1->val <= $l2->val) {
                $answer[] = $l1->val;
                $l1 = $l1->next;
            } else {
                $answer[] = $l2->val;
                $l2 = $l2->next;
            }
        }
        return $this->array2List($answer);
    }

    public function array2List($arr)
    {
        $list[] = new ListNode(array_shift($arr));
        foreach ($arr as $v) {
            $list[] = end($list)->next = new ListNode($v);
        }

        return $list[0];
    }
}


class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

$obj = new Solution();

$l1 = $obj->array2List([1, 2, 4]);
$l2 = $obj->array2List([1, 3, 4]);
$res = $obj->mergeTwoLists($l1, $l2);
print_r($res);