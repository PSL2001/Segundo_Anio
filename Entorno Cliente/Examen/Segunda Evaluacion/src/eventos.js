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
    let inputs = document.getElementsByTagName("input");

    if (tecla == "Enter") { //Si es enter, empieza a recorrer los inputs del documento
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i] == input && inputs[i+1] != undefined) { //Y si son el mismo y ademas el siguiente existe
                inputs[i+1].focus(); //Se concentra en el siguiente de este
                return;   //Y se va de la funcion
            } else { //Pero si no
                inputs[0].focus(); //Nos concentramos en el primero otra vez
            } 
        }
    }
}

function cambiaColor(input, color) {
    //La funcion recoje tanto el input como el color y cambia el color de fondo
    input.style = "background-color: " + color + ";";
}

function rotate(event) {
    //Guardamos el elemento y el tipo de evento que han llamado a la funcion
    let elemento = event.target;
    let tipo = event.type;

    if (tipo == "click") { //Si el tipo de evento era un click (click izquierdo)
        elemento.style.transform += "rotate(90deg)"; //Rotamos 90??
    } else if (tipo == "contextmenu") { //Pero si se ha abierto el menu de contexto (funcion default del click derecho)
        elemento.style.transform += "rotate(-90deg)"; //Rotamos en el sentido contrario
    }
}


function numeroEnlaces() {
    let enlaces = document.getElementsByTagName("a"); //Primero cojemos los elementos de enlace del documento
    return enlaces.length; //Devolvemos la longitud de este array que son el numero de enlaces
}

function penultimoA() {
    let enlaces = document.getElementsByTagName("a"); //Primero guardamos todos los enlaces del documento
    let penultimo = enlaces[enlaces.length - 2]; //Y para obtener el penultimo le quitamos 2 a la longitud (Si quitando 1 devuelve la posicion, quitando 2 devuelve el penultimo)
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
    if (texto) { //Si fuera a pasar texto a introducir el parrafo
        let pText = document.createTextNode(texto); //Creamos una variable que tiene el texto
        p.appendChild(pText);
    }
    return p;
}

function createLink(link, msg) {
    //Primero creamos el elemento de enlace
    let a = document.createElement("a");
    if (link) { //Si nos han pasado un enlace
        //A??adimos el atributo href con dicho enlace (ten en cuenta que link tiene que llevar .com al final de este)
        a.setAttribute("href", "http://www." + link);
    } else { //Si no nos llegara el enlace
        //A??adimos un #
        a.setAttribute("href", "#");
    }
    if (msg) { //Si nos ha llegado un mensaje
        //A??adimos el texto y lo a??adimos al enlace
        let texto = document.createTextNode(msg);
        a.appendChild(texto);
    } else { //En otro caso
        //A??adimos entonces un texto por defecto y lo a??adimos al enlace
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
        //Para cada posicion del array, le a??adimos la frase misma mas un <br>
        textoBr += frases[i] + "<br>";
    }
    //Devolvemos el texto
    return textoBr;
}

function countWords(texto) {
    //Separa el texto por espacios siendo la longitud del nuevo array, las palabras que existen
    let palabras = texto.split(" ");
    return palabras.length;
}

/*
 * E: Texto (normalmente en un array) string
 * E2: Boolean, que me dicta si el usuario quiere la lista ordenada o no
 * S: Una lista tanto ordenada como desordenada
 */
function crearLista(textoArr, ordenada) {
    if (!ordenada) { //Si el usuario no la quiere ordenada (ordenada = false)
        let ul = document.createElement("ul"); //Creamos una lista desordenada (ul)
        for (let i = 0; i < textoArr.length; i++) { // Y para cada texto que exista en el array
            let li = document.createElement("li"); //Creamos una etiqueta li
            let textLi = document.createTextNode(textoArr[i]); //Le a??adimos el texto
            li.appendChild(textLi); //Y combinamos tanto texto como li al ul
            ul.appendChild(li);
        } //Fin de For
        return ul; //Por ultimo devolvemos la lista desordenada
    } else { //Si se da el caso contrario
        let ol = document.createElement("ol"); //Creamos una lista ordenada (ol)
        for (let i = 0; i < textoArr.length; i++) { // Y Para cada texto que exista en el array
            let li = document.createElement("li"); //Creamos una etiqueta li
            let textLi = document.createTextNode(textoArr[i]); //Le a??adimos el texto correspondiente
            li.appendChild(textLi); //Y combinamos texto con la lista ordenada
            ol.appendChild(li);
        } //Fin de For
        return ol; //Devolvemos la lista
    } //Fin de If
} //Fin de Funcion

/*
 * E: La etiqueta
 * S: El nuevo color
 */
