<?php
$arrays = [
    "nombre"=>["Juan", "Manuel"], 
    1=>["Pepe"], 
    5=>["Dario", "Ines", "Manolo"], 
    "cosa"=>["Television"]
];

do{
    $keys[]=key($arrays);
    $array=current($arrays);
    do{
        $values[]=current($array);
    }while(next($array));
}while(next($arrays));

print_r($keys);
echo "<br>";
print_r($values);
