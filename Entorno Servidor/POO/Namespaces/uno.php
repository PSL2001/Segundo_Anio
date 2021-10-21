<?php
    use src\Admin\Personas;
    use src\Nominas\Personas as Personas1;
    //use src\Admin;
    //use src\Nominas;


    require 'src/Admin/Personas.php';
    require 'src/Nominas/Personas.php';

    $personaAdmin=new Personas;
    //$personaAdmin=new src\Admin\Personas;
    $personaAdmin->saludo();

    $personaNomina=new Personas1;
    $personaNomina->saludo();