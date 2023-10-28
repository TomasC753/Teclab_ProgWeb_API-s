<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Agregar un producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/estilos.css">
    </head>
    <body>
        <div class="h_max_screen center_content flex_column">
            <div class="logo">
                <b>GESTOR</b>
            </div>
            <div class="form_container">
                <h1>Registrar un producto</h1>
                <form id="productForm" action="/product<?php if(isset($product)) echo "/edit/{$product->id}" ?>" method="POST" enctype="multipart/form-data">
                    <input 
                        id="productName" 
                        class="w-full custom_input mt-4" 
                        type="text" name="product_name" 
                        placeholder="Nombre del producto"
                        <?php if(isset($product)) echo "value=\"$product->name\"" ?>
                        required/> 
                    <input 
                        id="productPrice" 
                        class="w-full custom_input mt-4" 
                        type="number" name="product_price" 
                        placeholder="Precio del producto"
                        <?php if(isset($product)) echo "value=\"$product->price\"" ?>
                        required/>
                    <div class="mt-4">
                        <textarea id="productDescription" class="w-full custom_input" name="product_description" placeholder="Descripción del producto"><?php if(isset($product)) echo $product->description ?>
                        </textarea>
                    </div>
                    <select class="custom_input w-full mt-4" name="product_category" id="productCategory" required>
                        <option value="0">Categoría del producto</option>
                        <?php foreach($categories as $category) { ?>
                            <option 
                            value="<?php echo $category->id ?>" 
                            <?php if(isset($product) && $category->id == $product->category_id) echo "selected" ?>>
                                <?php echo $category->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="input_group_1 my-4">
                        <label for="productImage">Imagen del producto</label>
                        <input type="file" name="product_image" id="productImage" required>
                    </div>
                    <div class="center_content gap-4">
                        <button type="button" class="cancel_button">Cancelar</button>
                        <button type="submit" class="save_button" id="productSave">Guardar</button>                      
                    </div>
                </form>
            </div>
            <small class="mt-4">Tomas Fabrizzio Catalano | 46035457</small>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
        <script type="module" src="../../assets/js/validaciones.js"></script>
        <script src="../../assets/js/main.js"></script>
    </body>
</html>
