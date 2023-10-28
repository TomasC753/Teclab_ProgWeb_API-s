<?php

use backend\CategoriaController;
use backend\HomeController;
use backend\ProductoController;
use core\Router;

function getRoutes(Router $router) {
    $router->get('/', HomeController::class, 'index');

    $router->get('/categoria', CategoriaController::class, 'index');
    $router->get('/categoria/[id]', CategoriaController::class, 'show');
    $router->get('/categoria/create', CategoriaController::class, 'create');
    $router->post('/categoria', CategoriaController::class, 'store');
    $router->get('/categoria/edit/[id]', CategoriaController::class, 'edit');
    $router->post('/categoria/edit/[id]', CategoriaController::class, 'update');
    $router->delete('/categoria/[id]', CategoriaController::class, 'destroy');

    $router->get('/product', ProductoController::class, 'index');
    $router->get('/product/[id]', ProductoController::class, 'show');
    $router->get('/product/create', ProductoController::class, 'create');
    $router->post('/product', ProductoController::class, 'store');
    $router->get('/product/edit/[id]', ProductoController::class, 'edit');
    $router->post('/product/edit/[id]', ProductoController::class, 'update');
    $router->delete('/product/[id]', ProductoController::class, 'destroy');

    return $router;
}
