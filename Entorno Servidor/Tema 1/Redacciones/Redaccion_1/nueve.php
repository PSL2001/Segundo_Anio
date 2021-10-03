<?php
function CalcularEquacion($a, $b, $c)
{
    if ($a!=0) {
        return "La solucion es: ".($c - $b)/$a;
    } else {
        echo '$a vale 0, no se puede hacer la equacion';
    }
}

echo  CalcularEquacion(0,8,4);