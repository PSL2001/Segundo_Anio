<?php
use src\Controllers\{Autorcontroler, LibroControler};
use src\Models\{Autor, Libro};
require 'src/Controlers/Autorcontroler.php';
require 'src/Controlers/LibroControler.php';
require 'src/models/Autor.php';
require 'src/models/Libro.php';


//Funcion anonima
spl_autoload_register(function($clase) {
    require str_replace("\\", "/", $clase. ".php");
})

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:cadetblue">
    <?php
        $ac1=new Autorcontroler;
        $lc=new LibroControler;
        $ml=new Libro;
        $ma= new Autor;
        $ac1->saludoAutor();
        echo "<br>";
        $lc->saludoLibro();
        $ml->saludoLibro();
        $ma->saludoAutor();
    ?>
</body>
</html>