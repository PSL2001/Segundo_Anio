

function cambiarColor(event) {
    let input = event.target; //Primero cojemos el objeto del evento
    let trigger = event.type; //Cojemos ademas, el tipo de evento
    if (trigger == "mouseover") { //Si el tipo del evento es un mouseover, comprobamos entonces que no esta vacio
        if (input.value == "") { //Si estuviera vacio
            input.style.backgroundColor = "red"; //Cambiamos el fondo
        } else { //En caso contrario
            input.style.color = "red"; //Cambiamos el color de la fuente
        }
    } else if (trigger == "mouseout") { //Si el tipo de evento es un mouseout, comprobamos si el campo sigue vacio o no
        if (input.value == "") { //si estuviese vacio
            input.style.backgroundColor = "white"; //cambiamos el color del fondo
        } else { //En caso contrario
            input.style.color = "black"; //Cambiamos el color de la fuente
            input.style.backgroundColor = "white"; //Y cambiamos el fondo (para que no se quede en rojo si se ha escrito)
        }
    }
}

function mostrarId(event) {
    let boton = event.target; //cogemos el evento
    alert("La id de este elemento es: " + boton.id); //mostramos en una alerta la id de este
}

function siguienteCampo(event) {
    let input = event.target; //Cojemos el objeto
    let tecla = event.key; //Cojemos la clave que se haya pulsado

    if (tecla == "Enter") { //Si es enter, se va al siguiente input
        input.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.focus();
    }
}


function numeroEnlaces() {
    let enlaces = document.getElementsByTagName("a"); //Primero cojemos los elementos de enlace del documento
    return enlaces.length; //Devolvemos la longitud de este array que son el numero de enlaces
}

function penultimoA() {
    let enlaces = document.getElementsByTagName("a"); //Primero guardamos todos los enlaces del documento
    let penultimo = enlaces[enlaces.length-2]; //Y para obtener el penultimo le quitamos 2 a la longitud (Si quitando 1 devuelve la posicion, quitando 2 devuelve el penultimo)
    return penultimo; //Devolvemos el enlace
}

function numeroEnlacesA(nomEnl) {
    let enlaces = document.getElementsByTagName("a"); //Guardamos los enlaces del documento
    let hrefs = []; //Hacemos ademas otro array que guarda los enlaces
    let cont = 0; // Y creamos un contador
    for (let i = 0; i < enlaces.length; i++) {
        hrefs[i] = enlaces[i].href; //Primero recorremos el array de enlaces y sacamos el href (cuyo atributo es el enlace en si)
    }
    for (let j = 0; j < hrefs.length; j++) {
        if (hrefs[j] == nomEnl) { //Ahora en el nuevo array, lo comparamos con la string de url que nos llega, si son iguales, sumamos uno al contador
            cont++;
        }
    }
    return cont; //Devolvemos el contador
}

function enlacesEnParrafo(numPar) {
    let parrafos = document.getElementsByTagName("p"); //Primero cojemos los parrafos del documento
    let posParrafo = numPar - 1; // Como los arrays empiezan en 0, restamos 1 al numero del parrafo que nos mandan
    let enlaces = parrafos[posParrafo].getElementsByTagName("a"); //Para obtener los enlaces cojemos del array de parrafos la posicion dada: parrafos[2].getElementsByTagName("a") por ejemplo
    return enlaces.length; //Devolvemos la longitud del array que son el numero de enlaces del parrafo
}

function crearParrafo(texto) { //Hice esta funcion extra para crear parrafos
    let p = document.createElement("p"); //Primero crea el elemento p
    if(texto){ //Si fuera a pasar texto a introducir el parrafo
        let pText = document.createTextNode(texto); //Creamos una variable que tiene el texto
        p.appendChild(pText);
    }
    return p;
}