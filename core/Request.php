<?php

namespace app\core;

/**
 * Class Request
 * 
 * @author Rémy Pelletier
 * @package app\core
 */
class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function method() 
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function getBody()
    {
        $body = [];
        if ($this->method() === 'post') {
            foreach ($_POST as $key => $values) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $values) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}