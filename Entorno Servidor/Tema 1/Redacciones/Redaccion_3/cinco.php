<?php
$pila = array("cinco" => 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);

$pila_sort = $pila;
sort($pila_sort);
print_r($pila_sort);
echo "<hr>";
$pila_asort = $pila;
asort($pila_sort);
print_r($pila_asort);
echo "<hr>";
$pila_rsort = $pila;
rsort($pila_rsort);
print_r($pila_rsort);
echo "<hr>";
$pila_arsort = $pila;
arsort($pila_sort);
print_r($pila_arsort);
echo "<hr>";
$pila_ksort = $pila;
ksort($pila_ksort);
print_r($pila_ksort);
echo "<hr>";
