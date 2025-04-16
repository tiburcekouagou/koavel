<?php
namespace Core;

class Router {
    protected array $routes = [];

    /**
     * Register a GET route
     * @param string $uri
     * @param callable|array $action
     * @return void
     */
    public function get(string $uri, callable|array $action) {
        $this->routes['GET'][$uri] = $action;
    }

    /**
     * Register a POST route
     * @param string $uri
     * @param callable|array $action
     * @return void
     */
    public function post(string $uri, callable|array $action) {
        $this->routes['POST'][$uri] = $action;
    }

    /**
     * Register a PUT route
     * @param string $uri
     * @param callable|array $action
     * @return void
     */
    public function put(string $uri, callable|array $action) {
        $this->routes['PUT'][$uri] = $action;
    }

    /**
     * Register a DELETE route
     * @param string $uri
     * @param callable|array $action
     * @return void
     */
    public function delete(string $uri, callable|array $action) {
        $this->routes['DELETE'][$uri] = $action;
    }

    /**
     * Handle the current HTTP request.
     * 
     * This method matches the request URI and method (GET, POST, etc.)
     * against the registered rotues, and executes the corresponding
     * callback or controller method.
     * 
     * @param string $uri The current request URI (typically $_SERVER['REQUEST_URI'])
     * @return void
     * 
     * @throws \Exception If the route is not found or cannot be dispatched
     */
    public function dispatch(string $uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($uri, PHP_URL_PATH);

        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_callable($action)) {
            echo $action();
        } elseif (is_array($action)) {
            [$controller, $method] = $action;
            (new $controller)->$method();
        } else {
            throw new \Exception("The route cannot be dispatched");
        }
    }
}