<?php

/**
 * Class Solution
 * 面试题 02.01.移除重复节点
 * @link https://leetcode-cn.com/problems/remove-duplicate-node-lcci/
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeDuplicateNodes($head)
    {
        $ans = [];
        while (true) {
            $val = $head->val;
            if (!in_array($val, $ans)) {
                $ans[] = $val;
            }
            if (is_null($head->next)) {
                break;
            }
            $head = $head->next;
        }
        return $this->array2List($ans);
    }

    public function array2List($arr)
    {
        $list[] = new ListNode(array_shift($arr));
        foreach ($arr as $v) {
            $list[] = end($list)->next = new ListNode($v);
        }

        return $list[0];
    }

    /**
     * @param $head
     * @return mixed
     * @link https://leetcode-cn.com/problems/remove-duplicate-node-lcci/solution/yi-chu-zhong-fu-jie-dian-by-leetcode-solution/
     */
    public function removeDuplicateNodes1($head)
    {
        if ($head == null) {
            return $head;
        }
        $occurred = [];
        $occurred[] = $head->val;
        $pos = $head;
        while ($pos->next != null) {
            $cur = $pos->next;
            if (!in_array($cur->val, $occurred)) {
                $occurred[] = $cur->val;
                $pos = $pos->next;
            } else {
                $pos->next = $pos->next->next;
            }
        }
        $pos->next = null;
        return $head;
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
$head = $obj->array2List([1, 2, 3, 3, 2, 1]);
$res = $obj->removeDuplicateNodes1($head);
print_r($res);