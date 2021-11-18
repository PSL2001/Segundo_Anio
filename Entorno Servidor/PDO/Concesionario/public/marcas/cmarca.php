<?php
session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Concesionario\Marcas;

$APP_URL = "http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/img/marcas/default.png";

if (isset($_POST['enviar'])) {
    $nombre = trim($_POST['nombre']);
    $pais = trim($_POST['pais']);
}
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
    <title>Crear Marca</title>
</head>

<body style="background-color:#f57c00">
    <h4 class="text-center">Crear Marca</h4>
    <div class="container mt-2">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="mx-auto rounded" style="background-color: #99d066;">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="formFile" name="nombre">
                </div>
            </div>
        </form>

    </div>
</body>

</html>