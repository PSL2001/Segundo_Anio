<?php
function CalcularSec(int $dias) {
    return $dias * 86400;
}

echo "1 dia son " .CalcularSec(1). " segundos <br>";
echo "4 dias son " .CalcularSec(4). " segundos <br>";
echo "12 dias son " .CalcularSec(12). " segundos <br>";