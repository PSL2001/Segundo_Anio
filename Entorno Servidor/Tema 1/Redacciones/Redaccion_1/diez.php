<?php
function CalcularEquacionCuadrado($a, $b, $c)
{
    if ($a!=0) {
        return (-$b + sqrt(($b^2) - (4*$a*$c)))/(2*$a);
    } else {
        return ($b^2)-(4*$a*$c);
    }
}

echo  "La solucion es: ".CalcularEquacionCuadrado(7,8,4);