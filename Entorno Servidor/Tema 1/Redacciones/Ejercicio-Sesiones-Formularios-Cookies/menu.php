<?php
//Antes de cargar la pagina, comprobamos si la sesion de usuario (la variable que guarda el usuario) existe
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

//Vamos a hacer una variable color, la cual dependiendo del usuario, cambiara el color de fondo
$color;
if ($_SESSION['perfil'] == 0) {
    # Si el perfil es 0 utilizamos este color
    $color = "#FF1E90";
} else if ($_SESSION['perfil'] == 1) {
    $color = "#1E90FF";
} else {
    $color = "#90FF1E";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- CDN de Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Menu Principal</title>
</head>
<body style="background-color:<?php echo $color ?>;">
<!-- Barra de navegacion -->
<ul class="nav justify-content-end">
    <li class="nav-item">
    <a href="cerrarSesion.php" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i></a>
    </li>
    <li class="nav-item">
        <input type="text" class="form-control" disabled value="<?php echo $_SESSION['usuario']; ?>" style="width: 14rem;"/>
    </li>
    
    </ul>
    <!-- Fin Barra de navegacion -->
    <div class="container mt-4">
        
    </div>
</body>
</html>