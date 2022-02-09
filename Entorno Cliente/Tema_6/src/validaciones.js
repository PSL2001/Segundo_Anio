/*
 * E: Texto (string), Expresion regular
 * S: Boolean que dice si es correcto o no
 */
function validateExpresion(texto, expresion) {
    let correcto = false;

    if (texto.match(expresion) == null) {
        return correcto;
    } else {
        correcto = true;
        return correcto;
    }
}

/*
 *
 */
function mostrarError(etiqueta, mensaje) {
    etiqueta.style = "background-color: red;";
    if (mensaje) {
        let span = createSpan(mensaje, "mensaje");
        span.style.color = "red";
        span.style.fontSize = "12px";
        let padre = etiqueta.parentNode;
        padre.insertAdjacentElement("beforebegin", span);
    }
}

/*
 *
 */
function mostrarCorrecto(etiqueta, mensaje) {
    etiqueta.style = "background-color: green;";
    if (mensaje) {
        let span = createSpan(mensaje, "mensaje");
        span.style.fontSize = "12px";
        let padre = etiqueta.parentNode;
        padre.insertAdjacentElement("beforebegin", span);
    }
}