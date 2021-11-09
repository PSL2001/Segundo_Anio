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

if (isset($_POST['Btncrear'])) {
    # Procesamos el registro
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $contraseña = trim($_POST['password']);
    if (estaVacio("username", $username)) {
        $error = true;
    } else {
        //Sabemos que usuario no esta vacio, comprobamos que no existe
        if ((new Users)->existeCampo("username", $username)) {
            # El campo existe por lo tanto no se puede añadir
            $_SESSION['username'] = "Este nombre de usuario ya existe";
            $error = true;
        }
    } 
    if (estaVacio("email", $email)){
        $error = true;
    } else {
        if ((new Users)->existeCampo("email", $email)) {
            # El campo existe por lo tanto no se puede añadir
            $_SESSION['email'] = "Este correo ya existe";
            $error = true;
        }
    } 
    if (estaVacio("password", $contraseña)) $error = true;
    if (!$error) {
        # creamos el registro
        $password = hash("sha256", $contraseña);
        (new Users)->setUsername($username)
        ->setEmail($email)
        ->setPassword($password);
        
    } else {
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
    <title>Registrar Usuario</title>
</head>
<body style="background-color:silver">
    <h4 class="text-center">Registrar Usuario</h4>
    <div class="container mt-2">
    <form name="cautor" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="bg-success text-white rounded p-4 shadow-lg m-auto" style="width:48rem">
            <div class="mb-3">
                <label for="nombreUsuario" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Usuario">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<div class = 'text-danger'>".$_SESSION['username']."</div>";
                    unset($_SESSION['username']);
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="emailUser" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="email" required placeholder="tucorreo@mail.es">
                <?php
                if (isset($_SESSION['email'])) {
                    echo "<div class = 'text-danger'>".$_SESSION['email']."</div>";
                    unset($_SESSION['email']);
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="contraseña">
                <?php
                if (isset($_SESSION['password'])) {
                    echo "<div class = 'text-danger'>".$_SESSION['password']."</div>";
                    unset($_SESSION['password']);
                }
                ?>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="Btncrear"><i class="fas fa-save"></i> Registrar</button>
            <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
<?php
}
?>