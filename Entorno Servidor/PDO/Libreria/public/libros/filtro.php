<?php
if (!isset($_GET['value']) || !isset($_GET['campo'])) {
    header("Location:index.php");
    die();
}
    require dirname(__DIR__, 2)."/vendor/autoload.php";

    use Libreria\Libros;
    use \Milon\Barcode\DNS1D;

    $cb = new DNS1D();
    $cb->setStorPath(__DIR__.'/cache/');

    $libros = (new Libros)->librosxCampos($_GET['value'], $_GET['campo']);
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
    <title>Libros</title>
</head>
<body style="background-color:silver">
    <h3 class="text-center">Gestion de Libros</h3>
    <div class="container mt-2">
        <a href="javascript:history.back()" class="btn btn-primary mb-2"><i class="fas fa-backward"></i> Volver</a>
    <table class="table table table-info table-striped">
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
      while ($filas = $libros->fetch(PDO::FETCH_OBJ)) {
          $item = $filas->isbn;
          echo <<< TXT
            <tr>
                <th scope="row"><a href="dlibro.php?id={$filas->id}" style="text-decoration:none;">{$cb->getBarcodeHTML("$item","EAN13",1,33,'blue',true)}</a></th>
                <td>{$filas->titulo}</td>
                <td>{$filas->autor_id}</td>
                <td>botones</td>
            </tr>
          TXT;
      }
    ?>
    </div>
</body>
</html>