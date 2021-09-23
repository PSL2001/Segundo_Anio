<?php
function operaciones($a, $b, $operacion)
{
    switch ($operacion) {
        case 'suma':
            return "La suma es: ". $a + $b."<br>";
            break;
        case 'resta':
            return "La resta es: ". $a - $b."<br>";
            break;
        case 'producto':
            return "El producto es: ". $a * $b."<br>";
            break;
        case 'dividir':
            if ($b == 0) {
                echo "<div class='alert alert-warning' role='alert'>
                    Error al dividir entre 0
                  </div>";
            } else {
                return "La division es: ".$a / $b."<br>";
            }
            break;
        default:
            echo "operacion desconocida";
            break;
    }
}
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
        <h1 class="text-center my-2">Prácticas</h1>
        <?php

           echo operaciones(5, 7, "suma");
           echo operaciones(5, 7, "resta");
           echo operaciones(5, 7, "producto");
           echo operaciones(5, 7, "dividir");
           echo operaciones(5, 7, "amor_de_ella");
           echo operaciones(5, 0, "dividir");
           //Vamos a pasar los parametros usando url
           $num1 = $_GET['num1'];
           $num2 = $_GET['num2'];
           $operacion = $_GET['operacion'];

           echo operaciones($num1, $num2, $operacion);
        ?>
    </div>
</body>

</html>