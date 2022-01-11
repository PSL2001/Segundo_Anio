<?php
session_start();
if(!isset($_POST['id'])){
    header("Location:index.php");
}
require dirname(__DIR__, 2)."/vendor/autoload.php";
use Examen\Provincias;

(new Provincias())->delete($_POST['id']);
$_SESSION['mensaje']="Provincia Borrada.";
header("Location:index.php");