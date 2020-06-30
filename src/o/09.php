<?php

/**
 * Class CQueue
 * 剑指Offer 09.用两个栈实现队列
 * @link https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/
 */
class CQueue
{
    private $stack1;
    private $stack2;

    /**
     */
    function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->stack1->push($value);
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }
        if ($this->stack2->isEmpty()) {
            return -1;
        } else {
            return $this->stack2->pop();
        }
    }
}

$obj = new CQueue();
echo $ret_2 = $obj->deleteHead() . PHP_EOL;
echo $obj->appendTail(5) . PHP_EOL;
echo $obj->appendTail(2) . PHP_EOL;
echo $ret_2 = $obj->deleteHead() . PHP_EOL;
echo $ret_2 = $obj->deleteHead() . PHP_EOL;