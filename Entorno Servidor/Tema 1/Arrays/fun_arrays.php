<?php
function PintarArray($a)
{
    echo "<hr>";
    foreach ($a as $k => $v) {
        echo "$k ===> $v <br>";
    }
    echo "<br>";
}
$array = ["Juan", "Manuel", "Ana"];

foreach ($array as $v) {
    echo "$v, ";
}
echo "<br>";
//------------count() => devuelve la dimension----------------------------------------------------
echo count($array); 
echo ("<br>");
//------- compact() => permite crear arrays asociativos---------------------
$nombre = "Ana Perez";
$correo = "ana@correo.es";

$array = compact('nombre', 'correo');
//-----------------Crear un Array----------------
$arraynum = range(50,150);

echo var_export($arraynum);
echo "<br>";

$miArray = array_fill(5, 10, "Mucho texto"); //Mucho texto se puede reemplazar con num
var_export($miArray);
echo "<br>";
$miArray = array_fill(0, 4, array_fill(0, 4, "Zelda"));
var_export($miArray);
echo "<br>";

//-------------------Rellenar un Array--------------------------
$array = ["Juan", "Manuel", "Ana"];

$arrayRellenado = array_pad($array, 10, "Mucho texto");
echo "<br>";
var_export($array);
echo "<hr> <br>";
var_export($arrayRellenado);
$arrayRellenado = array_pad($array, -10, "Mucho texto");
echo "<hr> <br>";
var_export($arrayRellenado);
//--------Poner o quitar al principio o final de un array---------
// Añadir al final array_push()
$array = ["Jose", "Paco", "Juampe"];
$a = ["Manolo"];
array_push($array, $a);
//Quitar el elemento al final
array_pop($array);
// Añadir al principio
array_unshift($a, "Primer elemento");
// Eliminar al principio
array_shift($a);
//--------------------------Extraer el array en variables----------
$datos = ["Juan", "juan@mail", "293478"];
$nombre = $datos[0];
$mail = $datos[1];
$telefono = $datos[2];
list($n,$m,$t) = $datos;
//-----------Buscando en un array------------------------
echo "<br>";
$imagen = ["image/gif", "video/webm", "image/jpeg"];
$miTipo = ["image/x-icon"];

if (in_array($miTipo,$imagen)) {
    echo "El formato es correcto";


} else {
    echo "El formato no es correcto";
}
echo "<br>";
echo  (in_array($miTipo,$imagen)) ? "El formato es correcto" : "El formato no es correcto" ;

//Implode y Explode -> convierte texto en array y viceversa
// Array en texto (string)
echo "<hr>";
$array = ["usuario", "usuario@mail.es", "23420349"];
$texto = implode("::",$array);
echo $texto;
echo "<br>";
$texto = "usuario::grupo::idg::amogus";
$a = explode("::", $texto);
var_dump($a);
//Metodo de ordenacion
//sort, rsort , asort, arsort, ksort, krsort

$comunidades = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];
$comunidades1 = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];
$comunidades2 = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];
$comunidades3 = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];
$comunidades4 = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];
$comunidades5 = [
    'Andalucia' => 'Almeria', 'Cadiz', 'Malaga',
    'Extremadura' => 'Caceres', 'Badajoz',
    'Murcia' => 'Murcia'
];


PintarArray($comunidades);
//Sort
sort($comunidades);
PintarArray($comunidades);
//rsort
rsort($comunidades1);
PintarArray($comunidades1);
//ksort
ksort($comunidades2);
PintarArray($comunidades2);
//krsort
krsort($comunidades3);
PintarArray($comunidades3);
//asort
asort($comunidades4);
PintarArray($comunidades4);
//arsort
arsort($comunidades5);
PintarArray($comunidades5);

//--------------------------------------------------------------------------

//Mezclar arrays array_merge()
$a = ["juan", "manolo", 5, 7, "Ana"];
$b = ["b1", "b2", "b3", 9, 1];
$mezcla = array_merge($a,$b);
echo "<hr>";
print_r($mezcla);