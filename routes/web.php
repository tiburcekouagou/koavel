<?php

use App\Controllers\HomeController;

$router->get('/', fn () => 'Hello from your Koavel');
$router->get('/home', [HomeController::class, 'index']);