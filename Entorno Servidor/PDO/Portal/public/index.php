<?php

use Portal\Users;

require dirname(__DIR__, 1)."/vendor/autoload.php";
(new Users)->crearUsuarios(25);
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
    <title>Indice de Portal</title>
</head>
<body style="background-color:#f57c00">
    <h4 class="text-center">Indice del Portal</h4>
    <div class="container mt-2">
        <a href="users/register.php" class="btn btn-info">Registrar</a>
        <a href="users/index.php" class="btn btn-info">Acceso invitado</a>
        <a href="users/login.php" class="btn btn-info">Login</a>
    </div>
</body>
</html>