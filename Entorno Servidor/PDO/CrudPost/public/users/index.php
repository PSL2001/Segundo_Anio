<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    die();
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Posts\{Users,Posts};

$username = $_SESSION['username'];
$imagen = (new Users)->recuperarImagen($username);

$posts = (new Posts)->read($username);
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
    <title>Usuario</title>
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
    <h5 class="text-center mt-2">Posts <b><?php echo $username; ?></b></h5>
    <div class="container mt-2">
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo <<< TEXTO
            <div class="alert alert-success" role="alert">
                {$_SESSION['mensaje']}
            </div>
            TEXTO;
            unset($_SESSION['mensaje']);
        }
        ?>
        <a href="../posts/cpost.php" class="btn btn-info mt-2"><i class="fas fa-plus"></i> Crear Post</a>
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">Detalles</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = $posts->fetch(PDO::FETCH_OBJ)) {
                    $date = new DateTime($filas->updated_at);
                    echo <<< TXT
                    <tr>
                        <th scope="row">
                        <a href="../posts/dpost.php?id={$filas->id}" class="btn btn-info"> Detalles</a>
                        </th>
                        <td>{$filas->titulo}</td>
                        <td>{$date->format('d-M-Y')}</td>
                        <td>
                        <form name="bpost" method="POST" action="../posts/bpost.php">
                        <input type="hidden" name="id" value="{$filas->id}"/>
                        <a href="../posts/upost.php?id={$filas->id}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Quieres borrar el post?')"><i class="fas fa-trash"></i></button>
                        </form> 
                        </td>
                    </tr>
                    TXT;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>