<?php
namespace backend;

use backend\core\Controller;
use classes\Categoria;
use classes\Producto;

class HomeController extends Controller {
    public function index()
    {
        $products = Producto::select([
            'products.id',
            'products.name', 
            'products.price', 
            'products.photo_dir', 
            'products.description', 
            'categories.name AS category'
        ])
        ->join("categories","products.category_id","=","categories.id")
        ->execute();
        $categories = Categoria::all();

        $this->view("home", [
            "products"=> $products,
            "categories"=> $categories
        ]);
    }
}