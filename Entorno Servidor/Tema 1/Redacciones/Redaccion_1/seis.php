<?php
function esDivisor($num) {
    return ($num%3 == 0);
}

$mul = [];
$contador = 2;
$divisores = 0;
$numeros = range(1,100);


foreach ($numeros as $v) {
    if (esDivisor($v)) {
        $mul[] = $v;
        $contador++;
        $divisores++;
    } 
}

var_export($mul);
echo "<br>";
echo $divisores;

