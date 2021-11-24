<?php
session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Concesionario\Coches;

if (!isset($_GET['campo']) && !isset($_GET['valor'])) {
    header("Location:index.php");
    die();
}
$stmt = (new Coches)->filtro($_GET['campo'], $_GET['valor']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Inicio Coches</title>





</head>

<body style="background-color:#ff9800">
    <h4 class="text-center mt-2">Coches Guardados</h4>

    <div class="container mt-2">
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<p class='p-2 my-2 text-danger bg-info rounded'>
        <i class='fas fa-info'></i> {$_SESSION['mensaje']}</p>";
            unset($_SESSION['mensaje']);
        }
        ?>
        <a href="cmarca.php" class="btn btn-info my-2"><i class="fas fa-plus"></i> Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Detalles</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Kms</th>
                    <th scope="col">Img</th>
                    <th scope="col">Tipo</th>

                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $i = serialize($fila);
                    echo <<<TXT
                    <tr>
                    <th scope="row"><a href="dcoche.php?id={$fila->id}" class="btn btn-success"><i class="fas fa-info"></i></a> </th>
                    <td>{$fila->modelo}</td>
                    <td>{$fila->kilometros}</td>
                    <td><img src='{$fila->img}' width='40rem' height='40rem' class='img-thumbnail'></td>
                    <td>{$fila->tipo}</td>
                    <td>
                        <form name='a' method='POST' action='bcoches.php'>
                        <input type='hidden' name='obj' value='$i'>
                        <a href='ecoche.php?id={$fila->id}' class='btn btn-warning'><i class='fas fa-edit'></i></a>
                        <button type='submit' class='btn btn-danger'><i class='fas fa-trash'></i></button>
                        </form>
                    </td>
                    </tr>
                    TXT;
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>