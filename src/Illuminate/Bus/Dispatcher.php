<?php
namespace Illuminate\Bus;

use Illuminate\Contracts\Bus\QueueingDispatcher; // 排队对列
use Illuminate\Pipeline\Pipeline; // 管道
use Illuminate\Contracts\Queue\Queue; // 对列[契约]
use Illuminate\Contracts\Queue\ShouldQueue; // 可对列化[契约]
use Illuminate\Contracts\Container\Container; // 容器契约
use Closure; // 闭包
use RuntimeException; // 运行时异常

class Dispatcher implements QueueingDispatcher {
    protected $container; // 容器

    /**
     * The pipeline instance for the bus.
     *
     * @var \Illuminate\Pipeline\Pipeline
     */
    protected $pipeline;

    /**
     * The pipes to send commands through before dispatching.
     *
     * @var array
     */
    protected $pipes = [];

    /**
     * The command to handler mapping for non-self-handling events.
     *
     * @var array
     */
    protected $handlers = [];

    /**
     * The queue resolver callback.
     *
     * @var \Closure|null
     */
    protected $queueResolver;

    /**
     * Create a new command dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @param  \Closure|null  $queueResolver
     * @return void
     */
    public function __construct(Container $container, Closure $queueResolver = null) {
        $this->container = $container;
        $this->queueResolver = $queueResolver;
        $this->pipeline = new Pipeline($container);
    }

    /**
     * Dispatch a command to its appropriate handler.
     *
     * @param  mixed  $command
     * @return mixed
     */
    public function dispatch($command) {
        if ($this->queueResolver && $this->commandShouldBeQueued($command)) {
            return $this->dispatchToQueue($command);
        } else {
            return $this->dispatchNow($command);
        }
    }

    /**
     * Dispatch a command to its appropriate handler in the current process.
     *
     * @param  mixed  $command
     * @param  mixed  $handler
     * @return mixed
     */
    public function dispatchNow($command, $handler = null) {
        if ($handler || $handler = $this->getCommandHandler($command)) {
            $callback = function ($command) use ($handler) {
                return $handler->handle($command);
            };
        } else {
            $callback = function ($command) {
                return $this->container->call([$command, 'handle']);
            };
        }

        return $this->pipeline->send($command)->through($this->pipes)->then($callback);
    }

    /**
     * Determine if the given command has a handler.
     *
     * @param  mixed  $command
     * @return bool
     */
    public function hasCommandHandler($command) {
        return array_key_exists(get_class($command), $this->handlers);
    }

    /**
     * Retrieve the handler for a command.
     *
     * @param  mixed  $command
     * @return bool|mixed
     */
    public function getCommandHandler($command) {
        if ( $this->hasCommandHandler($command) ) return $this->container->make($this->handlers[get_class($command)]);

        return false;
    }
    protected function commandShouldBeQueued($command) {
        return $command instanceof ShouldQueue;
    }
    public function dispatchToQueue($command) {
        $connection = $command->connection ?? null;

        $queue = call_user_func($this->queueResolver, $connection);

        if ( ! $queue instanceof Queue ) throw new RuntimeException('Queue resolver did not return a Queue implementation.');

        if (method_exists($command, 'queue')) {
            return $command->queue($queue, $command);
        } else {
            return $this->pushCommandToQueue($queue, $command);
        }
    }
    protected function pushCommandToQueue($queue, $command) {
        if ( isset($command->queue, $command->delay) ) return $queue->laterOn($command->queue, $command->delay, $command);
        if ( isset($command->queue) ) return $queue->pushOn($command->queue, $command);
        if ( isset($command->delay) ) return $queue->later($command->delay, $command);
        return $queue->push($command);
    }
    public function pipeThrough(array $pipes) {
        $this->pipes = $pipes;
        return $this;
    }
    public function map(array $map) {
        $this->handlers = array_merge($this->handlers, $map);
        return $this;
    }
}