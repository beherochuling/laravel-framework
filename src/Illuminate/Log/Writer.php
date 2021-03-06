<?php
namespace Illuminate\Log;

use Closure;
use RuntimeException;
use InvalidArgumentException;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger as MonologLogger;
use Illuminate\Log\Events\MessageLogged;
use Monolog\Handler\RotatingFileHandler;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Support\Arrayable;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use Illuminate\Contracts\Logging\Log as LogContract;

class Writer implements LogContract, PsrLoggerInterface {
    protected $monolog;

    protected $dispatcher;

    protected $levels = [
        'debug'     => MonologLogger::DEBUG,
        'info'      => MonologLogger::INFO,
        'notice'    => MonologLogger::NOTICE,
        'warning'   => MonologLogger::WARNING,
        'error'     => MonologLogger::ERROR,
        'critical'  => MonologLogger::CRITICAL,
        'alert'     => MonologLogger::ALERT,
        'emergency' => MonologLogger::EMERGENCY,
    ];

    public function __construct(MonologLogger $monolog, Dispatcher $dispatcher = null) {
        $this->monolog = $monolog;

        if (isset($dispatcher)) {
            $this->dispatcher = $dispatcher;
        }
    }

    public function emergency($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function alert($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function critical($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function error($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function warning($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function notice($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function info($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function debug($message, array $context = []) {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function log($level, $message, array $context = []) {
        $this->writeLog($level, $message, $context);
    }

    public function write($level, $message, array $context = []) {
        $this->writeLog($level, $message, $context);
    }

    protected function writeLog($level, $message, $context) {
        $this->fireLogEvent($level, $message = $this->formatMessage($message), $context);

        $this->monolog->{$level}($message, $context);
    }

    public function useFiles($path, $level = 'debug') {
        $this->monolog->pushHandler($handler = new StreamHandler($path, $this->parseLevel($level)));

        $handler->setFormatter($this->getDefaultFormatter());
    }

    public function useDailyFiles($path, $days = 0, $level = 'debug') {
        $this->monolog->pushHandler(
            $handler = new RotatingFileHandler($path, $days, $this->parseLevel($level))
        );

        $handler->setFormatter($this->getDefaultFormatter());
    }

    public function useSyslog($name = 'laravel', $level = 'debug', $facility = LOG_USER) {
        return $this->monolog->pushHandler(new SyslogHandler($name, $facility, $level));
    }

    public function useErrorLog($level = 'debug', $messageType = ErrorLogHandler::OPERATING_SYSTEM) {
        $this->monolog->pushHandler(
            new ErrorLogHandler($messageType, $this->parseLevel($level))
        );
    }

    public function listen(Closure $callback) {
        if (! isset($this->dispatcher)) {
            throw new RuntimeException('Events dispatcher has not been set.');
        }

        $this->dispatcher->listen(MessageLogged::class, $callback);
    }

    protected function fireLogEvent($level, $message, array $context = []) {
        // If the event dispatcher is set, we will pass along the parameters to the
        // log listeners. These are useful for building profilers or other tools
        // that aggregate all of the log messages for a given "request" cycle.
        if (isset($this->dispatcher)) {
            $this->dispatcher->dispatch(new MessageLogged($level, $message, $context));
        }
    }

    protected function formatMessage($message) {
        if (is_array($message)) {
            return var_export($message, true);
        } elseif ($message instanceof Jsonable) {
            return $message->toJson();
        } elseif ($message instanceof Arrayable) {
            return var_export($message->toArray(), true);
        }

        return $message;
    }

    protected function parseLevel($level) {
        if (isset($this->levels[$level])) {
            return $this->levels[$level];
        }

        throw new InvalidArgumentException('Invalid log level.');
    }

    public function getMonolog() {
        return $this->monolog;
    }

    protected function getDefaultFormatter() {
        return tap(new LineFormatter(null, null, true, true), function ($formatter) {
            $formatter->includeStacktraces();
        });
    }

    public function getEventDispatcher() {
        return $this->dispatcher;
    }

    public function setEventDispatcher(Dispatcher $dispatcher) {
        $this->dispatcher = $dispatcher;
    }
}