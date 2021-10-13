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
            alert("es un numero entero"); //Entonces es un entero
        } else { // Pero en caso contrario
            alert("es un numero real"); // Es un numero real
        }
    }
}
