<?php
//Constantes
    define("PI", 3.141592);
    define('NOMBRE', 'Mi aplicación');
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color: cadetblue;">
<div class="container mt-3">
    <?php
    //------------- Bucles ----------
    for ($i=0; $i <= 10; $i++) { 
        echo $i. "<br>".PHP_EOL; //PHP_EOL el sugerido
    }
    //
    $num = 9;
    echo "<table class='table table-hover table-dark' cellpadding = '1'>\n";
    for ($i=1; $i < 11; $i++) { 
        echo "<tr>\n";
        echo "<td>$num</td>\n";
        echo "<td>x</td>\n";
        echo "<td>$i</td>\n";
        echo "<td>=</td>\n";
        echo "<td>".$num*$i."</td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";

    //Ejemplo de ejercicio. Hacer una tabla de multiplicar hasta ese numero (si num 10 -> tabla hasta el num 10)
    $num2 = 86;
    echo "<table class='table table-hover table-dark' cellpadding = '1'>\n";
    for ($i=1; $i <= $num2; $i++) { 
        echo "<tr>";
        echo "<td>$num2</td>";
        echo "<td>x</td>";
        echo "<td>$i</td>";
        echo "<td>=</td>";
        echo "<td>".$num2*$i."</td>";
        echo "</tr>";
    }
    echo "</table>";

    //Do while y while
    echo "<hr> Bucle while <br>";
    $i = 0;
    while ($i <= 10) {
        echo "$i <br>";
        $i++;
    }

    echo "<hr> Bucle do while <br>";
    $j = 0;
    do {
        echo "$j <br>";
        $j++;
    } while ($j <= 10);
    //--If/Else if------------------------------------------------
    echo "<hr>";
    $a = 0;
    if ($a) {
        echo "\$a = $a lo considera verdadero";
    } else {
        echo "\$a = $a lo considera falso";
    }
    //&&->AND ||->OR
    echo "<hr>";
    $nombre = "Manolo";

    switch ($nombre) {
        case 'Manolo':
            echo "Bueno";
            break;
        case 'Juan':
            echo "Veremos......";
            break;
        default:
            echo "No se tu nombre";
            break;
    }
    //Constantes
    echo "<hr>";
    echo PI; //Por convenio siempre en mayusculas
    echo "<br>";
    echo NOMBRE;
















    ?>
</div>
</body>
</html>