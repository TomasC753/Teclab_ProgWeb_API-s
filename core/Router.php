<?php

namespace core;
use core\traits\HasRoutes;

require_once "routes.php";

/**
 * @author Tomas Catalano <tcatalano159@gmail.com>
*/
class Router {
    use HasRoutes;

    static public function init(): Router
    {
        return getRoutes(new Router());
    }

    public function delegate()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = "/".($_GET["url"] ?? "");

        $route = $this->match($url, $method);
        if (is_null($route)) {
            http_response_code(404);
            die();
        }
        $parameters = $route->getParams($url);
        if (!is_null($parameters)) {
            (new $route->controller)->{$route->action}(...$parameters);
            die();
        }
        (new $route->controller)->{$route->action}();
    }
    
}