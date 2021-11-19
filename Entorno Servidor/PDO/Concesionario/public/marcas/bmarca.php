<?php
if(!isset($_POST['obj'])){
    header("Location:index.php");
    die();
}
session_start();
$marca=unserialize($_POST['obj']);
require dirname(__DIR__, 2)."/vendor/autoload.php";
use Concesionario\{Marcas, Imagen};
//borramos de la base de datos
(new Marcas)->delete($marca->id);
//Borro el Fichero SI no es el default.png
if(basename($marca->img)!='default.png'){
    //borramos
    $imagen=(new Imagen)->setDirStorage(dirname(__DIR__)."/img/marcas/");
    $imagen->borrarFichero(basename($marca->img));
}
$_SESSION['mensaje']="Marca Borrada con éxito.";
header("Location:index.php");