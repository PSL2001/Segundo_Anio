<?php
//Siempre al trabajar con sesiones añadir session_start() y siempre al principio del documento
session_start();
$usuarios = [
    ["admin@correo.es", "secret0", 0],
    ["usu1@correo.es", "secret0", 1],
    ["admin2@correo.es", "secret0", 0]
];

function comprobarUsuario($mail, $pass)
{
    global $usuarios;
    foreach ($usuarios as $v) {
        if ($v[0] == $mail && $v[1] == $pass) {
            return $v[2];
        } else {
            return -5;
        }
    }
}

if (isset($_POST['login'])) {
    //Le hemos dado al boton, procesamos
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $perfil = comprobarUsuario($email, $pass);
    if ($perfil != -5) {
        //Validacion correcta, me interesa guardar el perfil
        $_SESSION['usuario'] = $email;
        $_SESSION['perfil'] = $valor;
        header("Location: index.php");
    } else {
        //Error al validar
        $_SESSION['error'] = "Correo o contraseña incorrectos";
        header("Location: login.php");
    }
} else {
    // No le hemos dado al boton, mostramos el form

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

    <body style="background-color: dodgerblue;">
        <div class="container mt-4">
            <div class="card mx-auto bg-dark text-light" style="width: 34rem;">
                <div class="card-header text-center">
                    Login I.E.S Al-Andalus
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Direccion de Email</label>
                            <input type="email" class="form-control" id="mail" placeholder="correo@mail.es" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="login"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                </div>
                </form>
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                echo <<< TEXTO
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fas fa-exclamation-triangle"></i> 
                <div>
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