<?php

use Core\Container;

if (!function_exists('view')) {
    function view (string $path, array $data = []) {
        $viewFile = __DIR__ . "/../views/" . str_replace('.', '/', $path) . '.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("View [$path] not found.");
        }

        extract($data); // create $name, $email etc.
        ob_start();
        require $viewFile;
        return ob_get_clean();
    }
}

if (!function_exists('app')) {
    function app(?string $abstract = null) {
        $container = Container::$instance;

        if ($abstract) {
            return $container->make($abstract);
        }

        return $container;
    }
}