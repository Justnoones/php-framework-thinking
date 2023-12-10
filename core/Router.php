<?php

class Router
{
    public $routes = [
        "GET" => [],
        "POST" => []
    ];

    public static function load ($file_name) {
        $router = new Router;
        require_once $file_name;
        return $router;
    }

    public function register ($routes) {
        $this->routes = $routes;
    }

    public function get ($uri, $controller) {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post ($uri, $controller) {
        $this->routes["POST"][$uri] = $controller;
    }

    public function direct ($uri, $method) {
        if (array_key_exists($uri, $this->routes[$method])) {
            require_once $this->routes[$method][$uri];
        } else {
            require_once "views/NotFound404Page.php";
        }
    }
}