<?php
function CalculaCuadrado(int $num) {
    return pow($num, 2);
}

function CalculaCubo(int $num) {
    return pow($num, 3);
}

echo "El cuadrado de 2 es: ". CalculaCuadrado(2). "<br>";
echo "El cubo de 2 es: ". CalculaCubo(2). "<br>";