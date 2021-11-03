<?php
session_start();
use Libreria\Libros;

if (!isset($_POST['id'])) {
    header("Location: index.php");
    die();
}
require dirname(__DIR__, 2)."/vendor/autoload.php";

(new Libros)->delete($_POST['id']);
$_SESSION['mensaje'] = "Libro borrado";
header("Location: index.php");