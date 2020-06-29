<?php

/**
 * Class MyCircularQueue
 * 622.设计循环队列
 * @link https://leetcode-cn.com/problems/design-circular-queue/
 */
class MyCircularQueue
{
    private $head = 0;
    private $tail = 0;
    private $k;
    public $data = [];


    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k)
    {
        $this->k = $k;
        $this->head = 0;
        $this->tail = 0;
    }

    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value)
    {
        if ($this->isFull()) {
            return false;
        }
        if ($this->isEmpty()) {
            $this->head = 1;
        }
        $tail = $this->tail + 1;
        if ($tail > $this->k) {
            $tail = 1;
        }
        $this->tail = $tail;
        $this->data[$this->tail] = $value;
        return true;
    }

    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue()
    {
        if ($this->isEmpty()) {
            return false;
        }
        if ($this->head == $this->tail) {
            $this->head = 0;
            $this->tail = 0;
        } else {
            $head = $this->head + 1;
            if ($head > $this->k) {
                $head = 1;
            }
            $this->head = $head;
        }
        return true;
    }

    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->data[$this->head];
    }

    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->data[$this->tail];
    }

    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty()
    {
        if ($this->head == $this->tail && $this->head == 0) {
            return true;
        }
        return false;
    }

    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull()
    {
        $tail = $this->tail + 1;
        if ($tail > $this->k) {
            $tail = 1;
        }
        if ($tail == $this->head) {
            return true;
        }
        return false;
    }
}


//$obj = new MyCircularQueue(3);
//var_dump($obj->enQueue(1));
//var_dump($obj->enQueue(2));
//var_dump($obj->enQueue(3));
//var_dump($obj->enQueue(4));
//var_dump($obj->Rear());
//var_dump($obj->isFull());
//var_dump($obj->deQueue());
//var_dump($obj->enQueue(4));
//var_dump($obj->Rear());

$obj = new SplQueue();
$obj->dequeue();
