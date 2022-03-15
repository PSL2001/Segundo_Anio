<?php
session_start();

require dirname(__DIR__, 1)."/vendor/autoload.php";

use App\Providers;

if (isset($_POST['btn'])) {
    //Procesamos form
    $query = trim($_POST['query']);
    $json = (new Providers($query))->getData();
    //var_dump($json);
    //die();
    //var_dump($json->hits);
    $_SESSION['misDatos'] = $json->hits;
    header("Location:datos.php");
} else {
//Cargamos form
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boostrap 5 CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Documento</title>
</head>

<body style="background-color: burlywood;">
    <div class="container">
        <form name="a" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="q" class="form-label">Query</label>
                <input required type="search" class="form-control" name="query" id="q" placeholder="Buscar....">
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit" name="btn">Buscar</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
}
?>