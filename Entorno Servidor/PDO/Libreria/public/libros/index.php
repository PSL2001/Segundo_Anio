<?php
session_start();
require dirname(__DIR__, 2) . "/vendor/autoload.php";

use Libreria\Libros;
use \Milon\Barcode\DNS1D;

$cb = new DNS1D();
$cb->setStorPath(__DIR__ . '/cache/');
(new Libros)->generarLibros(150);
$stmt = (new Libros)->ReadAll();

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
  <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
  <title>Libros</title>
</head>

<body style="background-color:silver">
  <h3 class="text-center">Gestion de Libros</h3>
  <div class="container mt-2">
    <?php
    if (isset($_SESSION['mensaje'])) {
      echo <<< TXT
          <div class="alert alert-primary" role="alert">
          {$_SESSION['mensaje']}
          </div>
          TXT;
      unset($_SESSION['mensaje']);
    }
    ?>
    <a href="clibro.php" class="btn btn-primary mb-2"><i class="fas fa-book-medical"></i> Nuevo Libro</a>
    <table class="table table table-info table-striped" id="tablaLibros">
      <thead>
        <tr>
          <th scope="col">Detalles</th>
          <th scope="col">Titulo</th>
          <th scope="col">Autor ID</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
          $item = $filas->isbn;
          echo <<< TXT
            <tr>
                <th scope="row"><a href="dlibro.php?id={$filas->id}" style="text-decoration:none;">{$cb->getBarcodeHTML("$item", "EAN13", 1, 33, 'blue', true)}</a></th>
                <td>{$filas->titulo}</td>
                <td>{$filas->autor_id}</td>
                <td>
                <form name="borrar" action="blibro.php" method="POST">
                    <input type="hidden" name="id" value="{$filas->id}"/>
                    <a href="ulibro.php?id={$filas->id}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea borrar el libro?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
          TXT;
        }
        ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tablaLibros').DataTable();
    });
  </script>
</body>

</html>