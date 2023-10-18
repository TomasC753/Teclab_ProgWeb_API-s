Estructura del proyecto:

MIPROYECTO
├ assets
|   ├ css
|   |   └ estilos.css               // Archivo de estilos
|   ├ img
|   └ js
|       └ main.js                   // Scripts
├ backend
|   ├ views
|   |   ├ categorias.html           // Formulario de altas de categorias
|   |   ├ productos.html            // Formulario de altas de productos
|   |   ├ lista_categorias.html     // Listado de categorias existentes
|   |   └ list_productos.html       // Listado de productos existentes
|   ├ categorias.php                // Controlador de categorias
|   └ productos.php                 // Controlador de productos
├ class
|   ├ autoload.php                  // Archivo de autocarga de clases
|   ├ categorias.php                // Clase para categorias
|   └ productos.php                 // Clase para productos
├ views
|   └ home.html                     // Vista de los productos del home del sitio
├ README.md                         // Este archivo
├ index.php                         // Controlador del home del sitio