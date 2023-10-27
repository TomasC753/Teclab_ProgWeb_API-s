<?php

namespace core;

class Route {
    public $parameters = [];
    public $route;
    public $pattern;
    public $method;
    public $controller;
    public $action;

    private function __construct($method, $route, $controller, $action)
    {
        $this->route = $route;
        $this->method = $method;
        $this->controller = $controller;
        $this->action = $action;

        $pattern = str_replace('/', '\/', $route);
        $this->pattern = "/^".preg_replace("/\[(.*?)\]/", '(\d+)', $pattern)."\/?$/";

        foreach (explode('/', $route) as $value)
        {
            if (preg_match("/\[(.*?)\]/", $value)) {
                $this->parameters[] = str_replace(["[", "]"], "", $value);
            }
        }
    }

    public function compare(string $url, string $method)
    {
        return $method == $this->method && preg_match($this->pattern, $url);
    }

    public function getParams(string $route) : array|null
    {
        try {
            $defined_parts = explode('/', $this->route);
            array_shift($defined_parts);
            $defined_parts = array_map(fn($value) => $value."/", $defined_parts);
            $pattern = preg_grep("/\[.*\]/", $defined_parts, PREG_GREP_INVERT);
            $url = str_replace($pattern, '', $route);
            
            $pre_result = (explode('/', $url));
            array_shift($pre_result);

            $result = array_combine($this->parameters, $pre_result);
            return $result;
        } catch(\Throwable $error) {
            return null;
        }
        
    }

    static public function get(string $route, string $controller, string $action) : Route {
        return new Route('GET', $route, $controller, $action);
    }

    static public function post(string $route, string $controller, string $action) : Route {
        return new Route('POST', $route, $controller, $action);
    }

    static public function put(string $route, string $controller, string $action) : Route {
        return new Route('PUT', $route, $controller, $action);
    }

    static public function delete(string $route, string $controller, string $action) : Route {
        return new Route('DELETE', $route, $controller, $action);
    } 
}