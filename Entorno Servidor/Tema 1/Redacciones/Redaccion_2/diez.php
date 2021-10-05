<?php
$nombres = ["Luis", "Ana", "Lucas", "Zacarias", "Tomas", "Juan", "Ginesa", "Oscar"];

$nombresort = $nombres;
sort($nombresort);
print_r($nombresort);
echo "<hr>";
$nombresrsort = $nombres;
rsort($nombresrsort);
print_r($nombresrsort);
echo "<hr>";
$nombresasort = $nombres;
asort($nombresasort);
print_r($nombresasort);
echo "<hr>";
$nombresarsort = $nombres;
arsort($nombresarsort);
print_r($nombresarsort);
