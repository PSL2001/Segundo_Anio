<?php
if (!isset($_GET['id'])) {
    header("Location:index.php");
}
$id = $_GET['id'];
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../login.php");
}
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Examen\{Provincias, Poblaciones};

$provincias = (new Provincias)->readAll();
$ciudad = (new Poblaciones)->read1($id);

$error = false;

function comprobar(string $nombre, string $string)
{
    global $error;
    if (strlen($nombre) == 0) {
        $_SESSION[$string] = "Rellena este campo.";
        $error = true;
    }
}

function isImagen($tipo)
{

    $tiposBuenos = [
        'image/jpeg',
        'image/bmp',
        'image/png',
        'image/webp',
        'image/gif',
        'image/svg-xml',
        'image/x-icon'
    ];
    return in_array($tipo, $tiposBuenos);
}

if (isset($_POST['editar'])) {
    $imagen = $ciudad->imagen;
    $nombre = trim(ucwords($_POST['nombre']));
    $des = trim(ucfirst($_POST['descripcion']));
    $poblacion = $_POST['poblacion'];

    comprobar($nombre, "errnombre");
    comprobar($des, "errdes");

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        if (isImagen($_FILES['imagen']['type'])) {
            $nombreImg = uniqid() . "_" . $_FILES['imagen']['name'];
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], dirname(__DIR__) . "/img/poblaciones/" . $nombreImg)) {
                $_SESSION['errimg'] = "No se pudo guardar la imagen";
                $error = true;
            } else {
                $imagen = "/img/poblaciones/$nombreImg";
                //borramos la vieja si no era default.jpg
                if(basename($ciudad->imagen)!="default.jpg"){
                    unlink(dirname(__DIR__).$ciudad->imagen);
                }
            }
        } else {
            $_SESSION['errimg'] = "El archivo debe ser de tipo imagen.";
            $error = true;
        }
    }
    if (!$error) {
        (new Poblaciones)->setNombre($nombre)
            ->setDescripcion($des)
            ->setImagen($imagen)
            ->setProvincia_Id($_POST['provincia_id'])
            ->setPoblacion($poblacion)
            ->update($id);
        $_SESSION['mensaje'] = "Población Editada.";
        header("Location:index.php");
    } else {
        header("Location:{$_SERVER['PHP_SELF']}?id=$id");
    }
} else {
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
        <title>Poblacion</title>
    </head>

    <body>
        <div class="w-full bg-gray-800 h-screen">
            <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
            <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
                <div class="bg-gray-900 w-full shadow rounded p-8 sm:p-12 -mt-72">
                    <p class="text-3xl font-bold leading-7 text-center text-white">Editar Poblacion (<?php echo $id; ?>)</p>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="md:flex items-center mt-12">
                            <div class="w-full md:w-1/2 flex flex-col">
                                <label class="font-semibold leading-none text-gray-300">Nombre</label>
                                <input type="text" value="<?php echo $ciudad->nombre ?>" class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" name="nombre" />
                                <?php
                                if (isset($_SESSION['errnombre'])) {
                                    echo <<< TXT
                                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <div>
                                            <span class="font-medium">Error!</span> {$_SESSION['errnombre']}
                                        </div>
                                    </div>
                                    TXT;
                                    unset($_SESSION['errnombre']);
                                }
                                ?>
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="font-semibold leading-none text-gray-300">Provincia</label>
                                <select class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" name="provincia_id">
                                    <?php
                                    while ($fila = $provincias->fetch(PDO::FETCH_OBJ)) {
                                        echo ($fila->id == $ciudad->provincia_id) ? "<option value={$fila->id} selected>{$fila->nombre}</option>" : "<option value={$fila->id}>{$fila->nombre}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="font-semibold leading-none text-gray-300">Num.Habitantes</label>
                                <input type="number" value="<?php echo $ciudad->poblacion ?>" required class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" name="poblacion" />
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="w-64 flex flex-col items-center px-4 py-6 bg-gray-900 text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white font-semibold leading-none text-gray-300 ">
                                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="mt-2 text-base leading-normal">Imagen</span>
                                    <input type='file' class="hidden" name="imagen" />
                                </label>
                                <?php
                                if (isset($_SESSION['errimg'])) {
                                    echo <<< TXT
                                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <div>
                                            <span class="font-medium">Error!</span> {$_SESSION['errimg']}
                                        </div>
                                    </div>
                                    TXT;
                                    unset($_SESSION['errimg']);
                                }
                                ?>
                            </div>


                        </div>
                        <div>
                            <div class="w-full flex flex-col mt-8">
                                <label class="font-semibold leading-none text-gray-300">Descripcion</label>
                                <textarea type="text" name="descripcion" class="h-40 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded"><?php echo $ciudad->descripcion; ?></textarea>
                                <?php
                                if (isset($_SESSION['errdes'])) {
                                    echo <<< TXT
                                        <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                        <div>
                                            <span class="font-medium">Error!</span> {$_SESSION['errdes']}
                                        </div>
                                    </div>
                                    TXT;
                                    unset($_SESSION['errdes']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <button type="submit" name="editar" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                Editar Poblacion
                            </button>
                            &nbsp;
                            <button type="reset" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-yellow-700 rounded hover:bg-yellow-600 focus:ring-2 focus:ring-offset-2 focus:ring-yellow-700 focus:outline-none">
                                Limpiar
                            </button>
                            &nbsp;
                            <a href="../cerrar.php" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-red-700 rounded hover:bg-red-600 focus:ring-2 focus:ring-offset-2 focus:ring-red-700 focus:outline-none">
                                Cerrar Sesion
                            </a>
                            &nbsp;
                            <a href="./index.php" class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-green-700 rounded hover:bg-green-600 focus:ring-2 focus:ring-offset-2 focus:ring-green-700 focus:outline-none">
                                Volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>