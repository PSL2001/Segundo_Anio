<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_GET['id'])) {
    header("Location:../index.php");
}
$id = $_GET['id'];
$username = $_SESSION['username'];

require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Posts\{Users, Posts};

$datosPost = (new Posts)->devolverPost($id);

$error=false;

function esValido($campo, $valor, $cant){
    global $error;
    if(strlen($valor)<$cant){
        $error=true;
        if($campo=='Titulo'){
            $_SESSION['err_titulo']="El campo: $campo debe contener al menos $cant caracteres";
        }
        else{
            $_SESSION['err_body']="El campo: $campo debe contener al menos $cant caracteres";
        }
    }
}

$imagen = (new Users)->recuperarImagen($username);
if(isset($_POST['btnUpdate'])){
    //Procesamos el formulario
    $tit=trim(ucfirst($_POST['titulo']));
    $body=trim(ucfirst($_POST['body']));
    esValido("Titulo", $tit, 3);
    esValido("Body", $body, 5);
    if(!$error){
        //guardamos el posts
        (new Posts)->setId($id)
        ->setTitulo($tit)
        ->setBody($body)
        ->update();
        $_SESSION['mensaje'] = "Post actualizado con éxito";
        header("Location: ../users");

    }
    else{
        header("Location:{$_SERVER['PHP_SELF']}?id=$id");
    }
}
else{

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>usuarios</title>





</head>

<body style="background-color:silver">
    <ul class="nav justify-content-end">
        <img src="<?php echo $imagen; ?>" width="34rem" height="34rem" class="mt-1 rounded-circle" />
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $username; ?></a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../users/eusuario.php"><i class="fas fa-edit"></i> Editar Usuario</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="cerrar.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a></li>
            </ul>
        </li>
    </ul>
    <h5 class="text-center mt-2">Actualizar Post <?php echo $datosPost->id ?></h5>
    <div class="container mt-2">
        <div class="bg-success p-4 text-white rounded shadow-lg m-auto" style="width:35rem">
            <form name="cpost" action="<?php echo $_SERVER['PHP_SELF']."?id=$id"; ?>" method='POST'>

                <div class="mb-3">
                    <label for="n" class="form-label">Título</label>
                    <input type="text" class="form-control" id="n" placeholder="Título" name="titulo" value="<?php echo $datosPost->titulo ?>" required>
                    <?php
                    if (isset($_SESSION['err_titulo'])) {
                        echo "<div class='text-danger'>{$_SESSION['err_titulo']}</div>";
                        unset($_SESSION['err_titulo']);
                    }
                    ?>
                </div>

                <div class="mb-3">
                    <label for="b" class="form-label">Contenido</label>
                    <textarea class="form-control" placeholder="Escribe tu contenido" id="b" name="body"><?php echo $datosPost->body ?></textarea>
                    <?php
                    if (isset($_SESSION['err_body'])) {
                        echo "<div class='text-danger'>{$_SESSION['err_body']}</div>";
                        unset($_SESSION['err_body']);
                    }
                    ?>
                </div>

                <div>
                    <button type='submit' name="btnUpdate" class="btn btn-info"><i class="fas fa-edit"></i> Editar</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                    <a href="../users/" class="btn btn-danger"><i class="fas fa-backward"></i> Volver</a>
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php } ?>