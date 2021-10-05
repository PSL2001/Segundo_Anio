<?php
$nombres = ["Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso","Teresa"];

echo "Hay ".count($nombres). " elementos en el array, siendo los valores: <br>";

echo "<ul>";
foreach ($nombres as $key => $value) {
    echo "<li>$value</li>";
}
echo "</ul>";