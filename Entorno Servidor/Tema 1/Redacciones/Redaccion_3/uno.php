<?php
$dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

echo "Dias de la semana en foreach: <br> ". PHP_EOL;

foreach ($dias as $key => $value) {
    echo "$key => $value <br>";
}

echo "Dias de la semana en bucle for: <br>";

for ($i=0; $i < count($dias) ; $i++) { 
    echo "$i => $dias[$i] <br>";
}