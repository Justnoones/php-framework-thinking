<?php

class Router
{
    public $routes = [];

    public static function load ($file_name) {
        $router = new Router;
        require_once $file_name;
        $router->register($routes);
        return $router;
    }

    public function register ($routes) {
        $this->routes = $routes;
    }

    public function direct ($uri) {
        if (array_key_exists($uri, $this->routes)) {
            require_once $this->routes[$uri];
        } else {
            return "404 Page Not Found";
        }
    }
}