function mostrarAlmacen(etiqueta) {
    //Vaciamos la etiqueta
    etiqueta.innerHTML = "";
    if (window.localStorage) {
        //LocalStorage esta activado
        etiqueta.innerHTML += "<br>Claves de LocalStorage: <br>";
        for (let i = 0; i < localStorage.length; i++) {
            let clave = localStorage.key(i);
            etiqueta.innerHTML += "La clave '" + clave + "' contiene el valor '" + localStorage.getItem(clave) + "'<br/>";
        }
    } else {
        //LocaStorage no esta activado
        throw new Error("LocalStorage no esta activado!");
    }

    if (window.sessionStorage) {
        //SessionStorage esta activado
        etiqueta.innerHTML += "<hr>Claves de SessionStorage: <br>";
        for (let i = 0; i < sessionStorage.length; i++) {
            let clave = sessionStorage.key(i);
            etiqueta.innerHTML += "La clave '" + clave + "' contiene el valor '" + sessionStorage.getItem(clave) + "'<br/>";
        }
    } else {
        //SessionStorage no esta activado
        throw new Error("SessionStorage no esta activado!");
    }

}