<?php
use Clases\Models\Autor;
use Clases\Controllers\AutorController;
require "vendor/autoload.php";

$autorController = new AutorController();
$autorController->saludo();

$autor = new Autor();
$autor->saludo();