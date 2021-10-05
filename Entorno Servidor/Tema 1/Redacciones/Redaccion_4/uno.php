<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
<?php
/* Añadir la función aquí */
function calculaCantidad($n, $C0, $i) {
    $Cf = $C0*(1+($i+$n));

    return $Cf.",00";
}
$interes=5;
echo "<p><b>El interés actual es $interes%.</b></p>" ;
echo " <p>Si usted deposita 100 &euro; hoy, sus ahorros crecerán a" ;
echo calculaCantidad(5 , 100,$interes) ;
echo "&euro; en 5 años.</p>" ;
echo " <p>Si usted deposita 1.500&euro; hoy, sus ahorros crecerán a";
echo calculaCantidad(20 , 1500, $interes) ;
echo "&euro; después de 20 años.</p>" ;
?>
</body>
</html>