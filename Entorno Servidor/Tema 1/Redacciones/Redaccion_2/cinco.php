<?php
$datos = [
    'Nombre' => 'Pedro Torres',
    'Direccion' => 'C/Mayor 37',
    'Telefono' => '123456789'
];

foreach ($datos as $k => $v) {
    echo $k. "=>". $v. "<br>";
}