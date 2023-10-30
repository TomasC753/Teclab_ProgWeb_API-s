<?php

namespace core\traits;
use core\Route;

trait HasRoutes {
    /**
     * @var Route[]
    */
    public $routes = [];
    public $defined_routes = [];
    public $dynamic_routes = [];

    protected function addRoute(Route $route)
    {
        if (!empty($route->parameters)) {
            $this->dynamic_routes[] = $route;
        } else {
            $this->defined_routes[] = $route;
        }
        $this->routes[] = $route;
    }
    public function get(string $route, string $controller, string $action)
    {
        $route = Route::get($route, $controller, $action);
        $this->addRoute($route);

        return $this;
    }
    public function post(string $route, string $controller, string $action)
    {
        $route = Route::post($route, $controller, $action);
        $this->addRoute($route);

        return $this;
    }
    public function put(string $route, string $controller, string $action)
    {
        $route = Route::put($route, $controller, $action);
        $this->addRoute($route);

        return $this;
    }
    public function delete(string $route, string $controller, string $action)
    {
        $route = Route::delete($route, $controller, $action);
        $this->addRoute($route);

        return $this;
    }

    public function match(string $url, string $method) : Route|null
    {
        $result = null;
        foreach ($this->defined_routes as $route)
        {
            if ($route->compare($url, $method)) {
                $result = $route;
                break;
            }
        }
        if (!is_null($result)) {
            return $result;
        }

        foreach ($this->dynamic_routes as $route)
        {
            if ($route->compare($url, $method)) {
                $result = $route;
                break;
            }
        }

        return $result;
    }
}