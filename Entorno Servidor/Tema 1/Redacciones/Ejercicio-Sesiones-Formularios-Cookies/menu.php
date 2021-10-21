<?php
//Antes de cargar la pagina, comprobamos si la sesion de usuario (la variable que guarda el usuario) existe
session_start();
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

//Vamos a hacer una variable color, la cual dependiendo del usuario, cambiara el color de fondo
$color;
if ($_SESSION['perfil'] == 0) {
    # Si el perfil es 0 utilizamos este color (Perfil 0 es administrador)
    $color = "#FF1E90";
} else if ($_SESSION['perfil'] == 1) {
    //Si el perfil es 1 utilizamos este color (Perfil 1 es usuario por defecto)
    $color = "#1E90FF";
} else {
    //Si no es ninguno de los anteriores utilizamos este (Perfil 2 es usuario avanzado)
    $color = "#90FF1E";
}
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
    <title>Menu Principal</title>
</head>
<body style="background-color:<?php echo $color ?>;">
<!-- Barra de navegacion -->
<ul class="nav justify-content-end">

    <li class="nav-item">
    <a href="cerrarSesion.php" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i></a>
    </li>
    <li class="nav-item">
        <?php
        //Comprobamos el perfil para mostrar su tipo (admin, normal, avanzado)
        $tipo;
        if ($_SESSION['perfil'] == 0) {
            # Si el perfil es 0 mostramos "Administrador" (Perfil 0 es administrador)
            $tipo = "Administrador";
        } else if ($_SESSION['perfil'] == 1) {
            //Si el perfil es 1 mostramos "Usuario Normal" (Perfil 1 es usuario por defecto)
            $tipo = "Usuario Normal";
        } else {
            //Si no es ninguno de los anteriores mostramos "Usuario Avanzado" (Perfil 2 es usuario avanzado)
            $tipo = "Usuario Avanzado";
        }
        ?>
        <input type="text" class="form-control" disabled value="<?php echo $_SESSION['usuario']; ?>, <?php echo $tipo ?>" style="width: 14rem;"/>
    </li>   
    </ul>
    <!-- Fin Barra de navegacion -->
    <div class="container mt-4">
        <?php
        //Aqui vamos a comprobar que, dependiendo del perfil, se nos muestren mas o menos botones
        if ($_SESSION['perfil'] == 0) {
            # Si el perfil es 0 entonces es Administrador, mostramos todas las paginas
            echo <<< TEXTO
            <a href="pagina3.php" class="btn btn-success"><i class="fas fa-file-alt"></i> Página 3</a>
            <a href="pagina2.php" class="btn btn-primary"><i class="fas fa-sticky-note"></i> Página 2</a>
            TEXTO;
        } else if ($_SESSION['perfil'] == 2) {
            # Si el perfil es 2, mostramos solo pagina2
            echo "<a href='pagina2.php' class='btn btn-primary'><i class='fas fa-sticky-note'></i> Página 2</a>";
        }
        ?>
        <a href="pagina.php" class="btn btn-secondary"><i class="fas fa-copy"></i> Pagina 1</a>
    </div>
</body>
</html>