<?php
    class Persona {
        // Si tu variable es protected o private hay que crear su getter y setter correspondiente
        public $nombre;
        protected $puesto;
        private $dni;

        //Constructor
        public function __construct($n, $p, $d) {
            //Asi se inicializan las variables en PHP. No se puede tener mas de 1 constructor activo
            
            $this->nombre = $n;
            $this->puesto = $p;
            $this->dni = $d;
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
    }