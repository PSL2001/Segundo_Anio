

function insertarPrincipio (a, ele)
{
    array.splice(0, 0, ele);
}

function insertarPrincipio1 (a, ele)
{
    for (let i=a.length-1; i>=0; i--)
    {
        a[i+1] = a[i];
    }
    a[0] = ele;
}

function insertarFinal (a, ele)
{
    array.push(ele);
}

function insertarFinal1 (a, ele)
{
    a[a.length] = ele;
}

function borrarPrincipio (a)
{
    return array.shift();
}

function borrarPrincipio1 (a)
{
    if (a.length == 0)
        return null;
    let ele = a[0];
    for (let i=0; i<a.length-1; i++)
    {
        a[i] = a[i+1];
    }
    //CUIDADO, ESTO NO BORRA LA ULTIMA POSICION
    //aunque ponga el ultimo elemento a null, sigue existiendo
    a[a.length-1] = null;
    //para borrar la ultima posicion hay que hacer pop
    a.pop();
    return ele;
}

function borrarFinal (a)
{
    return array.pop();
}

function borrarFinal1 (a)
{
    if (a.length == 0)
        return null;
    let ele = a[a.length-1];
    //CUIDADO, ESTO NO BORRA LA ULTIMA POSICION
    //aunque ponga el ultimo elemento a null, sigue existiendo
    a[a.length-1] = null;
    //para borrar la ultima posicion hay que hacer pop
    a.pop();
    return ele;
}

function insertarPosicion (a, ele, pos)
{
    array.splice(pos, 0, ele);
}

function insertarPosicion1 (a, ele, pos)
{
    for (let i=a.length-1; i>=pos; i--)
    {
        a[i+1] = a[i];
    }
    a[pos] = ele;
}

function generararray (num, max, min)
{
    let array = new Array();
    for (let i=1; i<=num; i++)
    {
        let n = Math.floor(Math.random() * (max-min+1) + min);
        array.push(n);
    }
    return array;
}

function calcularmaximo (a)
{
    let max = a[0];
    for (let i=1; i<a.length; i++)
    {
        if (a[i] > max)
            max = a[i];
    }
    return max;
}

function ordenararray (a)
{
    a.sort(function (n1, n2) {
        return n1 - n2;
    });
}




///////////// tarea 3

function crearmatriz (fil, col)
{
    let matriz = new Array (fil);
    for (let i=0; i<fil; i++) {
        matriz[i] = new Array (col);
    }
    return matriz;
}

function inicializarmatriz (matriz, min, max)
{
    for (let i=0; i<matriz.length; i++)
    {
        for (let j=0; j<matriz[0].length; j++)
        {
            matriz[i][j] = Math.floor(Math.random() * (max-min+1) + min);
        }
    }
}

function mimatriztostring(matriz)
{
    let cadena = "";
    for (let i=0; i<matriz.length; i++)
    {
        for (let j=0; j<matriz[0].length; j++)
        {
            cadena += matriz[i][j] + "\t";
        }
        cadena +=  "\n";
    }
    return cadena;
}

function calcularsuma (matriz)
{
    let suma = 0;
    for (let i=0; i<matriz.length; i++)
    {
        for (let j=0; j<matriz[0].length; j++)
        {
            suma += matriz[i][j];
        }
    }
    return suma;
}

function calcularmaximo (matriz)
{
    let max = Number.MIN_VALUE;
    for (let i=0; i<matriz.length; i++)
    {
        for (let j=0; j<matriz[0].length; j++)
        {
            if (matriz[i][j] > max)
                max = matriz[i][j];
        }
    }
    return max;
}

function calcularsumafilas (matriz) 
{
    let sumfilas = new Array ();
    for (let i=0; i<matriz.length; i++)
    {
        let suma = 0;
        for (let j=0; j<matriz[0].length; j++)
        {
            suma += matriz[i][j];
        }
        sumfilas.push (suma);
    }
    return sumfilas;
}

function calcularmediacolumnas (matriz)
{
    let medcol = new Array ();
    for (let j=0; j<matriz[0].length; j++)
    {
        let suma = 0;
        for (let i=0; i<matriz.length; i++)
        {
            suma += matriz[i][j];
        }
        medcol.push (suma/matriz.length);
    }
    return medcol;
}

function calculartraspuesta (matriz)
{
    let m = crearmatriz(matriz[0].length, matriz.length);
    for (let i=0; i<m.length; i++)
    {
        for (let j=0; j<m[0].length; j++)
        {
            m[i][j] = matriz[j][i];
        }
    }
    return m;
}

function sumarmatrices (matriz1, matriz2)
{
    let m = crearmatriz(matriz1.length, matriz1.length);
    for (let i=0; i<m.length; i++)
    {
        for (let j=0; j<m[0].length; j++)
        {
            m[i][j] = matriz1[i][j] + matriz2[i][j];
        }
    }
    return m;
}

function multiplicarmatrices (matriz1, matriz2)
{
    let m = crearmatriz(matriz1.length, matriz1.length);
    for (let i=0; i<m.length; i++)
    {
        for (let j=0; j<m.length; j++)
        {
            let suma = 0;
            for (k=0; k<m.length; k++)
            {
                suma += matriz1[i][k] * matriz2[k][j];
            }
            m[i][j] = suma;
        }
    }
    return m;
}

function compararmatrices (matriz1, matriz2)
{
    for (let i=0; i<matriz1.length; i++)
    {
        for (let j=0; j<matriz1.length; j++)
        {
            if (matriz1[i][j] != matriz2[i][j])
                return false;
        }
    }
    return true;
}

function calculartraza (matriz)
{
    let traza = 0;
    for (let i=0; i<matriz.length; i++)
    {
        traza += matriz[i][i];
    }
    return traza;
}

function essimetrica (matriz)
{
    for (let i=0; i<matriz.length-1; i++)
    {
        for (let j=i+1; j<matriz.length; j++)
        {
            if (matriz[i][j] != matriz[j][i])
                return false;
        }
    }
    return true;
}