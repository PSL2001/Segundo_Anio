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
        echo "Hola mundo en pijamaaaa <br>\n"; //Esto no se considera
        echo "Adios mundo";
        echo "<br>";
        /*
        Comentario de
        varias
        lineas
        */
        echo 'Hola mundo';
        echo "<br>";
        echo 'Adios Mundo';

        //Variables
        $cadena = "Mi primera cadena";
        echo "<hr>";
        echo $cadena;
        echo "<br>";
        echo "$cadena";
        echo "<br>";
        echo '$cadena';
        echo "<br>";
        echo "\$dolar es el signo del dolar <br>";
        echo "Hola 'Manolo' <br>";
        echo 'Hola "Manolo"';
        echo "<br>";
        echo "Hola \"manolo\" <br>";
        echo 'Hola \"manolo\"';
        echo "<hr>";
        //Variables pt 2
        echo <<< TEXTO
        <table border="2">
            <tr>
                <td>Manolo</td>
                <td>Ole k crack</td>
            </tr>
            <th>
                <td>weeeeee</td>
                <td>loooooool</td>
            </th>
        </table>
        TEXTO;
        $cadena1 = "Soy la cadena 1";
        $cadena2 = "Soy la cadena 2";

        echo "El tipo de \$cadena1 es de: ". gettype($cadena1). "<br>";
        echo "<hr>";
        echo $cadena1." ".$cadena2."<br> Un br <br> otro br";
        echo "<br>";
        $cadena1 = 23;
        echo "El tipo de \$cadena1 es de: ". gettype($cadena1). "<br>";
        echo $cadena1;

        //----------Conversion de tipos----------
        $num1 = "22";
        echo "<br> \$num1 = $num1 y el tipo es ". gettype($num1);
        $num2 = 45.56;

        $num3 = $num1 + $num2;

        echo "<br> \$num3 = $num3 y el tipo es ". gettype($num3);
        $a = "Manolo";
        $b = "Vicente";
        //$c = $a + $b;
        //echo $c;
    ?>
    </div>
</body>
</html>