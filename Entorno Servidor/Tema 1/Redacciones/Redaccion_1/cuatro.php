<?php
function esPrimo(int $n): bool {
    if ($n<1) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i == 0) return false;
    }
    return true;
}
$countPrimos = 0;
$cuantosPrimos = 10;
$primos = [];
$numero = 1;
if ($cuantosPrimos > 1000) {
    echo "No puedes pedir mas de 1000 numeros primos";
    die();
} else {
do {
    if (esPrimo($numero)) {
        $primos[] = $numero;
        $countPrimos++;
    }
    $numero++; 
} while ($countPrimos <= $cuantosPrimos);
var_export($primos);
}