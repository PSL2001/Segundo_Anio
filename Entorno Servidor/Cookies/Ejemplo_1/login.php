<?php
session_start();
$usuarios = [
    ["admin", "secret0"],
    ["usuario", "usuari0"]
];
function ComprobrarCredencial($usu, $contra) {
    global $usuarios;
    foreach ($usuarios as $v) {
        if ($v[0] == $usu && $v[1] == $contra) return true;
    }
    return false;
}
if (isset($_POST['btnLogin'])) {
    # Comprobamos que usuario y contraseña son correctas (Procesamos)
    $usuario = trim($_POST['usuario']);
    $pass = trim($_POST['password']);
    if (ComprobrarCredencial($usuario, $pass)) {
        # El Usuario y la contraseña son correctas
        if (isset($_POST['recordar'])) {
            //Creamos una cookie para guardar el usuario
            setcookie("usu",$usuario, time()+(7*24*60*60));
        } else {
            setcookie("usu",45,time()-2);
        }
        $_SESSION['usuario'] = $usuario;
        header("Location: portal.php");
    } else {
        # Se ha fallado el login
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: {$_SERVER['PHP_SELF']}");
    }
} else {
    # Mostramos el formulario

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BootStrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- cdn fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Ejemplo</title>
    </head>

    <body style="background-color: blanchedalmond;">
        <div class="container my-4">

            <!-- Añadimos el card -->
            <div class="card mx-auto bg-secondary" style="width: 30rem;">
                <div class="card-header text-center text-white">
                    <<< IES-ALANDALUS (Almería)>>>
                </div>
                <div class="card-body">
                    <form name="asd" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="mb-3">
                            <label for="m" class="form-label text-white">Usuario</label>
                            <?php
                            if (isset($_COOKIE['usu'])) {
                                echo "<input type='text' class='form-control' id='m' placeholder='Tu usuario' name='usuario' value='{$_COOKIE['usu']}'>";
                            } else {
                                echo "<input type='text' class='form-control' id='m' placeholder='Tu usuario' name='usuario'>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="p" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" id="p" placeholder="Tu contraseña" name="password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="ru" name="recordar">
                            <label class="form-check-label text-light" for="ru">
                                Recordar Usuario
                            </label>
                        </div>
                </div>
                <?php
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-info" name="btnLogin"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                    </form>
                </div>
            </div>

        </div>

    </body>

    </html>
<?php
}
?>