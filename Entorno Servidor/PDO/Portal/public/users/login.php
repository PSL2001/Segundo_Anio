<?php
session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Portal\Users;

$error = false;

$INTENTOS=5; // intentos de login
$TIEMPO=60; //Tiempo que tendremos desactivado el boton login 

function estaVacio($c, $v)
{
    if (strlen($v) < 5) {
        $_SESSION[$c] = "Este campo debe conterner al meso 5 carcateres!!";
        return true;
    }
    return false;
}
if (isset($_POST['btnLogin'])) {
    //procesamos el registro
    $un = trim($_POST['username']);
    $p = trim($_POST['password']);
    
    if (estaVacio("username", $un)) $error = true;
    if (estaVacio("password", $p)) $error = true;
    
    if (!$error) {
        //creamos el regsitro
        $pass=hash('sha256', $p);
        if((new Users)->comprobarUsuario($un, $pass)){
            setcookie('errorV', 1, time()-100); //limpio contador de errores si acierto
            $_SESSION['user']=$un;
            header("Location:index.php");
        }else{
            if(isset($_COOKIE['errorV'])){
                $cont=++$_COOKIE['errorV'];
                if($cont==$INTENTOS){
                    setcookie('errorV', $cont, time()+$TIEMPO); //SOLO DURA EL TIEMPO DE BLOQUEO
                }else{
                    setcookie('errorV', $cont, time()+3600);
                }

            }else{
                setcookie('errorV', 1, time()+3600);
            }
            $total=(isset($_COOKIE['errorV'])) ? ($INTENTOS-$_COOKIE['errorV']) : ($INTENTOS-1);
            $_SESSION['error_validacion']="Usuario o password incorrectos, te quedan: $total intentos";
            //$_SESSION['error_validacion']="Usuario o password incorrectos, te quedan:". ($INTENTOS-$_COOKIE['errorV'])." intentos";
            header("Location:{$_SERVER['PHP_SELF']}");
        }

    }else {
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

        <title>Login Usuario</title>





    </head>

    <body style="background-color:silver">
        <h5 class="text-center mt-4">Entrar</h5>
        <div class="container mt-2">
            <div class="bg-success p-4 text-white rounded shadow-lg m-auto" style="width:35rem">
            <?php
                if(isset($_SESSION['error_validacion'])){
                    echo "<div class='my-2 text-light bg-dark p-2'>{$_SESSION['error_validacion']}</div>";
                    unset($_SESSION['error_validacion']);
                }
            ?>    
            <form name="cautor" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>

                    <div class="mb-3">
                        <label for="n" class="form-label">Nombre Usuario</label>
                        <input type="text" class="form-control" id="n" placeholder="Username" name="username" required>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<div class='text-danger'>{$_SESSION['username']}</div>";
                            unset($_SESSION['username']);
                        }
                        ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="p" class="form-label">Passwword</label>
                        <input type="password" class="form-control" id="p" placeholder="Contraseña" name="password" required>
                        <?php
                        if (isset($_SESSION['password'])) {
                            echo "<div class='text-danger'>{$_SESSION['password']}</div>";
                            unset($_SESSION['password']);
                        }
                        ?>
                    </div>

                    <div>
                        <?php
                            if(isset($_COOKIE['errorV']) && $_COOKIE['errorV']==$INTENTOS){
                            echo "<button type='submit' name='btnLogin' class='btn btn-info' disabled><i class='fas fa-sign-in-alt'></i> Login (espere $TIEMPO s.)</button>";
                            }else{
                            echo "<button type='submit' name='btnLogin' class='btn btn-info'><i class='fas fa-sign-in-alt'></i> Login</button>";
                            }
                        ?>
                        
                        <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                        <a href="cuser.php" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i> Registarse</a>
                    </div>

                </form>
            </div>

        </div>
    </body>

    </html>
<?php } ?>