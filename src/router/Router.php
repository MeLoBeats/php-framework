<?php

namespace Src\Router;

use Src\Http\Request;

class Router
{

    private static $_instance = null;
    private static $routes = [];

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Router();
        }

        return self::$_instance;
    }

    public static function get($route, $callback)
    {
        self::$routes["get"][$route] = $callback;
    }

    public static function post($route, $callback)
    {
        self::$routes["post"][$route] = $callback;
    }

    public static function put($route, $callback)
    {
        self::$routes["put"][$route] = $callback;
    }

    public static function delete($route, $callback)
    {
        self::$routes["delete"][$route] = $callback;
    }

    public static function patch($route, $callback)
    {
        self::$routes["patch"][$route] = $callback;
    }

    public static function options($route, $callback)
    {
        self::$routes["options"][$route] = $callback;
    }

    private function getRoutes()
    {
        return self::$routes;
    }

    public function run()
    {
        $current_route = $this->getRoutes()[strtolower(Request::getMethod())][Request::getUri()];
        if (!is_array($current_route)) {
            echo "test";
            $content = $current_route->__invoke();
            if (!is_string($content)) {
                dump($content);
                return;
            } else {
                echo $content;
                return;
            }
        }
        $controller = new $current_route[0]();
        if (count($current_route) > 1) {
            $body = $controller->{$current_route[1]}();
        } else {
            $body = $controller->_invoke();
        }
        if (!is_string($body)) {
            dump($body);
            return;
        } else {
            echo $body;
            return;
        }
    }
}
