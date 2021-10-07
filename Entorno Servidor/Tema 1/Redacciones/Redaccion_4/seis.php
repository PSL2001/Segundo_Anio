<?php
function EscribeNegrita(string $texto) {
    echo "<b>$texto</b> <br>";
}

echo "Esto es un texto sin negrita <br>";

EscribeNegrita("Esto es un texto que esta escrito en negrita");