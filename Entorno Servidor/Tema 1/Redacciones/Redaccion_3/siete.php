<?php

$numeros = [];

$variable = 2;

for ($i=0; $i < 10; $i++) { 
    $numeros[$i] = rand(1, 10); 
}

print_r($numeros);
echo "<br>";

$contador = 0;
foreach ($numeros as $k => $v) {
    if ($v == $variable) {
        echo "El valor $v esta en el array, en la posicion $k <br>";
        $contador++;
    }
}

if ($contador == 0) {
    echo "No se ha encontrado el valor 2";
} else {
    echo "Se ha encontrado la variable 2 un total de: $contador vez/veces";
}