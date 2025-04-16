<?php

namespace Core\Facades;

use Core\Router;

class Route extends Facade {
    protected static function getFacadeAccessor(): string {
        return Router::class;
    }
}