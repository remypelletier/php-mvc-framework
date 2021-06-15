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
    public Response $response;
    protected array $routes = [];

    function __construct(\app\core\Request $request, \app\core\Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        // no path corresponding
        if($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        // view name corresponding to the file /views/*
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        // need to have an instance of the class, not the string to access to $this in SiteController
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        // callback function or array[class, 'method']
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent()
    {
        $layout = Application::$app->controller->layout;

        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php"; 
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params)
    {
        /**
         * $$key explanation
         * 
         * $params = ['name' => 'toto']
         * with $$key = $value, we create a variable $name = 'toto' instead of an array
         * In that way we can use a variable $name on the view instead of params['name']
         */
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php"; 
        return ob_get_clean();
    }
}