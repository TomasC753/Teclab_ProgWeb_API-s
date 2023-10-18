# Mi proyecto


[Paleta de colores](https://colorhunt.co/palette/f6f1f1afd3e219a7ce146c94)

## Situación

Estamos trabajando en un proyecto con un grupo de amigos que quieren crear una empresa de computación. Nuestro trabajo será crear un sitio web donde publicaremos los productos que vamos a vender.

Lo primero que debemos hacer es pensar un nombre y elegir un logo para la empresa (el logo puede buscarse en internet o crearse con cualquier programa de imágenes).

Luego, para comenzar a trabajar en la carga de productos en el sitio, deberemos establecer la categoría de cada producto, la cual se definirá por ID (identificador numérico) y el nombre de la categoría.

Los productos, a su vez, tendrán su propio ID, nombre, imagen, descripción, precio y la categoría a la que pertenece.

**Estructura del proyecto:**

```bash
MIPROYECTO
├─ assets
|   ├─ css
|   |   └─ estilos.css               // Archivo de estilos
|   ├─ img
|   └─ js
|       └─ main.js                   // Scripts
├─ backend
|   ├─ views
|   |   ├─ categorias.html           // Formulario de altas de categorias
|   |   ├─ productos.html            // Formulario de altas de productos
|   |   ├─ lista_categorias.html     // Listado de categorias existentes
|   |   └─ list_productos.html       // Listado de productos existentes
|   ├─ categorias.php                // Controlador de categorias
|   └─ productos.php                 // Controlador de productos
├─ class
|   ├─ autoload.php                  // Archivo de autocarga de clases
|   ├─ categorias.php                // Clase para categorias
|   └─ productos.php                 // Clase para productos
├─ views
|   └─ home.html                     // Vista de los productos del home del sitio
├─ README.md                         // Este archivo
└─ index.php                         // Controlador del home del sitio
```
