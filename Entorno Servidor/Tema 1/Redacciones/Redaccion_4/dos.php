<?php
function MostrarCapitales(string $pais, string $capital = "Madrid", $habitantes = "muchos" ) {
    echo "La capital de $pais es $capital y tiene $habitantes habitantes <br>";
}

MostrarCapitales("España");
MostrarCapitales("Porugal", "Lisboa");
MostrarCapitales("Francia", "Paris", "6.000.000");