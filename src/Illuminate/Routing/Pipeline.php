<?php
namespace Illuminate\Routing;

use Illuminate\Pipeline\Pipeline as BasePipeline; // 管道基类
use Illuminate\Http\Request; // http 请求
use Closure; // 闭包
use Exception; // 异常
use Throwable; // 可抛出对象
use Illuminate\Contracts\Debug\ExceptionHandler; // 异常处理[契约]
use Symfony\Component\Debug\Exception\FatalThrowableError; // 可抛出对象 严重错误

class Pipeline extends BasePipeline { // 路由-管道
    protected function prepareDestination(Closure $destination) {
        return function ($passable) use ($destination) {
            try {
                return $destination($passable);
            } catch (Exception $e) {
                return $this->handleException($passable, $e);
            } catch (Throwable $e) {
                return $this->handleException($passable, new FatalThrowableError($e));
            }
        };
    }
    protected function carry() {
        return function ($stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {
                try {
                    $slice = parent::carry();
                    $callable = $slice($stack, $pipe);
                    return $callable($passable);
                } catch (Exception $e) {
                    return $this->handleException($passable, $e);
                } catch (Throwable $e) {
                    return $this->handleException($passable, new FatalThrowableError($e));
                }
            };
        };
    }
    protected function handleException($passable, Exception $e) {
        if ( ! $this->container->bound(ExceptionHandler::class) || ! $passable instanceof Request ) throw $e;

        $handler = $this->container->make(ExceptionHandler::class);
        $handler->report($e);
        $response = $handler->render($passable, $e);

        if ( method_exists($response, 'withException') ) $respone->withException($e);

        return $response;
    }
}