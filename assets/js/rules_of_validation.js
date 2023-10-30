class RulesSheet {
    constructor(fieldName) {
        this.fieldName = fieldName;
    }

    required(value, rule) {
        if (rule == 'required' && (value === null || value === '')) {
            return `El campo "${this.fieldName}" es requerido`;
        }
    }

    numeric(value, rule) {
        if (rule != 'numeric' && rule != '') {
            return null;
        }
        if (isNaN(value)) {
            return `El campo "${this.fieldName}" debe ser de tipo numérico`;
        }
    }

    id(value, rule) {
        if (rule == 'id' && value == '0') {
            return `El campo "${this.fieldName}" es requerido`;
        }
    }

    lessThan(value, rule) {
        if (!/^<(-?\d+)$/.test(rule)) {
            return null;
        }
        const number = parseInt(rule.slice(1));
        if (/^<(-?\d+)$/.test(rule) && this.value >= number) {
            return `El valor del campo "${this.fieldName}" debe ser menor o igual que ${number-1}`;
        }
    }

    greaterThan(value, rule) {
        if (!/^>(-?\d+)$/.test(rule)) {
            return null;
        }
        const number = parseInt(rule.slice(1));
        if (this.value <= number) {
            return `El valor del campo "${this.fieldName}" debe ser mayor o igual que ${number+1}`;
        }
    }
}

export class Field extends RulesSheet{
    constructor({ fieldName, value, rules = [] }) {
        super(fieldName);
        this.value = value;
        this.rules = rules;
    }

    validate() {
        const errorMessages = this.rules.map(rule => {
            return [
                this.required(this.value, rule),
                this.numeric(this.value, rule),
                this.id(this.value, rule),
                this.lessThan(this.value, rule),
                this.greaterThan(this.value, rule),
            ];
        }).flat().filter(Boolean);

        return errorMessages;
    }
}

export class Validation {
    constructor(...fields) {
        this.fields = fields;
    }

    validate() {
        const fieldErrors = this.fields.map((field) => field.validate()).flat();
        const result = fieldErrors.length === 0;
        const message = fieldErrors.join("\n");
        return { result, message };
    }
}