<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:../index.php");
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Posts\Users;
$usuario=(new Users)->setUsername($_SESSION['username'])->read();

$error = false;
function estaVacio($c, $v)
{
    if (strlen($v) < 5) {
        $_SESSION[$c] = "Este campo debe conterner al meso 5 carcateres!!";
        return true;
    }
    return false;
}
if (isset($_POST['btnCrear'])) {
    //procesamos el registro
    $un = trim($_POST['username']);
    $em = trim($_POST['email']);
    $p = trim($_POST['password']);
    if (estaVacio("username", $un)) $error = true;
    else {
        //ya se que el username NO es vacio y tiene al menos 5 caracteres
        if ((new Users)->existeCampo('username', $un)) {
            $error = true;
            $_SESSION['user_error'] = "Este nombre de usuario YA existe!!!!";
        }
    }
    if (estaVacio("email", $em)) $error = true;
    else {
        if ((new Users)->existeCampo('email', $em)) {
            $error = true;
            $_SESSION['email'] = "Este correo YA está registrado !!!";
        }
    }
    if (estaVacio("password", $p)) $error = true;
    if (!$error) {
        //creamos el regsitro
        $pass = hash('sha256', $p);
        $imagen = "https://via.placeholder.com/100/0000FF/FFFFFF?text=" . strtoupper(substr($un, 0, 3));
        (new Users)->setUsername($un)
            ->setEmail($em)
            ->setPassword($pass)
            ->setImg($imagen)
            ->create();
        $_SESSION['username'] = $un;
        header("Location:index.php");
    } else {
        header("Location:{$_SERVER['PHP_SELF']}");
    }
} else {
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

        <title>Editar Usuario</title>





    </head>

    <body style="background-color:silver">
        <h5 class="text-center mt-4">Editar Usuario</h5>
        <div class="container mt-2">
            <div class="bg-success p-4 text-white rounded shadow-lg m-auto" style="width:35rem">
            <div class="text-center">
                <img src="<?php echo $usuario->img ?>" width="80rem" height="80rem" class="rounded-circle" />
            </div>    
            <form name="cautor" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>

                    <div class="mb-3">
                        <label for="n" class="form-label">Nombre Usuario</label>
                        <input type="text" class="form-control" 
                            id="n" placeholder="Username" name="username" 
                            value="<?php echo $usuario->username ?>" required>
                        <?php
                        if (isset($_SESSION['user_error'])) {
                            echo "<div class='text-danger'>{$_SESSION['user_error']}</div>";
                            unset($_SESSION['user_error']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="a" class="form-label">Email</label>
                        <input type="email" class="form-control" id="a" 
                            placeholder="Correo" name="email" 
                            value="<?php echo $usuario->email ?>" required>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo "<div class='text-danger'>{$_SESSION['']}</div>";
                            unset($_SESSION['email']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="p" class="form-label">Password</label>
                        <input type="password" class="form-control" id="p" placeholder="Contraseña" name="password" required>
                        <?php
                        if (isset($_SESSION['password'])) {
                            echo "<div class='text-danger'>{$_SESSION['password']}</div>";
                            unset($_SESSION['password']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="f" class="form-label">Imagen de perfil</label>
                        <input class="form-control" type="file" id="f" name="img">
                    </div>

                    <div>
                        <button type='submit' name="btnCrear" class="btn btn-info"><i class="fas fa-save"></i> Registrar</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                    </div>

                </form>
            </div>

        </div>
    </body>

    </html>
<?php } ?> 