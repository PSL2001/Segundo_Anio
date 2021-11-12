<?php

use Posts\Posts;

session_start();
if (!isset($_POST['id']) || !isset($_SESSION['username'])) {
    header("Location: ../");
    die();
}
require dirname(__DIR__, 2)."/vendor/autoload.php";

(new Posts)->delete($_POST['id']);
$_SESSION['mensaje'] = "Post borrado con exito";
header("Location: ../users/");