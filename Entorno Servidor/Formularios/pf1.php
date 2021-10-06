<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- CDN de Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body style="background-color: cadetblue;">
<h3 class="mt-4 text-center">Procesando Formulario 1</h3>
    <div class="container">
        <?php
        //Recogemos los datos mandados por el formulario
        //$_REQUEST
        echo "<br>";
        var_dump($_REQUEST);
        echo "<br>";


        //--------------------------------------
        $nombre = trim(ucwords($_REQUEST['nombre']));
        $correo = trim($_POST['correo']);
        $texto = trim(ucfirst($_POST['texto']));
        //if (isset($_POST['provincia'])) {
        //    echo "La provincia que has elejido es: ". $_POST['provincia'];
        //} else {
        //    echo "No has elegido provincia";
        //}
        echo isset($_POST['provincia']) ? "La provincia que has elejido es: ". $_POST['provincia'] : "No has elegido provincia";
        echo "<br> Tu nombre es: ". $nombre;
        echo "<br> Tu correo es: ". $correo;
        echo "<br> Esto es lo que hablastes sobre ti: ". $texto;

        ?>
        <div class="mt-2">
            <a href="uno.php" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Volver</a>
        </div>
    </div>
</body>
</html>