function cambioFondo(etiqueta, nuevoColor) {
    //Guardamos el color de fondo de la etiqueta
    let color = etiqueta.style.backgroundColor;
    if (color == nuevoColor) { //Si el color de la etiqueta es el mismo al color
        color = "white"; //Lo ponemos blanco
    } else if (color = "" || color != nuevoColor) { //Pero si este esta vacio o son distintos al color de la etiqueta
        color = nuevoColor; //Le asignamos ese valor
    } //Fin de If
    //Y devolvemos el color
    return color;
} //Fin de funcion

function changeSize(etiqueta, tamanio) {
    //Cambiamos el estilo de la etiqueta y aniadimos el tamanio en pixeles
    etiqueta.style = "font-size:" + tamanio + "px;";
}
/*
 * E: string Texto
 * S: devuelve el texto con la primera mayuscula
 */
function capitalize(texto) {
    let mayus = texto.charAt(0).toUpperCase();
    let minus = texto.slice(1);
    let capitalizado = mayus + minus;
    return capitalizado;
}
/*
 * E: Array con opciones, id (opcional)
 * S: devuelve un objeto select
 */
function createSelect(opciones, id) {
    let select = document.createElement("select");
    for (let i = 0; i < opciones.length; i++) {
        let option = document.createElement("option");
        option.setAttribute("value", i + 1);
        let optionTexto = document.createTextNode(opciones[i]);
        option.appendChild(optionTexto);
        select.appendChild(option);
    }
    if (id == "") {
        return select;
    } else {
        select.setAttribute("id", id);
        return select;
    }
}
/*
 * E: texto
 * S: devuelve una etiqueta de tipo label
 */
function createLabel(texto) {
    let label = document.createElement("label");
    label.innerHTML = texto;

    return label;
}
/*
 * E: Contenido (array), id (opcional)
 * S: Objeto Div
 */
function createDiv(contenido, id) {
    let div = document.createElement("div");
    for (let i = 0; i < contenido.length; i++) {
        div.appendChild(contenido[i]);
    }

    if (id == "") {
        return div;
    } else {
        div.setAttribute("id", id);
        return div;
    }
}
/*
 *
 */
function createSpan(mensaje, id) {
    let span = document.createElement("span");
    if (mensaje) {
        let SText = document.createTextNode(mensaje);
        span.appendChild(SText);
    }
    if (id != "") {
        span.setAttribute("id", id);
    }
    return span;
}
/*
 *
 */
function createInput(tipo, id) {
    let input = document.createElement("input");
    input.setAttribute("type", tipo);
    if (id) {
        input.setAttribute("id", id);
    }
    return input;
}
/*
 *
 */
function rellenarInput(etiqueta, input, valores) {
    switch (etiqueta.value) {
        case "1":
            input.value = valores[0];
            break;
        case "2":
            input.value = valores[1];
            break;
        case "3":
            input.value = valores[2];
            break;
        default:
            break;
    }
}
/*
 * E: string (Id de elemento)
 * S: Nada solo borra el elemento
 */
function eliminarElemento(id) {
    let elemento = document.getElementById(id); //Primero busca al elemento con la id
    if (!elemento) { //Si no lo encuentra o es nulo
        return false; //Devuelve un false (para escribir un error por si falla)
    } else { //Pero si existe
        let padre = elemento.parentNode; //Llama al padre del elemento
        padre.removeChild(elemento); //Y el padre elimina dicho elemento
    }
}

/*
 * E: String (el script a cargar), etiqueta HTML (opcional) ,funcion a llamar, boolean (opcional)
 * S: Nada
 */
