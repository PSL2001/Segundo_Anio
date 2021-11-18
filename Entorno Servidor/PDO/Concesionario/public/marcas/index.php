<?php

use Concesionario\Marcas;

session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

(new Marcas)->crearMarcas(15);

$stmt = (new Marcas)->readAll();
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
    <title>Inicio Marcas</title>
</head>

<body style="background-color:#f57c00">
    <h5 class="text-center">Marcas de Autos</h5>
    <div class="container mt-2">
        <a href="cmarca.php" class="btn btn-primary mb-2"> Crear Marca</a>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Detalles</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo <<< TXT
                    <tr>
                    <th scope="row">btn</th>
                    <td>{$fila->nombre}</td>
                    <td><img src="{$fila->img}" class="rounded mx-auto d-block img-fluid" style="width: 2rem;"> </td>
                    <td>{$fila->pais}</td>
                    <td>btn</td>
                    </tr>
                    TXT;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>