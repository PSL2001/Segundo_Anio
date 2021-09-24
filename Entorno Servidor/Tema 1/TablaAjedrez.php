<?php
    function pintarTablaAjedrez($fila, $columna) {
        echo "<table width='400' height='400px' border='0' cellspacing='2' cellpadding='2' bgcolor='#000000'>";
        for ($i=1; $i <= $fila; $i++) { 
            echo "<tr align='center'>".PHP_EOL;
            for ($j=1; $j <= $columna ; $j++) {
                if (($i+$j)%2==0) {
                    echo "<td bgcolor='#ffffff'>". $i .",". $j .PHP_EOL;
                    echo "</td>".PHP_EOL;
                }else {
                    echo "<td><font color='#ffffff'>". $i .",". $j."</font>".PHP_EOL;
                    echo "</td>".PHP_EOL;
                }
                 
            }
            echo "</tr>".PHP_EOL;
         }
        echo "</table>";
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
<body style="background-color: cadetblue;">
<div class="container mt-3">
    <?php
    pintarTablaAjedrez(8,8);
    ?>
</div>    
</body>
</html>

