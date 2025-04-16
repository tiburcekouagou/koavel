<?php
namespace Core\Services;

class Logger {
    public function info($message) {
        echo "ℹ [Info]: $message" . PHP_EOL;
    }
    
    public function error($message) {
        echo "❌ [Error]: $message" . PHP_EOL;
    }
}