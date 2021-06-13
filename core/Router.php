<?php

namespace app\core;

/**
 * Class Router
 * 
 * @author Rémy Pelletier
 * @package app\core
 */

class Router
{
    public Request $request;
    protected array $routes = [];

    function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            echo "not found";
            exit;
        }
        echo call_user_func($callback);
    }
}