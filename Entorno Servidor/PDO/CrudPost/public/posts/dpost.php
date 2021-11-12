<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    die();
}
if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    die();
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Posts\{Users, Posts};

$username = $_SESSION['username'];
$imagen = (new Users)->recuperarImagen($username);

$datosPosts = (new Posts)->devolverPost($_GET['id']);
$fecha_creacion = new DateTime($datosPosts->created_at);
$fecha_edicion = new DateTime($datosPosts->updated_at);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Detalles Post</title>
</head>

<body style="background-color:silver">
    <ul class="nav justify-content-end">
        <img src="<?php echo $imagen; ?>" width="34rem" height="34rem" class="mt-1 rounded-circle" />
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <?php echo $username; ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="upuser.php?user=$username"><i class="fas fa-edit"></i> Editar Usuario</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="cerrar.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a></li>
            </ul>
        </li>
    </ul>
    <h5 class="text-center mt-2">Detalles Post <b><?php echo $datosPosts->id; ?></b></h5>
    <div class="container mt-2">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="<?php echo $imagen ?>" class="card-img-top rounded-circle" alt="..." >
            <div class="card-body">
                <h5 class="card-title"><?php echo $datosPosts->titulo ?></h5>
                <p class="card-text"><?php echo $datosPosts->body ?></p>
                <p class="card-text"><?php echo $fecha_creacion->format('d-M-Y') ?></p>
                <p class="card-text"><?php echo $fecha_edicion->format('d-M-Y') ?></p>
                <a href="../users/index.php" class="btn btn-primary"><i class="fas fa-backwards"></i> Volver</a>
            </div>
        </div>
    </div>
</body>

</html>