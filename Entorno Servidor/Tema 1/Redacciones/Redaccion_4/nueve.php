<?php
function esPrimo($n) {
    if ($n<=1) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i == 0) return false;
    }
    return true;
}

function verPrimos($inicio, $cantidad) {
    $num = $inicio;
    $primos = [];
    while ($cantidad >= 0) {
        if (esPrimo($num)) {
            echo "<br>$num";
            $primos[] = $num;
           
            $cantidad--;
        }
        $num++;
    }
    return $primos;
}

$misPrimos = verPrimos(3, 5);
echo "<hr>";
$misPrimos = verPrimos(20, 10);
echo "<hr>";
$misPrimos = verPrimos(1, 10);
