<?php
use Source\Controllers\UsuarioController;
use Source\Models\Usuario;
require "vendor/autoload.php";

$usucon = new UsuarioController();
$usu = new Usuario();

$usucon->saludo();
$usu->saludo();