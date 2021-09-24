<?php
    function pintarTabla1($fila, $columna)
    {
    //  var_dump($fila);
    //  echo "<br>";
    //  var_dump($columna);   

     echo "<table border='3' cellpadding = '1'>".PHP_EOL;
    for ($i=0; $i < $fila; $i++) { 
       echo "<tr>".PHP_EOL;
       for ($j=0; $j < $columna ; $j++) { 
           echo "<td>". $i+1 .",". $j+1 .PHP_EOL;
           echo "</td>".PHP_EOL;
       }
       echo "</tr>".PHP_EOL;
    }
    echo "</table>".PHP_EOL;
        
    }

    function error($text)
    {
        echo "<h3 style='color: red;' >$text</h3>";
    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <title>Document</title>
</head>
<body style="background-color: silver;">
<div class="container mt-3">
    <?php
        if (!isset($_GET['fila']) || !isset($_GET['columna'])) {
            error("No has pasado los datos");
        }

        if (is_int($_GET['fila']) || $_GET['fila'] < 1) {
            echo "<div class='alert alert-warning' role='alert'>
            No has pasado todos los datos en fila
            </div>";
        } else if (is_int($_GET['columna']) || $_GET['columna'] < 1) {
            echo "<div class='alert alert-warning' role='alert'>
            No has pasado todos los datos en columna
            </div>";
        } else {
            $fila = (int) $_GET['fila'];
            $columna = (int) $_GET['columna'];
            pintarTabla1($fila, $columna);   
        }
    ?>
</div>
</body>
</html>