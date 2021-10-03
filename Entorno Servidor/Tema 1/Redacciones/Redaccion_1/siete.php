<?php
function esDivisor($num, $div) {
    return ($num%$div == 0);
}

$mul = [];
$contador = 2;
$divisores = 0;
$numeros = range(1,100);


foreach ($numeros as $v) {
    if (esDivisor($v, $contador)) {
        $mul[] = $v;
        $contador++;
        $divisores++;
    } 
}

var_export($mul);
echo "<br>";
echo $divisores;

