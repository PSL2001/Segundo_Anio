<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

$color;
if ($_SESSION['perfil'] == 1) {
    $color = "darkcyan";
} else {
    $color = "crimson";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- CDN de Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
        <?php
        if ($_SESSION['perfil'] == 0) {
            echo <<< TEXTO
            <a href="admin.php" class="btn btn-success"><i class="fas fa-tools"></i> Administracion</a>
            <a href="#" class="btn btn-primary"><i class="fas fa-users"></i> Gestionar Usuarios</a>
            TEXTO;
        }
        ?>
        <a href="#" class="btn btn-secondary"><i class="far fa-id-badge"></i> Gestionar Perfil</a>
    </div>
</body>
</html>