<?php
namespace backend;

use backend\core\Controller;
use classes\Categoria;
use classes\Producto;

class ProductoController extends Controller {
    public function index()
    {
        // $products = Producto::all();
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
        $this->backendView('lista_productos', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        if ($producto == null) {
            $this->back();
            die();
        }
        header('Content-Type: application/json');
        echo json_encode($producto);
    }

    public function create()
    {
        $categories = Categoria::all();
        $this->backendView("productos", [
            "categories" => $categories
        ]);
    }

    public function store()
    {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $description = $_POST['product_description'];
        $category_id = $_POST['product_category'];
        $image_tmp = null;
        $image_name = null;
        $image_dir = null;
        if (isset($_FILES['product_image']) && !in_array(null, [$name, $price, $description, $category_id]))
        {
            var_dump('existe');
            $image_name = $_FILES['product_image']['name'];
            $image_tmp = $_FILES['product_image']['tmp_name'];
            $image_dir = "assets/img/$image_name";
            move_uploaded_file($image_tmp, $image_dir);
        } else {
            $this->back();
        }
        Producto::create([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category_id' => $category_id,
            'photo_dir' => $image_dir
        ])->execute();
        $this->redirect('/product');
    }

    public function edit($id)
    {
        $product = Producto::find($id);
        $categories = Categoria::all();
        $this->backendView("productos", [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $description = $_POST['product_description'];
        $category_id = $_POST['product_category'];
        $image_tmp = null;
        $image_name = null;
        $image_dir = null;
        if (isset($_FILES['product_image']) && !in_array(null, [$name, $price, $description, $category_id]))
        {
            var_dump('existe');
            $image_name = $_FILES['product_image']['name'];
            $image_tmp = $_FILES['product_image']['tmp_name'];
            $image_dir = "assets/img/$image_name";
            move_uploaded_file($image_tmp, $image_dir);
        } else {
            $this->back();
        }
        Producto::update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category_id' => $category_id,
            'photo_dir' => $image_dir
        ])->where('id', '=', $id)->execute();
        $this->redirect('/product');
    }

    public function destroy($id)
    {
        Producto::delete()->where('id', '=', $id)->execute();
    }
}