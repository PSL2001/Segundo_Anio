<?php
//Vamos a utilizar la clase Personas, la llamamos (Nota: Src es el nombre dado en composer.json, en el apartado autoload)
use Src\Personas;
//Llamamos el autoload de composer, para que carge la clases del proyecto
require "../vendor/autoload.php";

$datosPersona = new Personas(); //Creamos un objeto Personas, vacio
$misDatos = $datosPersona->cargarDatos(160); //Llamamos a la funcion cargarDatos, que nos generará tantos valores como deseemos




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Datatables CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.css" />
    <title>Personas</title>
</head>

<body style="background-color: silver;">
    <h3 class="text-center mt-2">Datos Personas</h3>
    <div class="container mt-2">
        <table class="table table-success table-striped" id="tablaDatos">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Pais</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($misDatos as $persona) {
                    # Recorremos el array que nos han devuelto, como nuestros datos son privados, llamamos a los getters
                    //Nota: la variable imagen nos trae una url placeholder de una imagen, introduce el getImagen en una etiqueta imagen
                    echo <<< TEXTO
                    <tr>
                        <td>{$persona->getNombre()}</td>
                        <td>{$persona->getApellidos()}</td>
                        <td>{$persona->getEmail()}</td>
                        <td><img src="{$persona->getImagen()}" width='65rem' height='65rem'</td>
                        <td>{$persona->getLocalidad()}</td>
                        <td>{$persona->getPais()}</td>
                    </tr>
                    TEXTO;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Script de JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- script the datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/datatables.min.js"></script>
    <script>
        //Script separado para cargar dataTables
        $(document).ready(function() {
            $('#tablaDatos').DataTable();
        });
    </script>
</body>


</html>