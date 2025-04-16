<?php

namespace Core\Facades;

use Core\Services\Logger;

class Log extends Facade {
    protected static function getFacadeAccessor(): string {
        return Logger::class;
    }
}