function loadScript(src, etiqueta ,usaPromesas) {
    if (!usaPromesas) {
        //Primero creamos un elemento script
        let script = document.createElement("script");
        //A dicho elemento, le a??adimos el atributo src cuyo valor es el que recibimos en el parametro
        script.src = src;

        //Creamos dos eventos a escuchar por el script
        //El primero es para cuando carga con exito
        script.addEventListener("load", function () {
            if (etiqueta) {
                etiqueta.innerHTML += "Se ha cargado el script con exito \n";
            } else {
                //Se crea un elemento parrafo el cual nos dice que ha salido con exito
                let p = crearParrafo("Se ha cargado el script con exito");
                document.body.appendChild(p);
            }
            
        });
        //La segunda es en caso de error
        script.addEventListener("error", function () {
            if (etiqueta) {
                etiqueta.innerHTML += new Error("Ha habido un error al cargar el script con " + src + "\n");
            } else {
                //Crea un elemento de tipo error que escribe en el parrafo
                let p = crearParrafo(new Error("Ha habido un error al cargar el script con " + src));
                //Inserta dicho parrafo en el documento
                document.body.appendChild(p);
            }
            //Y ademas elimina ese elemento del head
            document.head.removeChild(script);
        });
        //Al final despues de escribir dichos eventos, se a??ade la etiqueta al head
        document.head.append(script);
    } else {
        let crearScript = new Promise(function (resolve, reject) {
            //Primero creamos un elemento script
            let script = document.createElement("script");
            //Guardamos ademas cuantos scripts hay en el documento. Lo necesitaremos luego
            let scripts = document.getElementsByTagName("script");
            //A dicho elemento, le a??adimos el atributo src cuyo valor es el que recibimos en el parametro
            script.src = src;
            //Le a??adimos ademas un id para en caso luego tener que borrarlo, esta id es la cantidad de scripts que hay en el documento
            script.id = scripts.length;
            //Al final despues de escribir dichos eventos, se a??ade la etiqueta al head
            script.onload = () => resolve("Se ha cargado el script con exito"); //Resolve si todo ha ido bien con la carga
            script.onerror = () => reject(new Error("Ha habido un error al cargar el script con " + src)); //Reject si no

            document.head.append(script);
            
        });
        //Al final devolvemos la promesa
        return crearScript;
    } //Fin de if else
} //Fin de funcion

function createTable(datos) {
    let tabla = document.createElement("table");
    let tbody = document.createElement("tbody");

    //Crear las celdas
    for (let i = 0; i < array.length; i++) {
        //Aqui se crean las filas
        let fila = document.createElement("tr");
        for (let j = 0; j < array.length; j++) {
            //Aqui se crean las columnas
            let columna = document.createElement("td");
            let textoColumna = document.createTextNode(datos);
            columna.appendChild(textoColumna);
            fila.appendChild(columna);
        }
        tbody.appendChild(fila);
    }
    tabla.appendChild(tbody);
    document.body.appendChild(tabla);
    tabla.setAttribute("border", "2");

}

/*
 * E: El evento cargado (HTML), Id de la etiqueta de logs (string), Ficheroid (string), segundos (string) 
 *
 */ 
function crearScript(event, etiquetaId, fichero, segundos) {
    //La etiqueta de logs se recomienda un textarea
    //Primero vaciamos el contenido de este
    document.getElementById(etiquetaId).innerHTML = "";
    //Cojemos el boton/evento que haya llamado a esta funcion
    let boton = event.target
    //Guardamos la id
    let id = boton.id;
    //Guardamos las etiquetas del fichero a cargar y el tiempo
    let script = document.getElementById(fichero);
    let tiempo = document.getElementById(segundos);
    //Como timeout utiliza el tiempo en milisegundos, parseamos su valor y lo multiplicamos por 1000
    let real_sec = parseInt(tiempo.value)*1000;
    setTimeout(function() {
        //Dentro del timeout se validan los segundos y el fichero
        let val_sec = validarCampo(tiempo, /\d+/g, "Los segundos deben ser positivos \n", "Los segundos estan correctos \n");
        let val_script = validarCampo(script, /\w+(?=\.js)/g, "El script no sigue la pauta correcta para ser cargado \n", "El script esta correctamente escrito");
        if (id == "callback") { //Dependiendo de la id se hace con callbacks o promesas
            loadScript(script.value, document.getElementById(etiquetaId));   
        } else if (id == "promesas") {
            let nuevoScript = loadScript(script.value, document.getElementById(etiquetaId), true);
            nuevoScript.then(r => document.getElementById(etiquetaId).innerHTML += r).catch(r => document.getElementById(etiquetaId).innerHTML += r);
        }
        //Al final escribimos tambien los resultado de los segundos y el fichero
        document.getElementById(etiquetaId).innerHTML += val_sec + "\n" + val_script + "\n";
    }, real_sec);
}

/*
 * E: Datos (cookies)
 * S: Una tabla con todas la cookies
 */
function mostrarEnTabla(datos) {
    let tabla = document.createElement("table"); //Creamos la tabla
    let tbody = document.createElement("tbody"); // El tobdy
    let cookies = datos.split(";"); //Separamos las cookies por ; y de aqui sacamos el array

    for (let i = 0; i < cookies.length; i++) { //Para cada cookie creamos
        let hilera = document.createElement("tr"); //un tr
        let celda = document.createElement("td"); //un td
        let textoCelda = document.createTextNode(cookies[i]); //Un node de texto con la cookie
        //Combinamos los datos
        celda.appendChild(textoCelda);
        hilera.appendChild(celda);
        tbody.appendChild(hilera);
    }
    tabla.appendChild(tbody);
    document.body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";
    tabla.setAttribute("border", "2");
}