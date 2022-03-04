/*
 * E: Nombre de la cookie (string), valor de la cookie (string), dias de expiracion (int)
 * S: Nada, crea una cookie en el navegador
 */
function setCookie(cname, cvalue, exdays) {
    //Creamos una variable de tipo fecha
    const fecha = new Date();
    //Esa fecha le seteamos el tiempo (en milisegundos)
    fecha.setTime(fecha.getTime() + (exdays*24*60*60*1000))
    //Y la convertimos en un UTC String (tiempo universal coordinado)
    //Esto sera nuestra fecha de caducidad
    let fecha_exp = "expires=" + fecha.toUTCString();
    //Por ultimo creamos la cookie
    document.cookie = cname + "=" + cvalue + ";" + fecha_exp;
}
/*
 * E: Nombre de la cookie (string)
 * S: Valor de la cookie o false si no se encuentra
 */
function getCookie(cname) {
    //Primero guardamos la variable del nombre
    let nombre = cname + "=";
    //Descodificamos la cookie
    let cookie_desc = decodeURIComponent(document.cookie);
    //Separamos las cookies
    let cookies = cookie_desc.split(";");
    //Y recorremos las cookies
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        //Quitamos los espacios
        cookie = cookie.trim();
        //Si la posicion de la cookie es 0 (es decir si existe la cookie)
        if (cookie.indexOf(nombre) == 0) {
            return cookie.substring(nombre.length, cookie.length); //Devolvemos el valor
        }
    }
    //Pero si no, devolvemos falso
    return false;
}
/*
 * E: Nombre de la cookie (string)
 * S: False si no se encuentra o nada si borra la cookie
 */
function removeCookie(cname) {
    //Primero comprobamos que la cookie existe
    let cookie = getCookie(cname);
    if (cookie == false) { //Si nos devuelve falso entonces es que la cookie no existia
        return false;
    } else { //En otro caso
        //Eliminamos el valor que tuviera y ponemos una fecha de caducidad ya pasada
        document.cookie = cname + "=;" + "expires = Thu, 01 Jan 1970 00:00:00 GMT";
        //Y devolvemos un string que dice que la cookie ha sido borrada
        return "Cookie " + cname + " eliminada con exito";
    }

}
/*
 * E: Etiqueta HTML
 * S: Nada solo muestra las cookies en la etiqueta dada
 */
function mostrarCookies(etiqueta) {
    etiqueta.textContent = document.cookie;
}

