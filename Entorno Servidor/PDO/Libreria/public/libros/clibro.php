<?php
session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Libreria\{Autores, Libros};
use Isbn\Isbn;

$autores = (new Autores)->devolverAutores();

function hayError($t, $i, $s) {
    $error = false;
    $isbn = new Isbn;
    if (strlen($i) == 0 || !$isbn->validation->isbn13($i)) {
        $error = true;
        $_SESSION['isbn_error'] = "Formato ISBN incorrecto";
    }
    if ((new Libros)->existeISBN($i)) {
        $error = true;
        $_SESSION['isbn_error'] = "El ISBN ya existe en la base de datos";
    }

    if (strlen($t) == 0) {
        $error = true;
        $_SESSION['error_titulo'] = "Rellena el titulo";
    }

    if (strlen($s) <= 5) {
        $error = true;
        $_SESSION['error_sipnosis'] = "El campo debe contener al menos 5 caracteres";
    }


    return $error;
}

if (isset($_POST['btnCrear'])) {
    $titulo = trim(ucwords($_POST['titulo']));
    $sinopsis = trim(ucfirst($_POST['sipnosis']));
    $isbn = trim($_POST['isbn']);
    $autor_id = $_POST['autor_id'];
    if (!hayError($titulo, $isbn, $sinopsis)) {
        # Guardamos el libro
        (new Libros)->setTitulo($titulo)
        ->setSipnosis($sinopsis)
        ->setIsbn($isbn)
        ->setId_autor($autor_id)
        ->create();
        $_SESSION['mensaje'] = "Libro creado";
        header("Location: index.php");
    } else {
        //Mostramos errores
        header("Location: {$_SERVER['PHP_SELF']}");
    }
} else {


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
    <title>Crear Libro</title>
</head>

<body style="background-color:silver">
    <h3 class="text-center">Nuevo Libro</h3>
    <div class="container mt-2">
        <div class="bg-success text-white rounded p-4 shadow-lg m-auto" style="width:48rem">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="clibro" method="POST">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="texto" required placeholder="El titulo del libro" name="titulo">
                    <?php
                        if (isset($_SESSION['error_titulo'])) {
                            echo <<< TXT
                            <div class="mt-2 text-danger ft-bold" style="font-size:small">
                            {$_SESSION['error_titulo']}
                            </div>
                            TXT;
                            unset($_SESSION['error_titulo']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="sipnosis" class="form-label">Sipnosis</label>
                    <textarea class="form-control" id="sipnosis" rows="3" required name="sipnosis"></textarea>
                    <?php
                        if (isset($_SESSION['error_sipnosis'])) {
                            echo <<< TXT
                            <div class="mt-2 text-danger ft-bold" style="font-size:small">
                            {$_SESSION['error_sipnosis']}
                            </div>
                            TXT;
                            unset($_SESSION['error_sipnosis']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" maxlength="13" required id="isbn" placeholder="ISBN" name="isbn">
                    <?php
                        if (isset($_SESSION['isbn_error'])) {
                            echo <<< TXT
                            <div class="mt-2 text-danger ft-bold" style="font-size:small">
                            {$_SESSION['isbn_error']}
                            </div>
                            TXT;
                            unset($_SESSION['isbn_error']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="autor_id" class="form-label">Autor</label>
                    <select class="form-select" aria-label="selectAutor" name="autor_id">
                        <?php
                        foreach ($autores as $item) {
                            echo "<option value='{$item->id}'>{$item->apellidos}, {$item->nombre}</option>".PHP_EOL;
                        }
                        ?>
                    </select>
                    <div class="mb-3">
                        <button name="btnCrear" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Crear</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
}
?>