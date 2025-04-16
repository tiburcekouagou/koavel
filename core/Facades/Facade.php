<?php
namespace Core\Facades;

use Core\Container;

abstract class Facade {
    
    protected static function getInstance(): object {
        return Container::$instance->make(static::getFacadeAccessor());
    }
    
    public static function __callStatic($method, $args) {
        $instance = Container::$instance->make(static::getFacadeAccessor());
        return $instance->$method(...$args);
    }

    abstract protected static function getFacadeAccessor(): string;
}