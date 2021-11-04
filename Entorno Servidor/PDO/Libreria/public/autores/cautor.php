<?php
//Trabajamos con sesiones, empezamos poniendo session_start()
session_start();
//Cargamos el Autoload de composer
require dirname(__DIR__, 2)."/vendor/autoload.php";
use Libreria\Autores;

function Hayerror($n, $a, $p) {
    $error = false;
    if (strlen($n) == 0) {
        $_SESSION['error_nombre'] = "Rellena el campo nombre";
        $error = true;
    }
    if (strlen($a) == 0) {
        $_SESSION['error_apellidos'] = "Rellena el campo apellidos";
        $error = true;
    }
    if (strlen($p) == 0) {
        $_SESSION['error_pais'] = "Rellena el campo pais";
        $error = true;
    }

    return $error;
}
if (isset($_POST['crear'])) {
    # Procesamos el formulario
    $nombre = trim(ucwords($_POST['nombre']));
    $apellidos = trim(ucwords($_POST['apellidos']));
    $pais = trim(ucwords($_POST['pais']));
    if (!Hayerror($nombre, $apellidos, $pais)) {
        # Podemos hacer el insert
        (new Autores)->setNombre($nombre)
        ->setApellidos($apellidos)
        ->setPais($pais)
        ->create();
        //Mandamos un mensaje al index, diciendo que se ha creado con exito
        $_SESSION['mensaje'] = "Autor Creado con exito";
        header("Location: index.php");
        die();
    }
    header("Location: {$_SERVER['PHP_SELF']}");
} else {
    # Pintamos el formulario

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
    <title>Crear Autor</title>
</head>

<body style="background-color:silver">
    <h3 class="text-center">Nuevo Autor</h3>
    <div class="container mt-2">
        <form name="cautor" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="bg-success text-white rounded p-4 shadow-lg m-auto" style="width:48rem">
            <div class="mb-3">
                <label for="nombreAutor" class="form-label">Nombre Autor</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre">
                <?php
                if (isset($_SESSION['error_nombre'])) {
                    echo <<< TEXTO
                    <div class="mt-2 text-danger ft-bold" style="font-size:small">
                    {$_SESSION['error_nombre']}
                    </div>
                    TEXTO;
                    unset($_SESSION['error_nombre']);
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="ApllidosAutor" class="form-label">Apellidos Autor</label>
                <input type="text" class="form-control" id="ape" name="apellidos" required placeholder="Apellidos">
                <?php
                if (isset($_SESSION['error_apellidos'])) {
                    echo <<< TEXTO
                    <div class="mt-2 text-danger ft-bold" style="font-size:small">
                    {$_SESSION['error_apellidos']}
                    </div>
                    TEXTO;
                    unset($_SESSION['error_apellidos']);
                }
                ?>
            </div>
            <div class="mb-3">
                <label for="PaisAutor" class="form-label">Pais Autor</label>
                <input type="text" class="form-control" id="pais" name="pais" required placeholder="Pais">
                <?php
                if (isset($_SESSION['error_pais'])) {
                    echo <<< TEXTO
                    <div class="mt-2 text-danger fw-bold" style="font-size:small">
                    {$_SESSION['error_pais']}
                    </div>
                    TEXTO;
                    unset($_SESSION['error_pais']);
                }
                ?>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="crear"><i class="fas fa-save"></i> Crear</button>
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