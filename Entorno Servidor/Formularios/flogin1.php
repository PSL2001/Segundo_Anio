<?php
$usuario = "admin";
$pass = "secret0";
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
    <h4 class="mt-4 text-center">Gestion S.A</h4>
    <div class="container mt-4">
        <?php
        if (isset($_POST['enviar'])) {
            // Proceso el form
            $usu = trim($_POST['usuario']);
            $pas = trim($_POST['pass']);

            if ($usuario == $usu && $pass == $pas) {
                header("Location:exito.php");
            } else {
                echo "Usuario y/o contraseña incorrecta <br>";
                echo "<a href='".$_SERVER['PHP_SELF']."' class = 'btn btn-primary mt-3'> Volver </a>";
            }
        } else {
            // Pinto el form
        
        ?>
        <form name="login" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <h3 class="text-center text-info">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">Usuario:</label><br>
                                    <input type="text" name="usuario" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Contraseña:</label><br>
                                    <input type="password" name="pass" id="password" class="form-control" required>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success" name="enviar"><i class="fas fa-sign-in-alt"></i> Login</button>
                                    <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<?php
        }
?>
</html>