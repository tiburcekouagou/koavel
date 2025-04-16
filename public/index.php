<?php

use Core\Router;

require __DIR__ . "/../vendor/autoload.php";


// Instance the router
$router = new Router();

// Load the routes file
require __DIR__ . "/../routes/web.php";

// Handle the request
$router->dispatch($_SERVER['REQUEST_URI']);