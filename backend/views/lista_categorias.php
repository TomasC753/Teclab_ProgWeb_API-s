<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Lista de categorías</title>
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
                <h3>Lista de Categorías</h1>
                <a class="my-4" href="/categoria/create">
                    <button class="save_button">Crear Categoria</button>
                </a>
                <table class="mt-4 custom_table" id="category_table">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $category) { ?>
                        <tr>
                            <td><?php echo $category->id ?></td>
                            <td><?php echo $category->name ?></td>
                            <td>
                                <div class="custom_table__actions">
                                    <a class="trash_button trash_category" href="/categoria/<?php echo $category->id ?>"><i class="fa-solid fa-trash"></i></i></a>
                                    <a class="edit_button" href="/categoria/edit/<?php echo $category->id ?>" ><i class="fa-solid fa-pen"></i></a>
                                    <a class="view_button" href="/categoria/<?php echo $category->id ?>"><i class="fa-solid fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <small class="mt-4">Tomas Fabrizzio Catalano | 46035457</small>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <script src="http://<?php echo $_SERVER['SERVER_NAME'] ?>/assets/js/main.js"></script>
    </body>
</html>
