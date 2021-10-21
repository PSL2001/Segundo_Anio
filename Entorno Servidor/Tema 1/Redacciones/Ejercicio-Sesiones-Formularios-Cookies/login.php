<?php
//Voy a trabajar con sesiones, usamos session_start
session_start();
$usuarios = [
    ["Admin", "secret0", 0],
    ["User","secret1", 1],
    ["Adv_user", "secret2", 2]
];

/*E: 2 strings con un Usuario y contraseña
* S: El Perfil si es correcto, cualquier valor en caso contrario
*/
function comprobarUsuario($u, $p) {
    # Nuestros usuarios en este caso estan en un array y sabemos en que orden vienen siendo usuario, contraseña y el perfil
    //Para usar este array usamos global, ya que existe fuera de la funcion
    global $usuarios;
    //Recorremos el array, verficando que cada posicion es igual a los valores que nos pasan
    foreach ($usuarios as $value) {
        if ($u == $value[0] && $p == $value[1]) {
            # Si $u (usuario) es lo mismo que el valor de la posicion 0 del array, entonces es correcto, hacemos lo mismo para la contraseña, cambiando la posicion a 1
            //Si ambas son correctas, entonces devolvemos el 3er valor, siendo este el perfil
            return $value[2];
        }
    }
    //Si en caso de despues de recorrer el array, no se ha devuelto nada, entonces es que ha ido mal la validacion
    //Nota: No poner strings, peta la validacion
    return -10;
}

//Aqui comprobamos si el usuario ha pulsado "Borrar Cookies" o no
if (isset($_POST['delCookies'])) {
    setcookie("usuario", 45, time()-2); //Para borrar una cookie, se pone un tiempo menor al actual
    header("Location: {$_SERVER['PHP_SELF']}"); // Volvemos a login, ya que no hemos iniciado sesion;
}

if (isset($_POST['login'])) {
    //Le hemos dado al boton, procesamos el formulario
    //Primero trimeamos las variables de $_POST del usuario y contraseña
    $usuario = ucfirst(trim($_POST['usuario']));
    $pass = trim($_POST['pass']);
    $perfil = comprobarUsuario($usuario, $pass);

    if ($perfil != -10) {
        # Si perfil es distinto de error, entonces hemos hecho la validacion correctamente, guardamos el usuario y el perfil en sesiones
        //Pero antes de mandar los datos, comprobamos si el usuario ha pulsado "Recordar Usuario"
        if (isset($_POST['recordar'])) {
            # Si pasa esto, entonces el usuario ha pulsado "Recordar Usuario", creamos la cookie correspondiente
            setcookie("usuario", $usuario, time()+(60*60*24*7));
        } 
        $_SESSION['usuario'] = $usuario;
        $_SESSION['perfil'] = $perfil;
        //Y mandamos estos datos al menu
        header("Location: menu.php");
    } else {
        //En caso contrario, entonces la validacion ha ido mal, guardamos el mensaje de error en una sesion y volvemos a la misma pagina
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: {$_SERVER['PHP_SELF']}");
    }
} else {
    //No le hemos dado al boton, mostramos el formulario
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
        <title>Login</title>
    </head>

    <body style="background-color: dodgerblue;">
        <div class="container mt-4">
            <div class="card mx-auto bg-dark text-light" style="width: 34rem;">
                <div class="card-header text-center">
                    Login I.E.S Al-Andalus
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="mb-3">
                            <label for="m" class="form-label text-white">Usuario</label>
                            <?php
                            /*
                            Aqui comprobamos si la cookie de usuario existe
                            Si existe, tiene el nombre del usuario, se la añadimos al input
                            */
                            if (isset($_COOKIE['usuario'])) {
                                # Si estamos aqui es que la cookie existe, la mostramos en el input
                                echo "<input type='text' class='form-control' id='m' placeholder='Tu nombre de Usuario' name='usuario' value='{$_COOKIE['usuario']}'>";
                            } else {
                                # code...
                                echo "<input type='text' class='form-control' id='m' placeholder='Tu nombre de Usuario' name='usuario'>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ru" name="recordar">
                            <label class="form-check-label text-light" for="ru">
                                Recordar Usuario
                            </label>
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button type="submit" class="btn btn-danger" name="delCookies"><i class="fas fa-cookie-bite"></i> Borrar Cookies</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                </div>
                </form>
            </div>
            <?php
            //Aqui comprobamos si la sesion de error existe
                if (isset($_SESSION['error'])) {
                    echo <<< TEXTO
                    <div class="mt-2 mx-auto">
                    <div class="alert alert-danger" role="alert">
                    {$_SESSION['error']}
                    </div>
                    </div>
                    TEXTO;
                    unset($_SESSION['error']);
                }
                ?>
        </div>
    </body>

    </html>
<?php
}
?>