<?php
namespace Illuminate\Log;

use Monolog\Logger as Monolog;
use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton('log', function () {
            return $this->createLogger();
        });
    }

    public function createLogger() {
        $log = new Writer(
            new Monolog($this->channel()), $this->app['events']
        );

        if ($this->app->hasMonologConfigurator()) {
            call_user_func($this->app->getMonologConfigurator(), $log->getMonolog());
        } else {
            $this->configureHandler($log);
        }

        return $log;
    }

    protected function channel() {
        if ( $this->app->bound('config') && $channel = $this->app->make('config')->get('app.log_channel') ) return $channel;

        return $this->app->bound('env') ? $this->app->environment() : 'production';
    }

    protected function configureHandler(Writer $log) {
        $this->{'configure'.ucfirst($this->handler()).'Handler'}($log);
    }

    protected function configureSingleHandler(Writer $log) {
        $log->useFiles(
            $this->app->storagePath().'/logs/laravel.log',
            $this->logLevel()
        );
    }

    protected function configureDailyHandler(Writer $log) {
        $log->useDailyFiles(
            $this->app->storagePath().'/logs/laravel.log', $this->maxFiles(),
            $this->logLevel()
        );
    }

    protected function configureSyslogHandler(Writer $log) {
        $log->useSyslog('laravel', $this->logLevel());
    }

    protected function configureErrorlogHandler(Writer $log) {
        $log->useErrorLog($this->logLevel());
    }

    protected function handler() {
        if ( $this->app->bound('config') ) return $this->app->make('config')->get('app.log', 'single');

        return 'single';
    }

    protected function logLevel() {
        if ( $this->app->bound('config') ) return $this->app->make('config')->get('app.log_level', 'debug');

        return 'debug';
    }

    protected function maxFiles() {
        if ( $this->app->bound('config') ) return $this->app->make('config')->get('app.log_max_files', 5);

        return 0;
    }
}
