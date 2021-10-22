<?php
namespace Src;
use Faker;
// require "../vendor/autoload.php";

class Personas {
    //Creamos las variables, en este ejemplo, todas las variables son privadas
    private $nombre;
    private $apellidos;
    private $email;
    private $imagen;
    private $localidad;
    private $pais;

    public function __construct() {
        if (func_num_args() == 0) return; //Si en el caso de llamar la funcion, no le llegan argumentos, nos salimos del constructor
        // echo var_dump(func_get_args());
        // echo "<hr>";
        //En caso contrario, rellenamos cada argumento con su dato correspondiente
        $this->nombre=func_get_arg(0);
        $this->apellidos=func_get_arg(1);
        $this->email=func_get_arg(2);
        $this->imagen=func_get_arg(3);
        $this->localidad=func_get_arg(4);
        $this->pais=func_get_arg(5);
    }
    /*
    E: Entero S: La cantidad de objetos Personas dada por el entero, en un array
    */
    public function cargarDatos($cantidad) {
        # Crea Objetos de la clase persona dependiendo de cantidad, Usa Faker
        $personas = [];
        //Generamos los nombres en Español
        $faker = Faker\Factory::create('es_ES');
        for ($i=0; $i < $cantidad; $i++) { 
            # Las personas se crean aqui
            $nombre = $faker->firstName();
            $ape1 = $faker->lastName();
            $ape2 = $faker->lastName();
            $apellidos = $ape1." ".$ape2;
            $email = $faker->unique()->email();
            $texto = substr($nombre, 0, 1).substr($ape1, 0, 1).substr($ape2, 0, 1);
            $imagen = $faker->imageUrl(640,480,$word = $texto, $randomize=false);
            // echo $imagen. "<br>";
            $localidad = $faker->city();
            $pais = $faker->country();

            $persona = new Personas($nombre, $apellidos, $email, $imagen, $localidad, $pais);

            $personas[] = $persona;
        }
        return $personas;
    }

    //Getters de los valores

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }
}