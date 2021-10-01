<?php
function esPar(int $num): bool
{
    if ($num % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function PintarTablaMult()
{
    $contador = 1;
    echo "<table border='2' cellpadding='1'>";
    do {
        if (esPar($contador)) {
            echo "<tr>\n";
            echo "<td style='background-color: green;'>3</td>\n";
            echo "<td style='background-color: green;'>x</td>\n";
            echo "<td style='background-color: green;'>$contador</td>\n";
            echo "<td style='background-color: green;'>=</td>\n";
            echo "<td style='background-color: green;'>" . 3 * $contador . "</td>\n";
            echo "</tr>\n";
        } else {
            echo "<tr>\n";
            echo "<td>3</td>\n";
            echo "<td>x</td>\n";
            echo "<td>$contador</td>\n";
            echo "<td>=</td>\n";
            echo "<td>" . 3 * $contador . "</td>\n";
            echo "</tr>\n";
        }
        $contador++;
    } while ($contador <= 10);
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    PintarTablaMult();
    ?>
</body>

</html>