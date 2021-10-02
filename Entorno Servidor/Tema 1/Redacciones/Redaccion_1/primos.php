<?php
if (!isset($_GET['num'])) {
    echo ("No se ha detectado la variable num");
    die();
}

function esPrimo(int $n): bool {
    if ($n<=1) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i == 0) return false;
    }
    return true;
}


$num = $_GET['num'];

echo esPrimo($num) ? "El numero es primo" : "El numero no es primo";