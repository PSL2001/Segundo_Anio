<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location:../login.php");
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Examen\Poblaciones;

$stmt = (!isset($_GET['prov'])) ? (new Poblaciones)->read() : (new Poblaciones)->setProvincia_Id($_GET['prov'])->read();
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
    <title>Poblaciones</title>
</head>

<body>
    <div class="font-sans">
        <div class="relative min-h-screen flex flex-col sm:justify-self-auto items-center bg-blue-400">
            <h4 class="block mt-3 text-6xl text-gray-700 text-center font-semibold">
                Poblaciones
            </h4>
            <div class="relative sm:max-w-sm w-full">
                <div class="flex-auto justify-self-auto mt-7 mb-7">
                    <a href="cpoblacion.php" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-gray-500 text-white">
                        <i class="fas fa-plus"></i> Nueva
                    </a>
                    <a href="../cerrar.php" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-red-500 text-white">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </div>
                <div class="flex-auto justify-self-auto mt-7">
                    <a href="../" class="relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-green-500 text-white">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                    <?php
                    if (isset($_GET['prov'])) {
                        echo "<a href='index.php' class='relative w-fit h-fit px-4 py-2 text-xl border rounded-full bg-green-700 text-white'><i class='fas fa-city'></i> Ver Todas</a>";
                    }
                    ?>
                </div>
            </div>
            <?php
            if (isset($_SESSION['mensaje'])) {
                echo <<< TXT
                <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div>
                        <span class="font-medium">Info!</span> {$_SESSION['mensaje']}
                    </div>
                </div>
                TXT;
                unset($_SESSION['mensaje']);
            }
            ?>
            <br>
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative ">
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Detalle</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Provincia</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    <?php
                    while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
                        $pob = serialize($fila);
                        echo <<< TXT
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Detalle</span><a href="detalle.php?id={$fila->id}" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-1 px-2 border border-blue-400 rounded"><i class="fas fa-info"></i></a></td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{$fila->nombre}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Descripcion</span>{$fila->pnombre}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                                <form name="a" method='POST' action="bpoblacion.php">
                                <input name="obj" value=$pob type="hidden" />
                                <a href="epoblacion.php?id={$fila->id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</a>
                                <button type="submit" onclick="return confirm('¿Borrar poblacion?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        TXT;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>