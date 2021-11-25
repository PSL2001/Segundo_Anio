<?php
if (!isset($_GET['id'])) {
    header("Location:index.php");
    die();
}
$id = $_GET['id'];

session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Concesionario\{Marcas, Imagen, Coches};

$marcas = (new Marcas)->devolverMarcas();
$tipos = ['Electrico', 'Hibrido', 'Gasolina', 'Gasoil', 'GLP', 'Gas'];
$detallesCoche = (new Coches)->mostrarCoche($id);

$URL_APP = "http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public";
$error = false;

function comprobarCampos($n, $v)
{
    global $error;
    if (strlen($v) == 0) {
        $_SESSION[$n] = "**Error el campo $n no puede ser vacio!!!";
        $error = true;
    }
}
if (isset($_POST['enviar'])) {
    //proceso el formulario
    $m = ucfirst(trim($_POST['modelo']));
    $k = ucfirst(trim($_POST['kilometros']));
    $c = ucfirst(trim($_POST['color']));
    $t = ucfirst(trim($_POST['tipo']));
    $marca_id = ucfirst(trim($_POST['marca_id']));

    comprobarCampos("modelo", $m);
    comprobarCampos("kilometros", $k);
    ComprobarCampos("color", $c);

    $coche = new Coches;

    //comprobamos imagen
    //1.- veo si he subido o no una imagen
    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        //he subido un fichero
        if ((new Imagen)->isImagen($_FILES['img']['type'])) {
            //he subido la imagen
            $imagen = new Imagen;
            $imagen->setAppUrl("http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/");
            $imagen->setDirStorage(dirname(__DIR__) . "/img/coches/");
            $imagen->setNombreF($_FILES['img']['name']);
            if ($imagen->guardarImagen($_FILES['img']['tmp_name'])) {
                //genero la url a ese fichero para guararla en la base de datos
                $coche->setImg($imagen->getUrlImagen('coches'));
            } else {
                $error = true;
                $_SESSION['err_img'] = "No se pudo guardar la imagen";
            }
        } else {
            //Lo que he subido NO es una imagen
            $error = true;
            $_SESSION['err_img'] = "El fichero debe ser de tipo imagen";
        }
    } else {
        //NO he subido nada
        $imagen = new Imagen;
        $imagen->setAppUrl("http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/");
        $coche->setImg($imagen->guardarDefault('coches'));
    }

    //fin
    if (!$error) {
        //guardamos la coche
        $coche->setModelo($m)->setKilometros($k)->setColor($c)->setTipo($t)->setMarca_id($marca_id)->create();
        $_SESSION['mensaje'] = "Coche guardado.";
        header("Location:index.php");
    } else {
        //muestro
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
        <!-- BootStrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Crear Coche</title>
    </head>

    <body style="background-color:#ff9800">
        <h4 class="text-center">Nuevo Coche</h4>
        <div class="container mt-2">
            <div class="my-2 p-4 mx-auto" style="background-color:#c0ca33; width:40rem">

                <form name="s" action='<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>' method='POST' enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="n" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="n" required placeholder="Modelo Coche" name="modelo">
                        <?php
                        if (isset($_SESSION['modelo'])) {
                            echo "<p class='text-danger mt-1'>{$_SESSION['modelo']}</p>";
                            unset($_SESSION['modelo']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="p" class="form-label">Kilometros</label>
                        <input type="number" class="form-control" id="p" placeholder="Km" required name="kilometros" min="0">
                        <?php
                        if (isset($_SESSION['kilometros'])) {
                            echo "<p class='text-danger mt-1'>{$_SESSION['kilometros']}</p>";
                            unset($_SESSION['kilometros']);
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="p" class="form-label">Color</label>
                        <input type="text" class="form-control" id="p" placeholder="Color" required name="color">
                        <?php
                        if (isset($_SESSION['color'])) {
                            echo "<p class='text-danger mt-1'>{$_SESSION['color']}</p>";
                            unset($_SESSION['color']);
                        }
                        ?>
                    </div>

                    <div class="mb-3">
                        <label for="i" class="form-label">Tipo</label>
                        <select class="form-select" aria-label="Default select example" required name="tipo">
                            <?php
                            foreach ($tipos as $v) {
                                if ($v == $detallesCoche->tipo) {
                                    echo "<option selected>$v</option>";
                                } else {
                                    echo "<option>$v</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="i" class="form-label">Marca</label>
                        <select class="form-select" aria-label="Default select example" required name="marca_id">
                            <?php
                            foreach ($marcas as $item) {
                                echo "<option value='{$item->id}'>{$item->nombre}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="i" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="i" name="img">
                        <?php
                        if (isset($_SESSION['err_img'])) {
                            echo "<p class='text-danger mt-1'>{$_SESSION['err_img']}</p>";
                            unset($_SESSION['err_img']);
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <button type="submit" name="enviar" class="btn btn-success"><i class="fas fa-edit"></i> editar</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-brush"></i> Limpiar</button>
                        <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Inicio</a>
                    </div>
                </form>
            </div>

        </div>
    </body>

    </html>
<?php } ?>