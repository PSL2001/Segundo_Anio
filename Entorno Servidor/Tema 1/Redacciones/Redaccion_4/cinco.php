<?php
function CalcularSemisum(int $num1, int $num2) {
    return ($num1 + $num2)/2;
}


echo "La semisuma de 1 y 2 es: ". CalcularSemisum(1,2). "<br>";
echo "La semisuma de 3 y 6 es: ". CalcularSemisum(3,6). "<br>";
echo "La semisuma de 10 y 5 es: ". CalcularSemisum(10,5). "<br>";