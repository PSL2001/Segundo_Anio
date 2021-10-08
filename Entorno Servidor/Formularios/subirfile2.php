<!DOCTYPE html>
<?php
$tipos_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/x-icon','image/webp', 'image/svg+xml', 'image/tiff'];
    if (isset($_POST['btnsubir'])) {
        # Procesamos el form
        if ($_FILES['foto']['error'] == 0) {
            # Se ha podido subir el fichero
            //1- Compruebo el tipo
            if (in_array($_FILES['foto']['type'],$tipos_permitidos)) {
                # El tipo es valido, es decir, es una imagen, lo subimos
                $dir_subida = "/home/usuario/public_html/Entorno Servidor/Formularios/uploads/";
                // Le damos un nombre unico
                $nombre = uniqid().basename($_FILES['foto']['name']);
                $destino_final = $dir_subida.$nombre;
                if (move_uploaded_file($_FILES['foto']['tmp_name'],$destino_final)) {
                    echo "Foto subida con exito";
                } else {
                    echo "Hubo un error";
                }

            }else {
                # El tipo no es valido, no he subido una imagen
                echo "Error, se esperaba un archivo de imagen";
            }

        } else {
            echo "<br> Hubo algun error";
        }
    } else {
        # Imprimimos el form
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="ar" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <p><b>Sube tu foto de perfil</b></p>
    <input type="file" name="foto" accept="image/*">
    <br> <br>
    <center>
        <input type="submit" name="btnsubir" value="Subir">
    </center>
    </form>
</body>
<?php
    }
?>
</html>