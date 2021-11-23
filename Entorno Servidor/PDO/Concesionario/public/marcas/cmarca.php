<?php
    session_start();
    require dirname(__DIR__, 2)."/vendor/autoload.php";
    use Concesionario\{Marcas, Imagen};
    
    $URL_APP="http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public";
    $error=false;

    function comprobarCampos($n, $v){
        global $error;
        if(strlen($v)==0){
            $_SESSION[$n]="**Error el campo $n no puede ser vacio!!!";
            $error=true;
        }
    }
    if(isset($_POST['enviar'])){
        //proceso el formulario
        $n=ucfirst(trim($_POST['nombre']));
        $p=ucfirst(trim($_POST['pais']));

        comprobarCampos("nombre", $n);
        comprobarCampos("pais", $p);

        $marca= new Marcas;

        //comprobamos imagen
        //1.- veo si he subido o no una imagen
        if(is_uploaded_file($_FILES['img']['tmp_name'])){
            //he subido un fichero
            if((new Imagen)->isImagen($_FILES['img']['type'])){
                //he subido la imagen
                $imagen=new Imagen;
                $imagen->setAppUrl("http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/");
                $imagen->setDirStorage(dirname(__DIR__)."/img/marcas/");
                $imagen->setNombreF($_FILES['img']['name']);
                if($imagen->guardarImagen($_FILES['img']['tmp_name'])){
                    //genero la url a ese fichero para guararla en la base de datos
                    $marca->setImg($imagen->getUrlImagen('marcas'));
                }else{
                    $error=true;
                    $_SESSION['err_img']="***No sepudo guardar la imagen!!!";
                }

            }else{
                //Lo que he subido NO es una imagen
                $error=true;
                $_SESSION['err_img']="***El fichero debe ser una imagen!!!";
            }

        }else{
            //NO he subido nada
            $imagen=new Imagen;
            $imagen->setAppUrl("http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/");
            $marca->setImg($imagen->guardarDefault('marcas'));
            
            
        }

        //fin
        if(!$error){
            //guardamos la marca
            $marca->setNombre($n)->setPais($p)->create();
            $_SESSION['mensaje']="Marca guardada.";
            header("Location:index.php"); 
        }else{
            //muestro
            header("Location:{$_SERVER['PHP_SELF']}");
        }

    }
    else{

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

    <title>Crear Marca</title>
</head>

<body style="background-color:#ff9800">
    <h4 class="text-center">Nueva Marca</h4>
    <div class="container mt-2">
        <div class="my-2 p-4 mx-auto" style="background-color:#c0ca33; width:40rem">
        
            <form name="s" action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="n" class="form-label">Nombre Marca</label>
                    <input type="text" class="form-control" id="n" placeholder="Nombre Marca" name="nombre">
                    <?php
                        if(isset($_SESSION['nombre'])){
                            echo "<p class='text-danger mt-1'>{$_SESSION['nombre']}</p>";
                            unset($_SESSION['nombre']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="p" class="form-label">País Marca</label>
                    <input type="text" class="form-control" id="p" placeholder="País" name="pais">
                    <?php
                        if(isset($_SESSION['pais'])){
                            echo "<p class='text-danger mt-1'>{$_SESSION['pais']}</p>";
                            unset($_SESSION['pais']);
                        }
                    ?>    
                </div>

                <div class="mb-3">
                    <label for="i" class="form-label">Logo Marca</label>
                    <input class="form-control" type="file" id="i" name="img">  
                    <?php
                        if(isset($_SESSION['err_img'])){
                            echo "<p class='text-danger mt-1'>{$_SESSION['err_img']}</p>";
                            unset($_SESSION['err_img']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <button type="submit" name="enviar" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-brush"></i> Limpiar</button>
                    <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Inicio</a>
                </div>
            </form>
        </div>

    </div>
</body>

</html>
<?php } ?>