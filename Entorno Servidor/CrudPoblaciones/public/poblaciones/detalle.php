<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:../login.php");
}
if (!isset($_GET['id'])) {
    header("Location:index.php");
}
$id = $_GET['id'];
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Examen\Poblaciones;

$ciudad = (new Poblaciones())->read1($id);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Provincias</title>
</head>

<body>
    <div class="bg-gray-100 lg:py-12 lg:flex lg:justify-center">
        <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg w-max">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url(..<?php echo $ciudad->imagen ?>)"></div>
            </div>
            <div class="py-12 px-6 max-w-xl lg:max-w-5xl lg:w-1/2">
                <h2 class="text-3xl text-gray-800 font-bold">Poblacion <span class="text-indigo-600"><?php echo $ciudad->id ?></span></h2>
                <p class="mt-4 text-gray-600">Provincia: <a href="index.php?prov=<?php echo $ciudad->provincia_id; ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 border border-yellow-500 rounded" style="text-decoration:none"><?php echo $ciudad->pnombre ?></a>
                    Población: <b><?php echo $ciudad->poblacion ?> habs.</b>
                    <br>
                    Descripción:
                    <?php echo $ciudad->descripcion ?>
                </p>
                <div class="mt-8">
                    <a href="epoblacion.php?id=<?php echo $id; ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</a>
                    &nbsp;
                    <a href="../cerrar.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                    &nbsp;
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded" onClick='window.history.back()'><i class="fas fa-backward"></i> Volver</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>