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
            /**
             * Separar la ruta coincidente en partes teniendo en cuenta
             * el símbolo "/"
            */
            $defined_parts = explode('/', $this->route);
            /**
             * Quitar el primer elemento del array resultante ya que
             * siempre sera vacío
            */
            array_shift($defined_parts);
            /**
             * Agregar "/" al de final de cada parte
            */
            $defined_parts = array_map(fn($value) => $value."/", $defined_parts);
            /**
             * Obtener todos los elementos del array que no coincidan con la
             * expresión regular de un parámetro en la ruta "/\[.*\]/"
            */
            $pattern = preg_grep("/\[.*\]/", $defined_parts, PREG_GREP_INVERT);
            /**
             * A partir del array anterior donde se reconocen las partes definidas
             * de la URL, es decir, las partes que no son parámetros,
             * se procede a removerlos
            */
            $url = str_replace($pattern, '', $route);
            /**
             * A la url resultante, que solo conserva los parametros, se la separa
             * teniendo en cuenta el simbolo "/"
            */
            $pre_result = (explode('/', $url));
            /**
             * Quitar el primer elemento del array resultante ya que
             * siempre sera vacío
            */
            array_shift($pre_result);
            /**
             * Se procede a combinar las parámetros de la instancia, los keys, y los
             * parámetros obtenidos de la URL, los valores, en un único array
             * para que posteriormente sea devuelto por la función
            */
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