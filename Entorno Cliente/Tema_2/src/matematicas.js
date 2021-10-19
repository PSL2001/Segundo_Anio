function calcularPotencia(r, e) { // E: Un numero real y un numero entero S: La potencia de ese numero
    if (e < 0) { // Si el entero fuera negativo
        alert("Has escrito un numero entero negativo");
    } else {
        let resultado = 1; //El resultado debe empezar en 1 por que si empezamos
        for(let i = 0; i < e; i++){ // Para hacer la potencia sin el pow, hacemos un bucle en el que multiplicamos ese numero las mismas veces que un entero
            resultado = resultado * r; // haciendo esto, el resultado que ahora tiene el mismo valor que el real va a multiplicarse por si mismo hasta llegar a e
        }  
        return resultado; // Y devolvemos el resultado que ahora esta elevado a su potencia
    }
}

function multiplicar(n1, n2) { // E: Dos numeros enteros S: numero multiplicado
    let res = 0; // Inicializamos la variable en 0
    if (n1 == 0 || n2 == 0) { // en caso de que alguno de los numeros sea 0, dejamos el resultado en 0
        res = 0;
    } else {
        for (let i = 0; i < n2; i++) { // Ahora en el bucle sumamos el resultado con n1 hasta que i = n2
            res += n1;
        }
    }
    return res; // Devolvemos el resultado
}

function esPrimo(n) { // E: Un numero entero S:Booleano true o false si el numero es primo
    if (n < 1) { // si el numero es menor es 1, el numero no es primo
        return false;
    }
    for (let i = 2; i < n; i++) {
        if (n % i == 0) { // Si algun numero entre n e i da de resto 0 significa que no es primo porque los primos son solo divisibles entre 1 y la unidad
            return false;
        } 
    }
    return true; // Si la funcion no se cumple significa que el numero es primo
}

function esPerfecto(n) { //E: Un entero S: Booleano que dice si es verdadero o falso
    let suma = 0;
    for (let i = 0; i < n; i++) { // i son los divisores que van desde i hasta el anterior de n (n - 1)
        if (n % i == 0) { //Si el resto da 0 entonces es que es un divisor
            suma = suma + i;
        } 
    }
    if (suma == n) { // Si al final la suma es igual a n, entonces el numero es perfecto
        return true; 
    } else {
        return false;
    }
}

function esAbundante(n) { //E: Numero entero S: booleano que dice si es abundante o no
    let suma = 0;
    for (let i = 0; i < n; i++) { // i son los divisores que van desde i hasta el anterior de n (n - 1)
        if (n % i == 0) { //Si el resto da 0 entonces es que es un divisor
            suma = suma + i;
        } 
    }
    if (suma > n) { // Si la suma es mayor a n entonces es un abundante
        return true;
    } else {
        return false;
    }
}

function sonAmigos(n1, n2) {
    let suma = 0;
    for (let i = 0; i < n1; i++) { // i son los divisores que van desde i hasta el anterior de n (n - 1)
        if (n1 % i == 0) { //Si el resto da 0 entonces es que es un divisor
            suma = suma + i;
        } 
    }
    if (suma == n2) { // Si la suma vale lo mismo que el numero 2, entonces son amigos
        return true;
    } else {
        return false;
    }
}