

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

function createLink(link, msg) {
    //Primero creamos el elemento de enlace
    let a = document.createElement("a");
    if (link) { //Si nos han pasado un enlace
        //Añadimos el atributo href con dicho enlace (ten en cuenta que link tiene que llevar .com al final de este)
        a.setAttribute("href", "http://www." + link);
    } else { //Si no nos llegara el enlace
        //Añadimos un #
        a.setAttribute("href", "#");
    }
    if (msg) { //Si nos ha llegado un mensaje
        //Añadimos el texto y lo añadimos al enlace
        let texto = document.createTextNode(msg);
        a.appendChild(texto); 
    } else { //En otro caso
        //Añadimos entonces un texto por defecto y lo añadimos al enlace
        let texto = document.createTextNode("Texto por defecto");
        a.appendChild(texto);
    }
    //Por ultimo devolvemos el enlace
    return a;
    
}

function createBr(texto) {
    //La frase espera un texto en string, cuando recive el texto lo separa en un array por puntos
    let frases = texto.split(".");
    //Creamos otra variable que es una cadena vacia
    let textoBr = "";
    for (let i = 0; i < frases.length; i++) {
        //Para cada posicion del array, le añadimos la frase misma mas un <br>
        textoBr += frases[i] + "<br>";
    }
    //Devolvemos el texto
    return textoBr;
}