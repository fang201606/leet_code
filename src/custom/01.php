<?php

/**
 * Class Solution
 * 随机生成一个20个元素的链表，并返回中间节点的值
 */
class Solution
{
    private $linked_list = null;
    private $list_str;

    public function __construct()
    {
        for ($i = 0; $i < 7; $i++) {
            $val = rand(0, 100);
            $this->list_str = $val . ',' . $this->list_str;
            $node = new ListNode($val);
            $node->next = $this->linked_list;
            $this->linked_list = $node;
        }
        echo "链表数据: {$this->list_str}" . PHP_EOL;
    }

    /**
     * @return integer
     */
    public function getMidNode()
    {
        $node = $this->linked_list;
        $search = $this->linked_list;
        while (!is_null($node)) {
            if (isset($node->next->next)) {
                $search = $search->next;
                $node = $node->next->next;
            } else {
                $node = $node->next;
            }
        }
        return $search->val;
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
echo $obj->getMidNode();