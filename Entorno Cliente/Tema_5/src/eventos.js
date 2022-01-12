

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
    
}