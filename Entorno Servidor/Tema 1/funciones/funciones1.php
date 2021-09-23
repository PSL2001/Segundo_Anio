<?php
function suma($a, $b) {
    return $a + $b;
}

function pintarTabla($num = 10) //Las funciones se les puede dar un valor por defecto
{
echo "<table class='table table-hover table-dark' cellpadding = '1'>\n";
echo "<tr><td colspan='5'>Tabla del $num</td></tr>";
for ($i=1; $i <= $num; $i++) { 
    echo "<tr>";
    echo "<td>$num</td>";
    echo "<td>x</td>";
    echo "<td>$i</td>";
    echo "<td>=</td>";
    echo "<td>".$num*$i."</td>";
    echo "</tr>";
}
echo "</table>";

}

function saludo($nombre = "No me ha indicado el nombre")
{
    echo "<br> Hola $nombre";
}
function cambiarNumero($n)
{
    global $miNumero;
    $miNumero = $n;
}

function cambiarNumero1($num)
{
    
    $miNumero1 = $num;
}

function contador() {
    static $a = 0;
    echo "<br> $a";
    $a++;
}
//Funciones con numero indeterminado de argumentos
function suma1(...$numeros) {
    //Lo veremos en detalle
    //Cuando demos los arrays
}
