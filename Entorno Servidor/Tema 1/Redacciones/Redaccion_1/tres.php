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
do {
    if (esPrimo($numero)) {
        $primos[] = $numero;
        $countPrimos++;
    }
    $numero++; 
} while ($countPrimos <= $cuantosPrimos);
var_export($primos);