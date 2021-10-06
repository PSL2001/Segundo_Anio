<?php
//var_dump($_REQUEST);

/*
if (isset($_POST['prov'])) {
    echo "Provincias elegidas en el checkbox: <br>";
   # code...$_POST['prov1'])) {
    echo "Provincias elegidas en el select: <br>";
    echo "<ul>";
    foreach ($_POST['prov1'] as $v) {
        echo "<li> $v </li>";
    }
    echo "</ul>";
} else {
    echo "No has marcado nada en el select <br>";
}
*/
if (isset($_POST['rb'])) {
    echo "Has elegido la opcion: ". $_POST['rb'];
} else {
    echo "No has elegido ninguna opcion en el radio button <br>";
}

