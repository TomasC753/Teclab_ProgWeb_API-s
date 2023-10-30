<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Lista de productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/assets/css/estilos.css">
    </head>
    <body>
        <header>
            <div class="logo">
                <b>GESTOR</b>
            </div>
            <nav>
                <ul>
                    <li><a href="/categoria">Categorías</a></li>
                    <li><a href="/product">Productos</a></li>
                </ul>
            </nav>
        </header>
        <div class="h_max_screen center_content flex_column">
            <div class="form_container">
                <h3>Lista de productos</h3>
                <a href="/product/create">
                    <button class="save_button my-4">Crear Producto</button>
                </a>
                <table class="custom_table" id="product_table">
                    <thead>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?php echo $product->id ?></td>
                                <td>
                                    <div class="product_image" style="background-image: url('http://<?php echo "{$_SERVER['SERVER_NAME']}/$product->photo_dir" ?>');">    
                                    </div>
                                </td>
                                <td><?php echo $product->name ?></td>
                                <td>$<?php echo $product->price ?></td>
                                <td><?php echo $product->category ?></td>
                                <td><?php echo $product->description ?></td>
                                <td>
                                    <div class="custom_table__actions">
                                        <a class="trash_button trash_product" href="/product/<?php echo $product->id ?>"><i class="fa-solid fa-trash"></i></i></a>
                                        <a class="edit_button" href="/product/edit/<?php echo $product->id ?>" ><i class="fa-solid fa-pen"></i></a>
                                        <a class="view_button" href="/product/<?php echo $product->id ?>"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <script src="http://<?php echo $_SERVER['SERVER_NAME'] ?>/assets/js/main.js"></script>
    </body>
</html>
