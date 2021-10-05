<?php
$meses = [
    'Enero' => 9,
    'Febrero' => 12,
    'Marzo' => 0,
    'Abril' => 17
];


foreach ($meses as $k => $v) {
     if ($v > 0) {
        echo "En ".$k." he visto ".$v." peliculas <br>". PHP_EOL;
     } else {
         echo " No he visto ninguna pelicula en ". $k ."<br>". PHP_EOL;
     }
}