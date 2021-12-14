function esFecha(frase)
{
    if (frase.length != 10)
        return false;
    if (frase[2] != '/' || frase[5] != '/')
        return false;
    let dia = frase.substring(0, 2);
    let mes = frase.substring(3, 5);
    let anio = frase.substring(6);
    if (Number.isNaN(parseInt(dia)) || Number.isNaN(parseInt(mes)) || Number.isNaN(parseInt(anio)))
        return false;
    dia = parseInt(dia);
    mes = parseInt(mes);
    anio = parseInt(anio);
    if (EsMayorHoy(dia, mes, anio)) {
        return false;
    } else {
        if (esFechaCorrecta (dia, mes, anio))
        return true;
    return false;
    }
    
}

function esFechaCorrecta (dia, mes, anio) 
{
    if (dia < 1)
        return false;
    switch (mes)
    {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            if (dia > 31)
                return false;
            break;
        case 4: case 6: case 9: case 11:
            if (dia > 30)
                return false;
            break;
        case 2:
            if (anio % 4 == 0 && ! (anio % 100 == 0 && anio % 400 != 0))
            {
                if (dia > 29)
                    return false;
            }
            else
            {
                if (dia > 28)
                    return false;
            }
            break;
        default: 
            return false;
    }
    return true;
}

function dividirFecha (frase)
{
    if ( ! esFecha (frase))
        return null;
    let a = frase.split("/");
    for (let i=0; i<a.length; i++)
    {
        a[i] = parseInt(a[i]);
    }
    return a;
}
function EsMayorHoy(dia, mes, anio) {
    let hoy = new Date();

    let dia_hoy = hoy.getDate();
    let mes_hoy = hoy.getMonth();
    let anio_hoy = hoy.getFullYear();

    let mes_actual = mes - 1;

    if (anio <= anio_hoy && mes_actual <= mes_hoy) {
        return false;
    } else {
        if (anio == anio_hoy && mes_actual == mes_hoy && dia <= dia_hoy) {
            return false;
        } else {
            return true;
        }
    }
}

function EsFechaMayor(fecha1, fecha2) {
    let primera = dividirFecha(fecha1);
    let segunda = dividirFecha(fecha2);

    if (segunda[2] <= primera[2] && segunda[1] <= primera[1]) {
        return false;
    } else {
        if (segunda[2] == primera[2] && segunda[1] == primera[1] && segunda[0] <= primera[0]) {
            return false;
        } else {
            return true;
        }
    }

}