<?php

use Libreria\Autores;

if (!isset($_POST['id'])) {
    header("Location:index.php");
    die();
}
session_start();
require dirname(__DIR__, 2)."/vendor/autoload.php";
(new Autores)->delete($_POST['id']);
$_SESSION['mensaje'] = "Autor borrado con exito";
header("Location:index.php");