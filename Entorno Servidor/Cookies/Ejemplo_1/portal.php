<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
} else {
    echo "Te has logueado como ". $_SESSION['usuario'];
    echo "<br>";
    echo "<a href='logout.php'>Cerrar Sesion</a>";
}