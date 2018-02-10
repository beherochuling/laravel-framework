<?php
namespace Illuminate\Pipeline;

use Illuminate\Contracts\Pipeline\Pipeline as PipelineContract; // 管道[契约]
use Illuminate\Contracts\Container\Container; // 容器[契约]
use Closure; // 闭包
use RuntimeException; // 运行时异常

class Pipeline implements PipelineContract { // 管道
    protected $container; // 容器 [契约]
    protected $passable; // 发送对象
    protected $pipes = []; // 管道
    protected $method = 'handle'; // 管道默认方法

    public function __construct(Container $container = null) {
        $this->container = $container;
    }

    public function send($passable) { // 发送对象
        $this->passable = $passable;
        return $this;
    }
    public function through($pipes) { // 设置管道
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();
        return $this;
    }
    public function via($method) { // 设置管道方法
        $this->method = $method;
        return $this;
    }
    public function then(Closure $destination) { // 执行
        $pipeline = array_reduce(
            array_reverse($this->pipes), $this->carry(), $this->prepareDestination($destination)
        );

        return $pipeline($this->passable);
    }
    protected function prepareDestination(Closure $destination) { // 执行发送对象
        return function ($passable) use ($destination) {
            return $destination($passable);
        };
    }
    protected function carry() { // 核心方法
        return function ($stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {
                if ( is_callable($pipe) ) {
                    return $pipe($passable, $stack);
                } elseif ( ! is_object($pipe) ) {
                    list($name, $parameters) = $this->parsePipeString($pipe);
                    $pipe = $this->getContainer()->make($name);
                    $parameters = array_merge([$passable, $stack], $parameters);
                } else {
                    $parameters = [$passable, $stack];
                }

                return method_exists($pipe, $this->method)
                    ? $pipe->{$this->method}(...$parameters)
                    : $pipe(...$parameters);
            };
        };
    }
    protected function parsePipeString($pipe) { // function:parameter1,parameter2,parameter3... => [function, ['parameter1', 'parameter2', 'parameter3', ...]]
        list($name, $parameters) = array_pad(explode(':', $pipe, 2), 2, []);
        if ( is_string($parameters) ) $parameters = explode(',', $parameters);
        return [$name, $parameters];
    }
    protected function getContainer() { // 返回容器
        if ( ! $this->container ) throw new RuntimeException('A container instance has not been passed to the Pipeline.');

        return $this->container;
    }
}