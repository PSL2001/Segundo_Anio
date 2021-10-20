<?php
require("./src/Producto.php");
require("./src/Interfaz1.php");
require("./src/Ordenador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Herencia 1</title>
</head>
<body>
    <?php
    $producto = new Producto(123,"Producto 1",16.95);
    echo $producto;
    $pc1 = new Ordenador(321,"Ordenador Gaming",2035.99,"Intel Ram 5G", "Windows 12");
    echo "<br>";
    echo $pc1;
    $pc1->verDatos();
    //-----------------------------
    $pc1->CalculaDescuento(10);
    $pc1->verDatos();
    ?>
</body>
</html>