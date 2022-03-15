<?php
session_start();
$datos = $_SESSION['misDatos'];
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
        <?php
        foreach ($datos as $item) {
            #Recorremos los datos
            echo <<< TXT
            <div class="card mx-auto mt-2" style="width:18rem;">
            <img src="$item->previewURL" />
            <div class="card-body">
                <p class="card-text">Autor: {$item->user} </p>
                <p class="card-text">Likes: {$item->likes} </p>
            </div>
            </div>
            TXT;
        }
        ?>
    </div>
</body>
</html>