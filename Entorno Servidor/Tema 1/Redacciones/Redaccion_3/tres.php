<?php

$colores = [
    'Colores fuertes' => [
        'Rojo:FF0000',
        'Verde:00FF00',
        'Azul:0000FF'
    ],
    'Colores Suaves' => [
        'Rosa:FE9ABC',
        'Amarillo:FDF189',
        'Malva:BC8F8F'
    ]
];

$aux = [];

echo "<table align='center' border='3' width='50%' height='50%'>". PHP_EOL;
do {
    $aux = current($colores);
    echo "<tr>". PHP_EOL;
    echo "<td>". key($colores). "</td>". PHP_EOL;
    do {
        echo "<td bgcolor=#". substr(current($aux), -6).">".current($aux)."</td>";
    } while (next($aux));
    echo "</tr>";
} while (next($colores));

echo "</table>";
