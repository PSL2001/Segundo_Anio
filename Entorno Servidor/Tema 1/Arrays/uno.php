<?php
//Definicion de array
$a = [1, 2, 3, 4, 5, 6, 7, 8, 9]; //Forma actual
$b = array(1, 2, 3, 4, 5, 6, 7, "Manolo"); //forma clasica
echo gettype($a);
echo "<br>";
echo gettype($b);
//Forma rapida
//1- print_r
echo "<br>";
print_r($a);
//2- var_dump => vale para cualquier variable
echo "<br>";
var_dump($b);
//3- var_export => vale para cualquier variable
echo "<br>";
var_export($a);
//------------------------------------------
echo "<br>";
$vector = [1, 2];
$vector[] = 4;
$vector[] = 'Manolo';
var_dump($vector);
echo "<hr>";
for ($i = 0; $i < count($vector); $i++) {
    echo $vector[$i] . ",";
}
echo "<br>";
//-----------------------------------------------
$vector2 = [1, 2];
$vector2[8] = "Elemento 8";
$vector2[3] = "Elemento 3";
$vector2[] = "Buscate la vida jajajaja equih de";
$vector2[15] = "Soy el 15";
$vector2[] = "Estoy mas perdido que perdidin";
$vector2[0] = "Ahora soy el 0";
$vector2['manolo'] = "Soy el vector manolo";
$vector2[] = "Me he perdido paco";
echo "<br>";
var_export($vector2);
echo "<br>";
echo $vector2['manolo'];
echo "<br>";
// Vamos a ver como recorrer un array en php
foreach ($vector2 as $k => $v) {
    echo "$k===>$v";
    echo "<br>";
}
// Arrays con mas de 1 dimension
$comunidades = [
    'Andalucia' => ['Almeria', 'Cadiz', 'Malaga'],
    'Extremadura' => ['Caceres', 'Badajoz'],
    'Murcia' => ['Murcia']
];

echo "<br>" . var_dump($comunidades);

$comunidades['Aragon'] = ['Zaaragoza', 'Huesca'];

echo "<br>" . var_export($comunidades);
//-------------------------------
//unset($comunidades); //Unset es para borrar variables
//var_dump($comunidades);
$andalucia = ['Almeria', 'Cadiz', 'Zaragoza'];
$extremadura = ['Caceres', 'Badajoz'];
$murcia = ['Murcia'];

$comunidades2 = [
    'Andalucia' => $andalucia,
    'Extremadura' => $extremadura,
    'Murcia' => $murcia
];

echo var_dump($comunidades2);
// Vamos a recorrer un array de varias dimensiones
echo "<hr> <br>";
echo "[";
foreach ($comunidades as $k => $v) {
    echo $k."=>";
    foreach ($v as $k1 => $v1) {
        echo $v1.", ";
    }
}
echo "]";
//--------------
function PintarTablaProvincia($f, $c, $comunidades) {
    echo "<table border='2'>\n";
    for ($i=0; $i < $f; $i++) { 
        echo "<tr align='center'> \n";
        for ($j=0; $j < $c ; $j++) { 
            foreach ($comunidades as $key => $value) {
                echo "<td>".$key;
                foreach ($value as $k => $v) {
                    echo $v."</td>";
                }
            }
        }
    }
    echo "</table>";
}

PintarTablaProvincia(8, 8, $comunidades);


