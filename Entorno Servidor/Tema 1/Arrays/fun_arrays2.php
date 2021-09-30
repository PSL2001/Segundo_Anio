<?php
//Funcion recursiva
function calcularFactorial(int $num): int {
    if ($num==0) return 1;
    return $num*calcularFactorial($num-1);
}

echo calcularFactorial(0). "<br>";
echo calcularFactorial(3). "<br>";
echo calcularFactorial(4). "<br>";
echo calcularFactorial(20). "<br>";

//Funcion anonima y callback
function isPrimo(int $n): bool {
    if ($n<=1) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i == 0) return false;
    }
    return true;
}
function isMult3(int $n): bool {
    return ($n%3 == 0);
}
function isPositivo(int $n): bool {
    return ($n>0);
}

function PintarArray($a)
{
    echo "<br> [";
    foreach ($a as $v) {
        echo "$v, ";
    }
    echo "] <br>";
}
//Funcion callback sin Juampe
function sectionArray($array, $funcion) {
    $arrayDevuelto = [];
    foreach ($array as $v) {
        if ($funcion($v)) {
            $arrayDevuelto[] = $v;
        }
    }
    return $arrayDevuelto;
}

$numeros = range(-100,100);
$primos = [];

foreach ($numeros as $v) {
    if (isPrimo($v)) $primos[] = $v;
}

PintarArray($primos);
$positivos = [];
foreach ($numeros as $v) {
    if (isPositivo($v)) $positivos[] = $v;
}
PintarArray($positivos);

$mul3 = [];
foreach ($numeros as $v) {
    if (isMult3($v)) $mul3[] = $v;
}
PintarArray($mul3);

$primos1 = sectionArray($numeros, 'isPrimo');
PintarArray($primos1);

$positivos1 = sectionArray($numeros, 'isPositivo');
PintarArray($positivos1);

$mult1 = sectionArray($numeros, 'isMult3');
PintarArray($mult1);
//-----------------------------------------
$primos2 = array_filter($numeros, 'isPrimo');
PintarArray($primos2);
//----------------Funciones anonimas--------------------------
$saludo = function($nombre) {
    return "Hola $nombre";
};
//------------------------------------------------------------
// array_map
$numeros = range(5,10);
function doble($n) {
    return $n*2; 
}
$dobles = array_map("doble", $numeros);
PintarArray($dobles);
$dobles1 = array_map(function($n){ return $n*2; },$numeros);
PintarArray($dobles1);