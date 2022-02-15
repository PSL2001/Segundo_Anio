/*
* E: Cantidad de segundos y una funcion a llamar
* S: Nada
*/
function serverAnswerSim(segundos, callback, etiqueta) {
    etiqueta.innerHTML += "Llamada al servidor de "+ segundos +"sg\n"; //Primero mostramos al usuario cuanto dura la llamada simulada
    setTimeout(function () { //Ahora simulamos con timeout una llamada que durara los segundos dados
        callback(false, segundos, etiqueta) //Llamamos a la funcion
    },segundos)
} //Fin de la funcion

/*
* E: Error (si existe), segundos
* S: Llamada a la funcion serverAnswerSim con un tiempo dado
*/
function callback(error, segundos, etiqueta) {
    if (error) { //Si existe el error (Es decir que ha devuelto true)
        //Se maneja el error aqui
        throw new Error("Ha ocurrido un error");
    } else {
        //Le mostramos al usuario por consola cuanto ha durado
        etiqueta.innerHTML += "La primera llamada ha durado "+ segundos +"sg\n";
        //Y llamamos a la funcion
        serverAnswerSim(3000, callback2, etiqueta)
    }
}

/*
* E: Error (si existe), segundos
* S: Llamada a la funcion serverAnswerSim con un tiempo dado
*/
function callback2(error, segundos, etiqueta) {
    if (error) {
        //Si existe el error (Es decir que ha devuelto true)
        //Se maneja el error aqui
        throw new Error("Ha ocurrido un error");
    } else {
        //Le mostramos al usuario por consola cuanto ha durado
        etiqueta.innerHTML += "La segunda llamada ha durado " + segundos + "sg\n";
        //Y llamamos a la funcion
        serverAnswerSim(4000, callback3, etiqueta);
    }
}

/*
* E: Error (si existe), segundos
* S: Nada, muestra al usuario si ha salido con exito
*/
function callback3(error, segundos, etiqueta) {
    if (error) {
        //Si existe el error (Es decir que ha devuelto true)
        //Se maneja el error aqui
        throw new Error("Ha ocurrido un error");
    } else {
        //Le mostramos al usuario por consola cuanto ha durado
        etiqueta.innerHTML += "La tercera llamada ha durado " + segundos + "sg\n";
        //Y mostramos que todo ha ido con exito
        etiqueta.innerHTML += "Hemos terminado todo perfecto";
    }
}