function calcularPotencia(r, e) {
    let resultado = r;
    if (e < 0) {
        alert("Has escrito un numero entero negativo");
    } else {
        for (let i = 1; i < e; i++) {
            resultado *= e; 
        }
        return resultado;
    }
}