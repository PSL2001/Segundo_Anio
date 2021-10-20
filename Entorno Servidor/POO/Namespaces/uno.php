<?php
use src\Admin\Personas;
use src\Nominas\Personas as Personas1;
require("./src/Admin/Personas.php");
require("./src/Nominas/Personas.php");

$personaAdmin = new Personas();
$personaNomina = new Personas1();

$personaAdmin->saludo();
echo "<br>";
$personaNomina->saludo();