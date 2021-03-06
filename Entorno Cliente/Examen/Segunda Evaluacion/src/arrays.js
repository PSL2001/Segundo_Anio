function generarArray(f, c) {
    let array = new Array(f); //Primero creamos el array 
    for (let i = 0; i < f; i++) { //Por tantas filas que nos pasen
        array[i] = new Array(f); //Creamos otro array (2da dimension)
        for (let j = 0; j < c; j++) { //Recorriendo la segunda dimension
            let valor = random(1, 50); //Generamos el valor aleatorio
            array[i][j] = valor; // Ponemos el valor en el array
        }
    }
    return array; //Devolvemos el array
}
function generarArray10(f, c) {
    let array = new Array(f); //Primero creamos el array 
    for (let i = 0; i < f; i++) { //Por tantas filas que nos pasen
        array[i] = new Array(f); //Creamos otro array (2da dimension)
        for (let j = 0; j < c; j++) { //Recorriendo la segunda dimension
            let valor = random(0, 10); //Generamos el valor aleatorio
            array[i][j] = valor; // Ponemos el valor en el array
        }
    }
    return array; //Devolvemos el array
}

function mostrarArray(array) {
    for (let i = 0; i < array.length; i++) {
        let p = document.createElement("p");
        for (let j = 0; j < array[0].length; j++) {
            let pTexto = document.createTextNode(array[i][j] + " ");
            p.appendChild(pTexto);
        }
        document.body.appendChild(p);
    }
}

function generarTabla(array) {
    let tabla = document.createElement("table"); // Creamos un elemento de tabla
    let tblBody = document.createElement("tbody"); // Creamos el elemento tbody
    for (let i = 0; i < array.length; i++) { //Recorremos la primera dimension
        let hilera = document.createElement("tr"); //Creamos una hilera (tr)
        //Bucle que recorre el array que está en la posición i
        for (let j = 0; j < array[0].length; j++) { // Recorremos la 2da dimension
            let celda = document.createElement("td"); //Creamos un elemento td
            let textoCelda = document.createTextNode(array[i][j]); //Le pasamos el valor que contiene el array
            celda.appendChild(textoCelda); //Convinamos la celda 
            hilera.appendChild(celda); // convinamos la hilera
        }
        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
    }
    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // juntamos <table> con <body>
    document.body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";
    tabla.setAttribute("border", "2");
}

function buscarMax(array) {
    let max = Number.MIN_VALUE; //Declaramos maximo como el numero mas pequeño posible (Number.MIN_VALUE)
    for (let i = 0; i < array.length; i++) {//Recorremos la primera dimension
        for (let j = 0; j < array[i].length; j++) {  //Recorremos la segunda
            if (array[i][j] > max) { //Si el valor es mayor al maximo
                max = array[i][j]; //Le ponemos ese valor
            }
        }
    }
    return max; //Devolvemos maximo
}

function sumar(array) {
    let suma = 0; //Tenemos acumulador
    for (let i = 0; i < array.length; i++) { //Recorremos la primera dimension del array
        for (let j = 0; j < array[0].length; j++) { // Recorremos la segunda dimension
            suma += array[i][j]; // Sumamos el valor
        }
    }
    return suma; //Devolvemos suma
}

function sumarFilas(array) {
    for (let i = 0; i < array.length; i++) { //Por cada fila
        let suma_fila = 0; //declaramos una variable igual a 0
        for (let j = 0; j < array[i].length; j++) { // y en las columnas
            suma_fila += array[i][j]; //Sumamos el total con el valor
        }
        document.body.innerHTML += "La suma de la fila " + i + " es igual a " + suma_fila + "<br>"; //Imprimimos el resultado por el doc
    }
}

function mediaArray(array) {
    let suma = sumarFilas(array); //Para obtener el total hacemos la sumatoria de las filas
    //La media se calcula con el total / cantidad
    let media = suma / array.length; //Dividimos la sumatoria entre la longitud, que es nuestra cantidad

    return media; //Devolvemos la media
}

function generarArrayTras(array) {
    let nuevoArr = array[0].map((col, i) => array.map(row => row[i])); //Mapeamos las columnas con el valor i, las cuales mapeamos con filas que devuelven la fila de i 
    return nuevoArr; //Devolvemos el array
}

function sumaArray(a1, a2) {
    let total = 0; //Creamos una variable que acumule el resultado
    for (let i = 0; i < array.length; i++) { // Recorremos la primera dimension
        for (let j = 0; j < array[i].length; j++) { // Recorremos la segunda dimension
            total += a1[i][j] + a2[i][j]; //Sumamos los valores
        }
    }
    return total; //devolvemos el total
}

function sonIguales(a1, a2) {
    let i = a1.length; //Guardamos la longitud del primer array
    if (i != a2.length) return false; //Si el 2do array no tuviera la misma longitud, no son iguales

    while (i--) { //Mientras reducimos i
        if (a1[i] !== a2[i]) return false; // Si el resultado de a1[i] es distinto del a2[i], no son iguales
    }
    return true; //Si nada salta entonces son iguales
}

function multiplicarArrays(a1, a2) {
    //Guardamos las filas y columnas de los arrays
    let fila_a1 = a1.length;
    let col_a1 = a1[0].length;

    let fila_a2 = a2.length;
    let col_a2 = a2[0].length;

    if (col_a1 != fila_a2) { //Si la columna del primer array es distinta a la fila de la segunda, no podemos multiplicar
        return false;
    }

    let multiplicacion = new Array(fila_a1); //Creamos un tercer array
    for (x = 0; x < multiplicacion.length; x++) {
        multiplicacion[x] = new Array(col_a2).fill(0); //Llenamos el array con 0
    }

    for (let i = 0; i < multiplicacion.length; i++) { //Ahora recorremos los arrays
        for (let j = 0; j < multiplicacion[i].length; j++) {
            for (let z = 0; z < col_a1; z++) {
                multiplicacion[i][j] = multiplicacion[i][j] + a1[i][z] * a2[z][j]; //Siendo el resultado la multiplicacion de a1[i][z] * a2[z][j]
            }
        }
    }
    return multiplicacion;
}

function sumarDiagonal(array) {
    //Principal: arriba izquierda a abajo derecha
    let suma = 0; //tenemos una variable suma
    for (let i = 0; i < array.length; i++) { //Recorriendo la primera dimension
        suma += array[i][i]; //Sumamos solo aquellos que tengan las mismas coordenadas (0,0 1,1 2,2....)
    }
    return suma; //Devolvemos la suma
}

function esSimetrica(array) {
    for (let fila = 1; fila < array.length; fila++) { //Recorremos el array por filas
        for (let columna = 0; columna < fila; columna++) { // Y recorremos estas por columnas
            if (array[fila][columna] != array[columna][fila]) { //Si el resultado de fila y columna, es distinto del resultado de columna fila,
                return false; //Entonces no es simetrica
            }
        }
    }
    return true; //Si no saltara la condicion, entonces es simetrica
}