

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

function cambiaColor(input, color) {
    //La funcion recoje tanto el input como el color y cambia el color de fondo
   input.style = "background-color: " + color + ";"; 
}

function rotate(event) {
    //Guardamos el elemento y el tipo de evento que han llamado a la funcion
    let imagen = event.target;
    let tipo = event.type;

    if (tipo == "click") { //Si el tipo de evento era un click (click izquierdo)
        imagen.style.transform += "rotate(90deg)"; //Rotamos 90º
    } else if (tipo == "contextmenu") { //Pero si se ha abierto el menu de contexto (funcion default del click derecho)
        imagen.style.transform += "rotate(-90deg)"; //Rotamos en el sentido contrario
    }
}