<?php

namespace Core;

use Core\Services\Logger;
use Core\Services\Mailer;

class App extends Container
{
    public Router $router;
    public function __construct()
    {
        parent::__construct();
        $this->singleton(Router::class, fn () => new Router());
        $this->router = $this->make(Router::class);
        self::$instance = $this;

        $this->singleton(Logger::class, fn () => new Logger());
        $this->singleton(Mailer::class, fn () => new Mailer());
    }

    public function boot()
    {
        // Load the routes file
        require __DIR__ . "/../routes/web.php";

        // Handle the request
        $this->router->dispatch($_SERVER['REQUEST_URI']);
    }
}