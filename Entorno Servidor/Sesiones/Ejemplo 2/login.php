<?php
session_start();

$usuarios = [
    ["admin1", "admin@correo.es", "secret0", 0],
    ["usuario1", "usu1@correo.es", "secret1", 1],
    ["usuario2", "usu2@correo.es", "secret2", 1],
    ["usuario3", "usu3@correo.es", "secret3", 1],
    ["admin2", "admin2@correo.es", "secretA", 0]
];

function comprobarUsuario($user,$mail, $pass) {
    #Global para cojer nuestros usuarios
    global $usuarios;
    foreach ($usuarios as $v) {
        if ($user == $v[0] && $mail == $v[1] && $pass == $v[2]) {
            # Si el usuario, correo y contraseña coinciden, me interesa devolver el perfil
            return $v[3];
        }
    }
    //Si al final del foreach, no se ha devuelto un valor, quiere decir que no hemos mandado las credenciales correctas
    return -10;
}

if (isset($_POST['btnLogin'])) {
    # Le hemos dado al boton, comprobamos datos
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $perfil = comprobarUsuario($username,$email, $pass);
    if ($perfil != -10) {
        # Si la variable es distinta a -10 (Que se considera falso), entonces ha mandado las credenciales con exito
        // Los guardamos en el array de sesiones
        $_SESSION['usuario'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['perfil'] = $perfil;
        header("Location: index.php");
    } else {
        # Si el resultado es -10 entonces ha fallado
        header("Location: {$_SERVER['PHP_SELF']}");
    }
} else {
    # No le hemos dado al boton, mostramos el formulario

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
                            <input type="text" class="form-control" id="m" placeholder="Tu nombre de Usuario" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="m" class="form-label text-white">Dirección de Correo</label>
                            <input type="email" class="form-control" id="m" placeholder="Tu correo" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="p" class="form-label text-white">Password</label>
                            <input type="password" class="form-control" id="p" placeholder="Tu contraseña" name="password">
                        </div>
                </div>
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