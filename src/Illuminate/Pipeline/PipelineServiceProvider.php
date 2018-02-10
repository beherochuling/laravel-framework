<?php
namespace Illuminate\Pipeline;

use Illuminate\Support\ServiceProvider; // 服务提供器
use Illuminate\Contracts\Pipeline\Hub as PipelineHubContract; // 管道转发器[契约]

class PipelineServiceProvider extends ServiceProvider { // 管道-服务提供器
    protected $defer = true;

    public function register() {
        $this->app->singleton(
            PipelineHubContract::class, Hub::class
        );
    }
    public function provides() {
        return [
            PipelineHubContract::class,
        ];
    }
}