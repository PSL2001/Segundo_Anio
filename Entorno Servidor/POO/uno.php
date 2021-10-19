<?php
require("./src/Persona.php");
require("./src/Persona1.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1</title>
</head>
<body>
    <?php
        $juan = new Persona("Juan Sanchez", "Gerente", "1234567N");
        echo "<br> Datos de /\$juan: ". $juan;
        $juan->nombre = "Juan Sanchez Diaz";
        echo "<br> Datos de /\$juan: ". $juan;
        //$juan->puesto = "Director";
        //echo "<br> Datos de /\$juan: ". $juan;
        $juan->setDni("6767674A");
        $juan->setPuesto("Administrativo");
        echo "<br> Datos de /\$juan: ". $juan;
        $juan->setPuesto("Becario")->setDni("6666666B");
        echo "<br> Datos de /\$juan: ". $juan;
        //-------------------------------------------------
        echo "<hr>";
        $n1 = new Persona1();
        $n2 = new Persona1("Manolo Jimenez", "Becario", "23434943A");
        $n3 = new Persona1("5469483A");
        echo $n1 . "<br>" . $n2. "<br>". $n3;
        //---------------------------------------------------
        echo "<hr>";
        echo "Hemos instanciado ". Persona1::$contador . " objetos de la clase Persona1"; //Para acceder a una clase estatica siempre con (nom_clase)::(variable_estatica);
        echo "<br>";
        echo "Hemos instanciado ". $n1::$contador . " objetos de la clase Persona1";
        $n1::$contador = 100; //Tambien se puede modificar
        echo "<br>";
        echo "Hemos instanciado ". $n1::$contador . " objetos de la clase Persona1";
        $n1::setContador1(1000); //Tanto esto como lo de abajo haran lo mismo
        Persona1::setContador1(1000);  //Se suele utilizar mas esta
        echo "<br>";
        echo "Contador1: " . Persona1::getContador1(); //Todos estos textos, muestran lo mismo pero se utiliza mas esta
        echo "<br>";
        echo "Contador1: " . $n1::getContador1();
        echo "<br>";
        echo "Contador1: " . $n2::getContador1();
        echo "<br>";
        echo "Contador1: " . $n3::getContador1();

        //-----------------------Funciones interesantes----------------------------------
        echo "<hr>";
        echo "La clase del objeto \$n1 es: ". get_class($n1);
        echo "<br>";
        echo "La clase del objeto \$juan es: ". get_class($juan);
        echo "<br>";
        if (class_exists("Vehiculo")) { //Comprueba si la clase existe
            $coch = new Vehiculo();
        } else {
            echo "La clase vehiculo no existe";
        }
        echo "<br>";
        echo var_dump(get_class_methods("Persona1")); //Muestra los metodos de la clase que elijas
        if (method_exists("Persona1", "PonerNombre")) { //comprueba si el metodo existe en esa clase
            $n1 = PonerNombre("Manolo");
        } else {
            echo "<br> No existe el metodo PonerNombre en Persona1";
        }
        //-------------------------------------------------------
        echo "<hr>";
        $persona_1 = new Persona("Ana Perez","Jefa","68382953H");
        echo "<br>".$persona_1;
        $persona_2 = $persona_1;
        echo "<br>".$persona_2;
        $persona_2->nombre = "Ana Perez Gil";
        echo "<br>".$persona_1;
        echo "<br>".$persona_2;
        $persona_3 = clone($persona_1); //Para clonar un clase de tipo objeto debemos utilizar clone para no sobreescribir el valor
        $persona_3->nombre = "Pedro Salemelon";
        echo "<br>".$persona_1;
        echo "<br>".$persona_3;
    ?>
</body>
</html>