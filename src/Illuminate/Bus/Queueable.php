<?php
namespace Illuminate\Bus;

trait Queueable { // 可对列化
    public $connection; // 连接
    public $queue; // 对列
    public $chainConnection; // 链 连接
    public $chainQueue; // 链 对列
    public $delay; // 延时 \DateTimeInterface|\DateInterval|int|null
    public $chained = []; // 链

    public function onConnection($connection) { // 设置连接
        $this->connection = $connection;
        return $this;
    }
    public function onQueue($queue) { // 设置对列
        $this->queue = $queue;
        return $this;
    }
    public function allOnConnection($connection) { // 设置所有连接
        $this->chainConnection = $connection;
        $this->connection = $connection;
        return $this;
    }
    public function allOnQueue($queue) { // 设置所有对列
        $this->chainQueue = $queue;
        $this->queue = $queue;
        return $this;
    }
    public function delay($delay) { // 设置延时
        $this->delay = $delay;
        return $this;
    }
    public function chain($chain) { // 设置链
        $this->chained = collect($chain)->map(function ($job) {
            return serialize($job);
        })->all();
        return $this;
    }

    public function dispatchNextJobInChain() { // 调度链下一个任务
        if ( ! empty($this->chained) ) {
            dispatch(tap(unserialize(array_shift($this->chained)), function ($next) {
                $next->chained = $this->chained;

                $next->onConnection($next->connection ?: $this->chainConnection);
                $next->onQueue($next->queue ?: $this->chainQueue);

                $next->chainConnection = $this->chainConnection;
                $next->chainQueue = $this->chainQueue;
            }));
        }
    }
}