<?php

use Libreria\Autores;
//Si no existe la id por post, nos vamos de la pagina
if (!isset($_POST['id'])) {
    header("Location:index.php");
    die();
}
//Trabajamos con sesiones escribimos session_start()
session_start();
//Cargamos el autoload de composer
require dirname(__DIR__, 2)."/vendor/autoload.php";
//Usando la clase autores, borramos por id
(new Autores)->delete($_POST['id']);
$_SESSION['mensaje'] = "Autor borrado con exito";
header("Location:index.php");