<?php
$capitales=[
    "Albania"=>"Tirana",
    "Alemania"=>"Berlín",
    "Andorra"=>"Andorra la Vieja",
    "Armenia"=>"Ereván",
    "Austria"=>"Viena",
    "Azerbaiyán"=>"Bakú",
    "Belgica"=>"Bruselas",
    "Bosnia-Herzegovina"=>"Sarajevo",
    "Bulgaria"=>"Sofía",
    "Chipre"=>"Nicosia",
    "Vaticano"=>"Ciudad del Vaticano",
    "Croacia"=>"Zagreb",
    "Dinamarca"=>"Copenhague",
    "Eslovaquia"=>"Bratislava",
    "España"=>"Madrid",
    "Estonia"=>"Tallín",
    "Rusia"=>"Moscú",
    "Finlandia"=>"Helsinki",
    "Francia"=>"París",
    "Georgia"=>"Tiflis",
    "Grecia"=>"Atenas",
    "Hungría"=>"Budapest",
    "Irlanda"=>"Dublín",
    "Islandia"=>"Reikiavik",
    "Italia"=>"Roma",
    "Kazajistan"=>"Astana",
    "Letonia"=>"Riga",
    "Liechtenstein"=>"Vaduz",
    "Lituania"=>"Vilna",
    "Luxemburgo"=>"Luxemburgo",
    "Macedonia"=>"Skopie",
    "Malta"=>"La valeta",
    "Moldova"=>"Chisináu",
    "Mónaco"=>"Mónaco",
    "Noruega"=>"Oslo",
    "Paises Bajos"=>"Ámsterdam",
    "Polonia"=>"Varsovia",
    "Portugal"=>"Lisboa",
    "Reino Unido"=>"Londres",
    "República Checa"=>"Praga",
    "Rumania"=>"Bucarest",
    "San Marino"=>"San Marino",
    "Serbia"=>"Belgrado",
    "Suecia"=>"Estocolmo",
    "Suiza"=>"Berna",
    "Ucrania"=>"Kiev"
];

foreach ($capitales as $k => $v) {
    echo "La capital de ".$k." es ". $v. "<br>";
}

echo "<hr>";

asort($capitales);

echo "<h1>Ordenado por capitales</h1> <br>";
foreach ($capitales as $k => $v) {
    echo "La capital de ".$k." es ". $v. "<br>";
}
echo "<hr>";
ksort($capitales);
echo "<h1>Ordenado por pais </h1> <br>";
foreach ($capitales as $k => $v) {
    echo "La capital de ".$k." es ". $v. "<br>";
}