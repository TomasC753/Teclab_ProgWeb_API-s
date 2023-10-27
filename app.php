<?php

use backend\CategoriaController;
use backend\ProductoController;
use core\Router;

class App {
    public function __construct()
    {
        Router::init()->delegate();
    }
}