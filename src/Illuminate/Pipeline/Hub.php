<?php
namespace Illuminate\Pipeline;

use Illuminate\Contracts\Pipeline\Hub as HubContract; // 管道[契约]
use Illuminate\Contracts\Container\Container; // 容器[契约]
use Closure; // 闭包

class Hub implements HubContract { // 管道-转发器
    protected $container; // 容器
    protected $pipelines = []; // 管道

    public function __construct(Container $container = null) {
        $this->container = $container;
    }

    public function defaults(Closure $callback) {
        return $this->pipeline('default', $callback);
    }
    public function pipeline($name, Closure $callback) {
        $this->pipelines[$name] = $callback;
    }

    public function pipe($object, $pipeline = null) {
        $pipeline = $pipeline ?: 'default';

        return call_user_func(
            $this->pipelines[$pipeline], new Pipeline($this->container), $object
        );
    }
}