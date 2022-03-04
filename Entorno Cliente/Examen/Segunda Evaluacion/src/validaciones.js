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
 * E: Etiqueta HTML, Mensaje(string, opcional)
 */
function mostrarError(etiqueta, mensaje) {
    etiqueta.style = "background-color: red;"; //Cambia el color de fondo a rojo
    if (mensaje) { //Si existe un mensaje
        //Crea una etiqueta span
        let span = createSpan(mensaje, "mensaje");
        span.style.color = "red";
        span.style.fontSize = "12px";
        let padre = etiqueta.parentNode;
        //Y lo inserta antes del padre
        padre.insertAdjacentElement("beforebegin", span);
    }
}

/*
 * E: Etiqueta HTML, Color (string), Mensaje (string, opcional)
 */
function mostrarCorrecto(etiqueta, color, mensaje) {
    etiqueta.style = "background-color:" + color + ";"; //Cambia el color de fondo de la etiqueta
    if (mensaje) { //Si se le ha pasado un mensaje
        //Crea una etiqueta span
        let span = createSpan(mensaje, "mensaje");
        span.style.fontSize = "12px";
        let padre = etiqueta.parentNode;
        //Y la inserta antes del padre
        padre.insertAdjacentElement("beforebegin", span);
    }
}

/*
 * E: Campo (Etiqueta HTML), Expresion a Validar, Mensaje de error, mensaje de exito
 * S: Mensaje de error o exito
 */
function validarCampo(campo, expresion, error, exito) {
    if (validateExpresion(campo.value, expresion) == false) { //Se llama a la funcion que valida la expresion regular
        mostrarError(campo); //Si hay errores se llama a la fucion correspondiente
        return error; //Y devolvemos el mensaje de error
    } else { //En otro caso
        //Llamamos a la funcion correspondiente
        mostrarCorrecto(campo, "white");
        //Y devolvemos el mensaje de todo correcto
        return exito;
    }
}

/*
 * E:Etiquetas HTML (array), El estilo no deseado (color de fondo solo)
 */
function compruebaEstilos(etiquetas, estiloErr) {
    for (let i = 0; i < etiquetas.length; i++) { //Para cada etiqueta que exista en el array
        if (etiquetas[i].style.backgroundColor == estiloErr) { //Si su color de fondo es el mismo que el no deseado
            return false; //Devolvemos false
        }
    } //Fin de for
    //Pero si se termina el bucle y no salta la condicion entonces ese estilo no existe en las etiquetas 
    return true;
}