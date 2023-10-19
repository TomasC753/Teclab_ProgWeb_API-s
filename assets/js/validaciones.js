class Field {
    constructor({fieldName, value, rules = []}) {
        this.fieldName = fieldName;
        this.value = value;
        this.rules = rules;
    }

    validate() {
        return this.rules.map(rule => {
            if (rule == 'required') {
                if (this.value == null || this.value == '') {
                    return `El campo \"${this.fieldName}\" es requerido`;
                }
                return;
            }
            if (rule == 'numeric') {
                if (isNaN(this.value)) {
                    return `El campo \"${this.fieldName}\" debe ser del tipo numérico`;
                }
                return;
            }
            if (/\<((\-)?[0-9]*)/.test(rule)) {
                const numero = parseInt(rule.slice(1));
                if (this.value >= numero) {
                    return `El valor del campo \"${this.fieldName}\" debe ser menor a ${numero}`;
                }
                return;
            }
            if (/\>((\-)?[0-9]*)/.test(rule)) {
                const numero = parseInt(rule.slice(1));
                if (this.value <= numero) {
                    return `El valor del campo \"${this.fieldName}\" debe ser mayor a ${numero}`;
                }
                return;
            }
            if (rule == 'id') {
                if (this.value == 0) {
                    return `El campo \"${this.fieldName}\" es requerido`;
                }
                return;
            }
        }).filter(Boolean);
    }
}

class Validation {
    constructor(...fields) {
        this.fields = fields;
    }
    
    validate() {
        const fieldErrors = this.fields.map(field => field.validate()).flat();
        const result = fieldErrors.length === 0;
        const message = fieldErrors.join('\n');
        return { result, message };
    }
}

$('document').ready(function () {
    //
    $('#productSave').click((event) => {
        event.preventDefault();
        let productName = $('#productName').val();
        let productPrice = $('#productPrice').val();
        let productDescription = $('#productDescription').val();
        let productCategory = $('#productCategory').val();
        let productImage = $('#productImage').val();

        let { result, message } = new Validation(
            new Field({fieldName: 'Nombre del producto', value: productName, rules: ['required']}),
            new Field({fieldName: 'Precio del producto', value: productPrice, rules: ['required', 'numeric', '>-1']}),
            new Field({fieldName: 'Categoría del producto', value: productCategory, rules: ['required', 'id']}),
            new Field({fieldName: 'Imagen del producto', value: productImage, rules: ['required']})
        ).validate();

        if (!result) {
            alert(message);
            return;
        }

        alert('Correcto');
    });

    $('#categorySave').click((event) => {
        event.preventDefault();
        let categoryName = $('#categoryName').val();

        let { result, message } = new Validation(
            new Field({fieldName: 'Nombre de la categoría', value: categoryName, rules: ['required']}),
        ).validate();

        if (!result) {
            alert(message);
            return;
        }

        alert('Correcto');
    });
});