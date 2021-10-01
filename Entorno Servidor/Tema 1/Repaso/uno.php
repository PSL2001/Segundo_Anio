<?php
//1- Crear un array con los 50 primeros numeros primos
//2- Mostrar el array siguiente en una tabla HTML
/*
Trabajadores [
    "Trabajador 1" =>[
        "Nombre": Manolo,
        "mail": mail@manolo,
        "Ciudad": Almería
    ],
    "Trabajador 2" =>[
        "Nombre": Ana,
        "mail": mail@ana,
        "Ciudad": Granada
    ],
    "Trabajador 3" =>[
        "Nombre": Juan,
        "mail": mail@juan,
        "Ciudad": Sevilla
    ],
];
*/

//Ejercicio 1
function esPrimo(int $n): bool {
    if ($n<=1) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i == 0) return false;
    }
    return true;
}
$countPrimos = 0;
$primos = [];
$numero = 1;
do {
    if (esPrimo($numero)) {
        $primos[] = $numero;
        $countPrimos++;
    }
    $numero++; 
} while ($numero <= 50);
var_export($primos);

//Ejercicio 2
function pintarFila($trabajador, $valor) {
    $campos = array_keys($valor);
    $valores = array_values($valor);
    echo "<tr>\n 
    <td colspan='3' align='center' style='background-color: silver;'>$trabajador</td>\n </tr>";
    pintarFilas2($campos, 1);
    pintarFilas2($valores, 0);

}
function pintarFilas2($array, $f) {
    echo "<tr>";
    foreach ($array as $value) {
        echo  ($f == 1) ? "<td style='background-color:silver;'>$value</td> \n" : "<td>$value</td> \n"; 
    }
}
function PintarTrabajadores($array) {
    echo "<table border='2' cellpadding='3' cellspacing='4' \n>";
    foreach($array as $k => $v) {
        pintarFila($array, $v);
    }

    echo "</table>";
}
$trabajadores = [
    "Trabajador 1" =>[
        "Nombre" => "Manolo",
        "mail"=> "mail@manolo",
        "Ciudad"=> "Almería"
    ],
    "Trabajador 2" =>[
        "Nombre"=> "Ana",
        "mail"=> "mail@ana",
        "Ciudad"=> "Granada"
    ],
    "Trabajador 3" =>[
        "Nombre"=> "Juan",
        "mail"=> "mail@juan",
        "Ciudad"=> "Sevilla"
    ]
];

PintarTrabajadores($trabajadores);

