<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    protected array $middlewares = [];
    protected $ctx;

    public function __construct()
    {
        $this->ctx = new Context();
    }
    public function get($path, $callback, $middleware = '')
    {
        $this->routes["get"][$path] = $callback;
        if (empty($middleware)) return;
        $this->middlewares["get"][$path] = $middleware;
    }
    public function start()
    {
        $path = $this->ctx->getPath();
        $method = $this->ctx->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        $middleware = $this->middlewares[$method][$path] ?? false;

        if (!$callback) {
            echo "404 not found";
            exit;
            return;
        }
        if (!empty($middleware)) $middleware($this->ctx);
        $callback($this->ctx);
    }
    public function post($path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }
}
