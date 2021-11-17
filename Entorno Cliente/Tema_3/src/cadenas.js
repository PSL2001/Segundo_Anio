function buscarFun(frase, caracter) {
    let encontrado = false;

    if (frase.includes(caracter) == true) { 
        encontrado = true;
    }
    return encontrado;
}

function buscarsinFun(frase, caracter) {
    let encontrado = false;
    for (let i = 0; i < frase.length; i++) {
        if (frase[i] == caracter) {
            encontrado = true;
        }
    }
    return encontrado;
}