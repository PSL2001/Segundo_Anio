<?php
//Cookies contador de visitas
if (isset($_COOKIE['contador'])) {
    #Ya esta creada, incrementamos el contador
    setcookie("contador",$_COOKIE['contador']+1,time()+(60*60*24*30));
} else {
    # No esta creada, la creamos, ya que es nuestra primera visita
    setcookie("contador",1,time()+(60*60*24*30)); //60 segundos * 60 minutos * 24 Horas * n Dias
}
//Cookies fecha ultima de visita
$date = date("d/M/Y H:i:s");
if (isset($_COOKIE['fecha_visita'])) {
    $mensaje = "Visitaste la pagina por ultima vez el: ". $_COOKIE['fecha_visita'];
    setcookie("fecha_visita", $date, time()+(60*60*24*365));
} else {
    $mensaje = "Es tu primera visita a nuestra pagina";
    setcookie("fecha_visita", $date, time()+(60*60*24*365));
}

//Para resetear cookies

if (isset($_POST['btnEnviar'])) {
    # Reseteamos el contador
    setcookie('contador',23, time()-1); //Esto borra la cookie por que la queria para un tiempo pasado
    header("Location:uno.php");
} else {
    //Mostramos

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: blanchedalmond;">
    <?php
    if (isset($_COOKIE['contador'])) {
        echo "Has visitado la pagina: <b>". $_COOKIE['contador']. "</b> veces";
    } else {
        echo "Es tu primera visita, bienvenido!";
    }
    
    ?>
    <br>
    <?php
    echo $mensaje;
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="o">
    <input type="submit" value="Resetear Contador" name="btnEnviar">
    </form>
</body>
</html>
<?php
}
?>