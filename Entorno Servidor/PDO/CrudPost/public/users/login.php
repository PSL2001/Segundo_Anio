<?php
session_start();
require dirname(__DIR__, 2)."/vendor/autoload.php";
use Posts\Users;

$error = false;

function estaVacio($c, $v) {
    if (strlen($v) <= 5) {
        $_SESSION[$c] = "Este campo debe de contener al menos 5 caracteres";
        return true;
    }
    return false;
}

if (isset($_POST['Btnlogin'])) {
    # Procesamos el registro
    $username = trim($_POST['username']);
    $contraseña = trim($_POST['password']);
    $password = hash("sha256", $contraseña);

    if (estaVacio("username", $username)) $error = true;
    if (estaVacio("password", $contraseña)) $error = true;
    // die(!(new Users)->comprobarUsuario($username, $password));
    if (!(new Users)->comprobarUsuario($username, $password)) $error = true;

    if (!$error) {
        # creamos el registro
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        $_SESSION['error_validacion'] = "Usuario o contraseña incorrectos";
        header("Location: {$_SERVER['PHP_SELF']}");
    }


} else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body style="background-color:silver">
    <h4 class="text-center">Entrar al Sitio</h4>
    <div class="container mt-2">
    <form name="cautor" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
        if (isset($_SESSION['error_validacion'])) {
            echo "<div class='mt-2 text-light bg-dark text-center'>{$_SESSION['error_validacion']}</div>";
            unset($_SESSION['error_validacion']);
        }
        ?>
        <div class="bg-success text-white rounded p-4 shadow-lg m-auto" style="width:48rem">
            <div class="mb-3">
                <label for="nombreUsuario" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Usuario">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="contraseña">
                
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-info" name="Btnlogin"><i class="fas fa-save"></i> Login</button>
            <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            <a href="cuser.php" class="btn btn-danger"><i class="fas fa-save"></i> Registrar</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<?php
}
?>