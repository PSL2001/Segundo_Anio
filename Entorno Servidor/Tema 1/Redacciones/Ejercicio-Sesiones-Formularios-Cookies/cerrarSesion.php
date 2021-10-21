<?php
session_start(); //Iniciamos sesion
session_destroy(); // Destruimos la sesion, con esta el array $_SESSION
header("Location: login.php"); //Volvemos a login, ya que no existe sesion