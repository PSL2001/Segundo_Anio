<?php
    class Persona1 {
        // Si tu variable es protected o private hay que crear su getter y setter correspondiente
        private $username;
        private static $contador1;
        public static $contador;
        public $nombre;
        protected $puesto;
        private $dni;

        //Constructor
        public function __construct() {
            //Asi se inicializan las variables en PHP. No se puede tener mas de 1 constructor activo
            $num = func_num_args(); // esta funcion nos devuelve cuantos argumentos se han pasado a la funcion
            //Sabiendo esto, podemos cambiar el constructor dependiendo de los argumentos que se pasan
            self::$contador++;
            switch ($num) {
                case 3:
                    $this->nombre = func_get_arg(0);
                    $this->puesto = func_get_arg(1);
                    $this->dni = func_get_arg(2);
                    break;
                case 1: //Suponemos que solo llega el DNI
                    $this->dni = func_get_arg(0);
                    break;
            }
        }

        /**
         * Get the value of dni
         */ 
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni = $dni;
                //return $this sirve para la programacion fluida
                return $this;
        }

        public function __toString() {
            //Metodo toString. Cuando llamemos a la variable, PHP buscara por el metodo toString
            return "Nombre: ". $this->nombre. " Puesto: ". $this->puesto." DNI: {$this->dni}";
        }

        /**
         * Get the value of puesto
         */ 
        public function getPuesto()
        {
                return $this->puesto;
        }

        /**
         * Set the value of puesto
         *
         * @return  self
         */ 
        public function setPuesto($puesto)
        {
                $this->puesto = $puesto;

                return $this;
        }

        /**
         * Get the value of contador1
         * Si una funcion utiliza una variable estatica, la funcion debe de ser estatica tambien, adenas de utilizar self::
         */ 
        public static function getContador1()
        {
                return self::$contador1;
        }

        /**
         * Set the value of contador1
         *
         * @return  self
         */ 
        public static function setContador1($contador1)
        {
                self::$contador1 = $contador1;
        }

        //Metodos getter y setter (metodo magico)
        public function __get($attribute) { //Esto manda "advertencias" mientras evita lanzar un fatal error
         echo "Intento de lectura no autorizado de un atributo $attribute <br>";
        }

        public function __set($attributo, $valor) { //Estas funciones pueden ir vacias, y darle el funcionamiento que deseas
         echo "Intento de escritura no autorizado en $attributo con el valor de $valor <br>"; 
        }
    }