function mostrarAlmacen(etiqueta) {
    if (window.localStorage) {
        //LocalStorage esta activado
        for (let i = 0; i < localStorage.length; i++) {
            let clave = localStorage.key(i);
            etiqueta.innerHTML += "La clave '" + clave + "' contiene el valor '" + localStorage.getItem(clave) + "'<br/>";
        }
    } else {
        //LocaStorage no esta activado
        throw new Error("LocalStorage no esta activado!");
    }
}