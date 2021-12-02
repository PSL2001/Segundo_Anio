<?php

use Portal\Users;

session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

$imagen = (isset($_SESSION['user'])) ? "../" . (new Users)->setUsername($_SESSION['user'])->getImagen() : "../images/users/invitado.png";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Indice de Usuarios</title>
</head>

<body style="background-color:#f57c00">
    <!-- Nav -->
    <div class="py-2 d-flex" style="background-color:silver">
        <div class="py-1">
            <img src="<?php echo $imagen ?>" class="rounded-circle" height="40rem" width="40rem">
        </div>
        <div class="py-2">
            &nbsp;<a href="../" style="text-decoration:none; color:white"><i class="fas fa-home"></i>INICIO</a>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
            echo <<< TXT
            <div class="py-2">
            &nbsp;<a href="register.php" style="text-decoration:none; color:blue">Registrarse</a>
            </div>
            <div class="py-2">
            &nbsp;<a href="login.php" style="text-decoration:none; color:blue">Login</a>
            </div>
            TXT;
        }
        ?>
        <div class="ms-auto">
            <input class="form-control" type="text" disabled value="<?php echo (isset($_SESSION['user'])) ? $_SESSION['user'] : "Invitado"; ?>">
        </div>
        <div>
            &nbsp;&nbsp;<a class="btn btn-info" href="<?php echo isset(($_SESSION['user'])) ? "cerrar.php" : "#" ?>"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <!-- Finn Navbar -->
    <h4 class="text-center">Indice de usuarios</h4>
    <div class="container mt-2">
    </div>
</body>

</html>