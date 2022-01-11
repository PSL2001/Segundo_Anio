<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../login.php");
}
if(!isset($_POST['obj'])){
    header("Location:index.php");
    die();
}
$poblacion=unserialize($_POST['obj']);
require dirname(__DIR__,2)."/vendor/autoload.php";
use Examen\Poblaciones;
//borramos la población y la imagen si es disstinta a default.jpg
(new Poblaciones())->delete($poblacion->id);
if(basename($poblacion->imagen)!='default.jpg'){
    unlink(dirname(__DIR__).$poblacion->imagen);
}
$_SESSION['mensaje']="Población borrada con exito.";
header("Location:index.php");