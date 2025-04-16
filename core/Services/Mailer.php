<?php
namespace Core\Services;

class Mailer {
    public function send($to, $message) {
        return "📧 Email sent to $to: $message" . PHP_EOL;
    }
}