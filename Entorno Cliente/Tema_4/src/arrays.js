function generarArray(f, c) {
    let array = new Array(f);
    for (let i = 0; i < f; i++) {
        array[i] = new Array(f);
        for (let j = 0; j < c; j++) {
            let valor = random(1, 50);
            array[i][j] = valor;
        }
    }
    return array;
}