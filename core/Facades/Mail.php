<?php
namespace Core\Facades;

use Core\Services\Mailer;

class Mail extends Facade {
    protected static function getFacadeAccessor(): string {
        return Mailer::class;
    }
}