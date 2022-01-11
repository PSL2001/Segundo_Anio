<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
}
require dirname(__DIR__) . "/vendor/autoload.php";

use Examen\{Provincias,Poblaciones};

(new Provincias)->crearProvincias(15);
(new Poblaciones)->crearPoblaciones(100);
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
    <title>Inicio</title>
</head>

<body>
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
            <div class="relative sm:max-w-sm w-full">
                <h4 class="block mt-3 text-9xl text-gray-700 text-center font-semibold">
                    Inicio
                </h4>
                <div class="flex-auto justify-self-auto mt-7">
                    <a href="provincias/" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-green-500 text-white">
                        <i class="fas fa-cogs"></i> Gestionar Provincias
                    </a>

                </div>
                <div class="flex-auto justify-self-auto mt-7">
                    <a href="poblaciones" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-green-500 text-white">
                        <i class="fas fa-city"></i> Gestionar Poblaciones
                    </a>
                </div>
                <div class="flex-auto align-middle mt-4">
                    <img alt="avatar" class="w-80 h-80 rounded-full border-2 border-gray-300" src="img/alandalus.jpg" />
                </div>
                <div class="flex-auto justify-self-auto mt-7">
                    <a href="cerrar.php" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-red-500 text-white">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>