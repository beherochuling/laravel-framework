<?php
namespace Illuminate\Config;

use ArrayAccess; // 数组访问
use Illuminate\Contracts\Config\Repository as ConfigContract; // 配置[契约]
use Illuminate\Support\Arr;

class Repository implements ArrayAccess, ConfigContract {
    protected $items = []; // 项

    public function __construct(array $items = []) {
        $this->items = $items;
    }

    public function all() {
        return $this->items;
    }

    public function has($key) { // 存在
        return Arr::has($this->items, $key);
    }
    public function get($key, $default = null) { // 获取
        if ( is_array($key) ) {
            return $this->getMany($key);
        } else {
            return Arr::get($this->items, $key, $default);
        }
    }
    public function getMany($keys) { // 获取 多个
        $config = [];

        foreach ( $keys as $key => $default ) {
            if ( is_numeric($key) ) list($key, $default) = [$default, null];

            $config[$key] = Arr::get($this->items, $key, $default);
        }

        return $config;
    }
    public function set($key, $value = null) { // 设置
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }
    public function prepend($key, $value) { // 头部添加
        $array = $this->get($key);

        array_unshift($array, $value);

        $this->set($key, $array);
    }
    public function push($key, $value) { // 尾部添加
        $array = $this->get($key);

        $array[] = $value;

        $this->set($key, $array);
    }

    public function offsetExists($key) { // 存在
        return $this->has($key);
    }
    public function offsetGet($key) { // 获取
        return $this->get($key);
    }
    public function offsetSet($key, $value) { // 设置
        $this->set($key, $value);
    }
    public function offsetUnset($key) { // 取消设置
        $this->set($key, null);
    }
}