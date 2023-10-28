<!DOCTYPE html>
<html>
    <head>
        <title>Agregar una categoría</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/assets/css/estilos.css">
    </head>
    <body>
        <div class="h_max_screen center_content flex_column">
            <div class="logo">
                <b>GESTOR</b>
            </div>
            <div class="form_container">
                <h1>Registrar una categoría</h1>
                <form action="/categoria<?php if(isset($category)) echo "/edit/{$category->id}" ?>" method="POST" id="categoryForm">
                    <input class="w-full custom_input my-4" 
                            type="text" 
                            name="category_name" 
                            placeholder="Nombre de la categoría" 
                            id="categoryName"
                            <?php if(isset($category)) echo "value=\"$category->name\""; ?>/>                
                    <div class="center_content gap-4">
                        <button type="button" class="cancel_button">Cancelar</button>
                        <button type="submit" class="save_button" id="categorySave">Guardar</button>                      
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
