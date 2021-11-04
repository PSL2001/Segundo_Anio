<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
    die();
}
require dirname(__DIR__, 2)."/vendor/autoload.php";
use Libreria\Libros;
$datosLibro = (new Libros)->read($_GET['id']);

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
    <title>Detalles Libro</title>
</head>
<body style="background-color:silver">
    <h3 class="text-center">Detalles Libro (<?php echo $datosLibro->id; ?>)</h3>
    <div class="container mt-2">
        <div class="mx-auto bg-primary text-white rounded-3 p-4 shadow-lg" style="width: 40rem;">
        <h5 class="text-center"><?php echo $datosLibro->titulo; ?></h5>
        <p class="mt-3 text-justified fst-italic">
            <?php echo $datosLibro->sipnosis; ?>
        </p>
        <p class="mt-3"><b>Autor:</b> 
            <a href="filtro.php?value=<?php echo $datosLibro->autor_id; ?>&campo=autor_id" class="p-1 rounded-pill bg-warning" style="text-decoration: none;"> <?php echo $datosLibro->nombre." ".$datosLibro->apellidos." (".$datosLibro->autor_id.")"; ?></a>
        </p>
        <p class="mt-3"><b>ISBN:</b> 
            <?php echo $datosLibro->isbn ?>
        </p>
        <p class="mt-3"><b>Pais:</b> 
            <a href="filtro.php?value=<?php echo $datosLibro->pais ?>&campo=pais" class="p-1 rounded-pill bg-danger" style="text-decoration: none;"> <?php echo $datosLibro->pais ?></a>
        </p>
        <div class="mt-2">
            <a href="index.php" class="btn btn-secondary"><i class="fas fa-backward"></i> Volver</a>
        </div>
        </div>
    </div>
</body>
</html>