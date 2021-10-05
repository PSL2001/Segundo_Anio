<?php
function in_arrayNuevo($array, $otro) {
    if (in_array($otro, $array)) {
        return true;
    } else {
        if (is_array(current($array))) {
            if (in_array($otro, current($array))) {
                return true;
            } else {
                next($array);
                in_arrayNuevo($array, $otro);
            }
        } else {
            return false;
        }
    }
}

$colores = [
    'Colores fuertes' => [
        'FF0000',
        '00FF00',
        '0000FF'
    ],
    'Colores Suaves' => [
        'FE9ABC',
        'FDF189',
        'BC8F8F'
    ]
];

$color = "FF88CC";

if (in_arrayNuevo($colores, $color)) {
    echo "El color esta en el array <br>";
} else {
    echo "El color no esta en el array <br>";
}


$color = "FF0000";

if (in_arrayNuevo($colores, $color)) {
    echo "El color esta en el array <br>";
} else {
    echo "El color no esta en el array <br>";
}


