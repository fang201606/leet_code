<?php

/**
 * Class RecentCounter
 * 933.最近的请求次数
 * @link https://leetcode-cn.com/problems/number-of-recent-calls/
 */
class RecentCounter
{
    private $queue;
    private $sum = 0;

    /**
     */
    function __construct()
    {
        $this->queue = new SplQueue();
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        $this->sum++;
        while (!$this->queue->isEmpty() && $t - $this->queue->bottom() > 3000) {
            $this->sum--;
            $this->queue->dequeue();
        }
        $this->queue->enqueue($t);
        return $this->sum;
    }
}

$obj = new RecentCounter();
echo $ret_1 = $obj->ping(1) . PHP_EOL;
echo $ret_1 = $obj->ping(100) . PHP_EOL;
echo $ret_1 = $obj->ping(3001) . PHP_EOL;
echo $ret_1 = $obj->ping(3002) . PHP_EOL;
