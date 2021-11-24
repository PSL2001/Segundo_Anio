<?php

use Concesionario\Coches;

if (!isset($_GET['id'])) {
    header("Location: index.php");
    die();
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

$id = $_GET['id'];
$miCoche = (new Coches)->detallesCoche($id);
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
    <title>Detalles Coche</title>
</head>

<body style="background-color:#f57c00">
    <h4 class="text-center">Detalles Coche (<?php echo $id ?>)</h4>
    <div class="container mt-2">
        <div class="card text-center" style="background-color: <?php echo $miCoche->color ?>;">
            <h5 class="card-header"> Marca <b><?php echo $miCoche->nombre ?></b></h5>
             <img src="<?php echo $miCoche->img ?>" class="img-thumbnail rounded mx-auto d-block" width='100rem' height='100rem'>
            <div class="card-body">
                <h5 class="card-title">Modelo: <b><?php echo $miCoche->modelo ?></b></h5>
                <p class="card-text"><?php echo $miCoche->kilometros ?> Kms</p>
                <p class="card-text">Tipo: <a href="fcoche.php?campo=tipo&valor=<?php echo $miCoche->tipo ?>" class="p-1 rounded-pill bg-light" style="text-decoration: none;"> <?php echo $miCoche->tipo ?></a></p>
                <p class="card-text">Color: <a href="fcoche.php?campo=color&valor=<?php echo $miCoche->color ?>" class="p-1 rounded-pill bg-danger" style="text-decoration: none;"> <?php echo $miCoche->color ?></a></p>
                <p class="card-text">Pais: <?php echo $miCoche->pais ?></p>
                <a href="index.php" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</body>

</html>