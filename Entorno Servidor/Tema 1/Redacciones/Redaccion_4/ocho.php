<?php
function CalcularSumatorio($n) {
    $contador = $n;

    while ($contador != 0) {
        return $n + CalcularSumatorio($n-1);
    }
}

echo "El sumatorio de 4 es: ".CalcularSumatorio(4). "<br>";
echo "El sumatorio de 8 es: ".CalcularSumatorio(8). "<br>";
echo "El sumatorio de 6 es: ".CalcularSumatorio(6). "<br>";
echo "El sumatorio de 10 es: ".CalcularSumatorio(10). "<br>";