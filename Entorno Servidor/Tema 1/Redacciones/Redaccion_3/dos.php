<?php
 $alumnos = [
     'Alberto',
     'Oscar',
     'Jose David',
     'Antonio',
     'Juan Pedro'
 ];

 echo "Los tres primeros:  <br>";

 $alumnos_slice = $alumnos;

 $alumnos_slice = array_slice($alumnos, 0, 3);

 print_r($alumnos_slice);

 $alumnos_splice = $alumnos;
 array_splice($alumnos_splice, 3, 2);
 echo "<hr>";

 print_r($alumnos_splice);

 echo "<br> Los 2 ultimos: <br>";
 $alumnos_slice_fin = $alumnos;

 $alumnos_slice_fin = array_slice($alumnos, 3);

 print_r($alumnos_slice_fin);

 echo "<hr>";

 $alumnos_splice_fin = $alumnos;

 array_splice($alumnos_splice_fin,0,3);

 print_r($alumnos_splice_fin);

