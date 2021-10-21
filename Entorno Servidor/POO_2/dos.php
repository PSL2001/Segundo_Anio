<?php
spl_autoload_register(function ($clase)
{
    //echo "$clase";
    require "src/$clase.php";
});
$c1 = new ClaseUno();
$c2 = new ClaseDos();
$c3 = new ClaseTres();

$c1->saludo();
echo "<br>";
$c2->saludo();
echo "<br>";
$c3->saludo();