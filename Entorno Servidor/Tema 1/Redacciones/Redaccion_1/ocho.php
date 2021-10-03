<?php
 function pintarTablaRandom($fila, $columna) {
    echo "<table width='400px' height='400px' border='0' cellspacing='2' cellpadding='2'>";
    for ($i=1; $i <= $fila; $i++) { 
        echo "<tr align='center'>".PHP_EOL;
        
        for ($j=1; $j <= $columna ; $j++) {
            $r = mt_rand( 0, 255 );
        $g = mt_rand( 0, 255 );
        $b = mt_rand( 0, 255 );
        $a = '0.2';

        $bgcolor = 'rgba('.$r.','.$g.','.$b.','.$a.')';
            echo "<td bgcolor=".$bgcolor.">". $i .",". $j .PHP_EOL;
            echo "</td>".PHP_EOL;
        }
        echo "</tr>".PHP_EOL;
     }
    echo "</table>";
}

pintarTablaRandom(10,10);