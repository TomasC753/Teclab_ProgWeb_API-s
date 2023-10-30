<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang="es">
    <head>
        <title>GESTOR</title>
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
        <div class="home_container">
            <div class="home__panel" style="flex: 2">
                <h3 class="my-4">Lista de Productos</h3>
                <hr>
                <div class="products_container">
                    <?php foreach($products as $product) { ?>
                        <div class="product_item">
                            <img 
                                src="http://<?php echo "{$_SERVER['SERVER_NAME']}/$product->photo_dir" ?>" 
                                alt="<?php echo $product->name ?>">
                            <div class="product__info">
                                <h4><?php echo $product->name ?></h4>
                                <div class="flex mt-4">
                                    <b>$<?php echo number_format($product->price) ?></b>
                                    <small class="tag"><?php echo $product->category ?></small>
                                </div>
                                <p class="mt-4"><?php echo $product->description ?></p>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="home__panel" style="flex: 1">
                <h3 class="my-4">Lista de Categorías</h3>
                <hr>
                <div class="categories_container">
                    <?php foreach($categories as $index => $category) {?>
                        <div class="category_item">
                            <b><?php echo $index + 1 ?></b>
                            <span><?php echo $category->name ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
        <script src="http://<?php echo $_SERVER['SERVER_NAME'] ?>/assets/js/main.js"></script>
    </body>
</html>
