<?php

namespace backend;

use backend\core\Controller;
use classes\Categoria;

class CategoriaController extends Controller {
    public function index()
    {
        $categories = Categoria::all();
        $this->backendView('lista_categorias', [
            'categories' => $categories
        ]);
    }

    public function show($id)
    {
        $category = Categoria::find($id);
        if (is_null($category)) {
            $this->back();
        }
        header('Content-Type: application/json');
        echo json_encode($category);
    }

    public function create()
    {
        $this->backendView('categorias');
    }

    public function store()
    {
        $name = $_POST['category_name'] ?? null;
        var_dump($name);
        if (is_null($name)) {
            $this->back();
            die();
        }

        Categoria::create([
            'name' => $name
        ])->execute();
        
        $this->redirect('/categoria');
    }

    public function edit($id)
    {
        $category = Categoria::find($id);
        $this->backendView('categorias', [
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $name = $_POST['category_name'] ?? null;
        var_dump($name);
        if (is_null($name)) {
            $this->back();
            die();
        }
        try {
            Categoria::update([
                'name' => $name
            ])->where('id', '=', $id)->execute();
            
            $this->redirect('/categoria');      
        } catch(\Throwable $error) {
            $this->back('Error al actualizar');
            die();
        }
    }

    public function destroy($id)
    {
        Categoria::delete()->where('id', '=', $id)->execute();
    }
}