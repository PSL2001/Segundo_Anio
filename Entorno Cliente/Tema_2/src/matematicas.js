function calcularPotencia(r, e) { // E: Un numero real y un numero entero S: La potencia de ese numero
    if (e < 0) { // Si el entero fuera negativo
        alert("Has escrito un numero entero negativo");
    } else {
        let resultado = 1; //El resultado debe empezar en 1 por que si empezamos
        for (let i = 0; i < e; i++) { // Para hacer la potencia sin el pow, hacemos un bucle en el que multiplicamos ese numero las mismas veces que un entero
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

function mcd(n1, n2) { //E: 2 numeros enteros, S:Booleano si no encuentra divisores o el divisor
    if (isNaN(n1) || isNaN(n2)) {
        return false;
    } else {
        let divisor = 0; //Guardamos el divisor como el 2do numero
        for (let i = n2; i > 1; i--) { //En el bucle for vamos quitando el valor en 1 
            if (n1 % i == 0 && n2 % i == 0) { //Si tanto n1 % i == 0 y n2 % i == 0, entonces tenemos un divisor
                divisor = i; //Guardamos ese divisor
            }
        }
        if (divisor == 0) { //Si el divisor fuera 0, entonces es que no ha encontrado ninguno
            return false;
        } else {
            return divisor; //Si fuera otro valor, entonces ha encontrado el maximo comun divisor
        }
    }

}

function mcdE(n1, n2) { //E: Entero S:Booleano si alguno de los valores no es un numero o un entero siendo este el mcd
    if (isNaN(n1) || isNaN(n2)) { // Si alguna de las 2 variables no es un numero, nos vamos
        return false;
    } else {
        while (n2 != 0) { // En otro caso, mientras que n2 sea distinto de 0 calculamos el resto de los numeros, sabremos que tenemos su mcd cuando n2 = 0;
            let aux = n1;
            n1 = n2;
            n2 = aux % n2
        }
        return n1; //Devolvemos n1 que tiene nuestro divisor
    }
}

function calculoPrimerGrado(b,c) { // E: Dos numeros enteros S: El resultado de la equacion bx + c = 0 o booleano si b == 0
    let x; //Inicializamos x
    if (b == 0) { //Si b == 0, la ecuacion no se podria hacer, ya que no se puede dividir entre 0
        return false;
    } else { //Si b no es 0                                             -c
        x = -c/b; // Hacemos la equacion que quedaria tal que asi: x = 
        return x;
    }
}

function calculoSegundoGrado(a,b,c) { //E: 3 enteros S:Sin Solucion, 1 respuesta o 2 respuestas
    let x;
    let x1;
    let x2;
    if (a == 0) { // Si a es 0 entonces no es una equacion de 2ºdo grado
        return false;
    } else {
        let calc1 = (Math.pow(b,2)) - (4*a*c); // En caso contrario calculamos b² - 4ac
        if (calc1 < 0) { //Si ese calculo es menor a 0 entonces la solucion es irreal
            return false;
        } else if (calc1 == 0) { // Si el calculo es igual a 0, entonces tiene una unica solucion
            x = -b/(2*a);
            return x; // Devolvemos esa solucion
        } else if (calc1 > 0) { //Si el calculo es mayor a 0 entonces tiene una solucion doble
          x1 = parseFloat(-b + Math.sqrt(calc1)/2*a);
          x2 = parseFloat(-b - Math.sqrt(calc1)/2*a); 
          let soluciones = [x1,x2]; //Guardamos las soluciones en un array
          return soluciones; // devolvemos dicho array
          //alert("Solucion 1 " + x1 + "\n Solucion 2 " + x2);
        } 

    }
}

//E: 2 enteros positivos S: El valor de la hipotenusa
function calculoHipotenusa(n1, n2) {
    if (isNaN(n1) || isNaN(n2)) { //Primero comprobamos que los 2 enteros son numeros
        return false;
    } else if (n1 < 0 || n2 < 0) { //Luego comprobamos que n1 y n2 son mayor a 0
        return false;
    } else { //Si son numeros y mayores a 0 calculamos la hipotenusa
        let calculo = (n1*n1) + (n2*n2);
        let resu = Math.sqrt(calculo);
        let res = Math.round(resu * 100) / 100;
        return res;
    }
}