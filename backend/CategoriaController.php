<?php

namespace backend;

use backend\core\Controller;
use classes\Categoria;

class CategoriaController extends Controller {
    public function index()
    {
        // $this->backendView('lista_categorias');
        var_dump(Categoria::all());
    }

    public function show($id)
    {
        echo $id;
    }

    public function create()
    {
        $this->backendView('categorias');
    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}