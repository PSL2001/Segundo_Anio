<?php
    //include("funciones/funciones1.php");
    //include_once("funciones/funciones1.php");
    //require("funciones/funciones1.php");
    require_once("funciones/funciones1.php");
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
        $res = suma("34", 90.50);
        echo $res;
        echo "<hr>";
        echo pintarTabla(3);
        echo "<hr>";
        echo pintarTabla(20);
        echo "<hr>";
        echo pintarTabla();
        echo saludo("Manolo");
        echo saludo();
        //----------------------------------
        $miNumero = 45;
        echo "<br>";
        echo 'El valor de $miNumero antes de llamar la funcion es '. $miNumero. "<br>";
        cambiarNumero(120);
        echo 'El valor de $miNumero despues de llamar la funcion es '. $miNumero. "<br>";

        $miNumero1 = 45;
        echo "<br>";
        echo 'El valor de $miNumero1 antes de llamar la funcion es '. $miNumero1. "<br>";
        cambiarNumero1(123);
        echo 'El valor de $miNumero1 despues de llamar la funcion es '. $miNumero1. "<br>";

        echo "<hr>";
        contador();
        contador();
        contador();
        


    ?>
</div>
</body>
</html>