<!DOCTYPE html>
<?php
    if (isset($_POST['botonsubir'])) {
        # Procesamos el formulario
        echo var_dump($_FILES);
        echo "<br>";
        $dir_subida = "/home/usuario/public_html/Entorno Servidor/Formularios/uploads/";
        $fich_subido = $dir_subida.basename($_FILES['fotoperfil']['name']);
        //echo "<br> $fich_subido";
        //Movemos de la carpeta temporal a uploads
        if (move_uploaded_file($_FILES['fotoperfil']['tmp_name'], $fich_subido)) {
            echo "Fichero subido con exito";
        } else {
            echo "Hubo un error al guardar el archivo";
        }
    } else {
        # Pintamos el formulario
    
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>
<body>
    <form name="files" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
    <p><b> Sube tu foto de perfil </b></p>
    <input type="file" name="fotoperfil">
    <br>
    <input type="submit" name="botonsubir" value="Subir">
    </form>
</body>
<?php
    }
?>
</html>