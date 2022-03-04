/*
 * E: Cantidad de segundos y una funcion a llamar, etiqueta (opcional), error (opcional)
 * S: Nada
 */
function serverAnswerSim(segundos, callback, etiqueta, error) {
    if (etiqueta != null) { //Si le pasamos una etiqueta
        etiqueta.innerHTML += "Llamada al servidor de " + segundos + "sg\n"; //Si existiera mostramos al usuario cuanto dura la llamada simulada   
    } else { // Si no existiera la etiqueta
        let p = crearParrafo("Llamada al servidor de " + segundos + "sg\n"); //Entonces creamos un parrafo
        document.body.appendChild(p); //Y lo añadimos en el body
    }
    setTimeout(function () { //Ahora simulamos con timeout una llamada que durara los segundos dados
        callback(error, segundos, etiqueta) //Llamamos a la funcion
    }, segundos)
} //Fin de la funcion

/*
 * E: Error (si existe), segundos
 * S: Llamada a la funcion serverAnswerSim con un tiempo dado
 */
function callback(error, segundos, etiqueta) {
    if (error) { //Si existe el error (Es decir que ha llegado un objeto de tipo error)
        //Se maneja el error aqui
        if (etiqueta != null) {
            etiqueta.innerHTML += error;   
        } else {
            let p = crearParrafo(error);
            document.body.appendChild(p);
        }
    } else {
        //Le mostramos al usuario por texto en el documento cuanto ha durado
        if (etiqueta != null) {
            etiqueta.innerHTML += "La primera llamada ha durado " + segundos + "sg\n";
        } else { //Si no le pasaramos una etiqueta lo mostramos en parrafos
            let p = crearParrafo("La primera llamada ha durado " + segundos + "sg\n");
            document.body.appendChild(p);
        }
        //Y llamamos a la funcion
        serverAnswerSim(3000, callback2, etiqueta, null)
    }
}

/*
 * E: Error (si existe), segundos
 * S: Llamada a la funcion serverAnswerSim con un tiempo dado
 */
function callback2(error, segundos, etiqueta) {
    if (error) {
        //Si existe el error (Es decir que ha llegado un objeto de tipo error)
        //Se maneja el error aqui
        if (etiqueta != null) {
            etiqueta.innerHTML += error;   
        } else {
            let p = crearParrafo(error);
            document.body.appendChild(p);
        }
    } else {
        //Le mostramos al usuario por texto en documento cuanto ha durado
        if (etiqueta != null) {
            etiqueta.innerHTML += "La segunda llamada ha durado " + segundos + "sg\n";
        } else { //Si no le pasaramos una etiqueta crea un parrafo en su lugar
            let p = crearParrafo("La segunda llamada ha durado " + segundos + "sg\n");
            document.body.appendChild(p);
        }
        //Y llamamos a la funcion
        serverAnswerSim(5000, callback3, etiqueta, new Error("La llamada ha tardado mas de 4 segundos"));
    }
}

/*
 * E: Error (si existe), segundos
 * S: Nada, muestra al usuario si ha salido con exito
 */
function callback3(error, segundos, etiqueta) {
    if (error) {
        //Si existe el error (Es decir que ha llegado un objeto de tipo error)
        //Se maneja el error aqui
        if (etiqueta != null) {
            etiqueta.innerHTML += error;   
        } else {
            let p = crearParrafo(error);
            document.body.appendChild(p);
        }
    } else {
        //Le mostramos al usuario por texto cuanto ha durado
        if (etiqueta != null) {
            etiqueta.innerHTML += "La tercera llamada ha durado " + segundos + "sg\n";
            //Y ademas que todo ha ido con exito
            etiqueta.innerHTML += "Hemos terminado todo perfecto";
        } else { //Pero si no mandamos una etiqueta
            //Creamos parrafos en su lugar
            let p = crearParrafo("La tercera llamada ha durado " + segundos + "sg\n");
            document.body.appendChild(p);
            let p2 = crearParrafo("Hemos terminado todo perfecto");
            document.body.appendChild(p2);
        }
    }
}

/*
 * E: Un objeto de respuesta
 * S: nada, muestra en una tabla los datos de este
*/
function mostrarDatos(response) {
    let json = response.json();
    console.log(json);
    createTable(json);
}