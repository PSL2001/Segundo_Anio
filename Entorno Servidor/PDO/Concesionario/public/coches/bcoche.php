<?php
if (!isset($_POST['obj'])) {
    header("Location: index.php");
    die();
}

session_start();

require dirname(__DIR__, 2)."/vendor/autoload.php";
use Concesionario\{Coches, Imagen};
$coche = unserialize($_POST['obj']);
//Borramos el coche
(new Coches)->setId($coche->id)->delete();
if(basename($coche->img)!='default.png'){
    //borramos
    $imagen=(new Imagen)->setDirStorage(dirname(__DIR__)."/img/coches/");
    $imagen->borrarFichero(basename($coche->img));
}
$_SESSION['mensaje']="Coche Borrado con éxito.";
header("Location:index.php");
