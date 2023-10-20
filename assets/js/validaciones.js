import { Validation, Field } from './rules_of_validation.js';

$("document").ready(function () {
    $("#productSave").click((event) => {
        event.preventDefault();
        let productName = $("#productName").val();
        let productPrice = $("#productPrice").val();
        let productDescription = $("#productDescription").val();
        let productCategory = $("#productCategory").val();
        let productImage = $("#productImage").val();

        let { result, message } = new Validation(
            new Field({
                fieldName: "Nombre del producto",
                value: productName,
                rules: ["required"]
            }),
            new Field({
                fieldName: "Precio del producto",
                value: productPrice,
                rules: ["required", "numeric", ">-1"]
            }),
            new Field({
                fieldName: "Descripción del producto",
                value: productDescription,
                rules: ["required"]
            }),
            new Field({
                fieldName: "Categoría del producto",
                value: productCategory,
                rules: ["required", "id"]
            }),
            new Field({
                fieldName: "Imagen del producto",
                value: productImage,
                rules: ["required"]
            })
        ).validate();

        if (!result) {
            alert(message);
            return;
        }

        alert("Correcto");
    });

    $("#categorySave").click((event) => {
        event.preventDefault();
        let categoryName = $("#categoryName").val();

        let { result, message } = new Validation(
            new Field({
                fieldName: "Nombre de la categoría",
                value: categoryName,
                rules: ["required"]
            })
        ).validate();

        if (!result) {
            alert(message);
            return;
        }

        alert("Correcto");
    });
});
