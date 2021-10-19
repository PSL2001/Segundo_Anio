function EsPositivo(n) {
    if (isNaN(n)) {
        alert("Ups... " + n + " no es un número.");
    } else {
        if (n >= 0) { // Si el numero es mayor o igual a 0, decimos que es positivo
            alert(n + " es positivo");
        } else { // En caso contrario decimos que no es positivo
            alert(n + " no es positivo");
        }
    }
}

function EsReal(real) {
    if (isNaN(real)) { //Si pasamos algo que no es un numero, lo mostramos
        alert("Ups... " + real + " no es un número.");
    } else {
        if (real % 1 == 0) { //Si el cociente dividido entre 1 es 0
            alert(real + " es un numero entero"); //Entonces es un entero
        } else { // Pero en caso contrario
            alert(real + " es un numero real"); // Es un numero real
        }
    }
}

function EsLogico(n) {
    //Se considera un operador logico aquella que tenga un valor verdadero o falso, es decir si es booleano o no
    if (n == "true" || n == "false") { //Asi que si el tipo de n es un booleano, entonces es cierto
        alert(n + " es un operador logico/booleano");
    } else {
        alert(n + " NO es un operador logico/booleano");
    }
}

function EsCaracter(n) {
    if (n.length == 1) { // Dado que un caracter puede estar en un string, para confirmar que es un caracter, su longitud debe ser 1
        alert(n + " es un caracter");
    } else {
        alert(n + " no es un caracter");
    }
}

function EsFrase(n) {
    let trimeada = n.replace(/ /g, ""); //Primero reemplazamos los espacios en blanco con caracteres vacios
    if (n != trimeada) { //Si son diferentes, entonces es que es una frase
        alert(n + " es una Frase");
    } else {
        alert(n + " no es una frase");
    }
}

function EsPalabra(n) {
    //Aqui seguimos el mismo proceso que en EsFrase
    let trimeada = n.replace(/ /g, ""); //Primero reemplazamos los espacios en blanco con caracteres vacios
    if (n == trimeada) { //Si son iguales, entonces es una palabra
        alert(n + " es una Palabra");
    } else {
        alert(n + " no es una Palabra");
    }
}