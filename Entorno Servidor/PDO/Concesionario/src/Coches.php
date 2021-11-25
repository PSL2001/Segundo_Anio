<?php
namespace Concesionario;

use Faker;
use PDO;
use PDOException;

class Coches extends Conexion {
    private $id;
    private $modelo;
    private $kilometros;
    private $tipo;
    private $color;
    private $img;
    private $marca_id;

    public function __construct() {
        parent::__construct();
    }

    //------------------------CRUD-----------------------
    public function create() {
        $q="insert into coches(modelo, kilometros, tipo, color, img, marca_id) values(:m, :k, :t, :c, :i, :mi)";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':m'=>$this->modelo,
                ':k'=>$this->kilometros,
                ':t'=>$this->tipo,
                ':c'=>$this->color,
                ':i'=>$this->img,
                ':mi'=>$this->marca_id,

            ]);
        }catch(PDOException $ex){
            die("Error al crear coche: ".$ex->getMessage());
        }
        parent::$conexion=null;
    }

    public function read(){
        $q="select * from coches order by marca_id, modelo";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al devolver hay coches: ".$ex->getMessage());
        }
        parent::$conexion=null;
        return $stmt;
    }

    public function update() {

    }

    public function delete() {
        $q = "delete from coches where id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el coche: ".$ex->getMessage());
        }
        parent::$conexion = null;
    }
    //-----------------------Otros Metodos---------------
    public function crearCoches($cant) {
        if (!$this->hayCoches()) {
            $URL_APP="http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/";
            $faker = Faker\Factory::create('es_ES');
            $id = (new Marcas)->devolverId();

            for ($i=0; $i < $cant; $i++) { 
                (new Coches)->setModelo($faker->words(4, true))
                ->setKilometros($faker->numberBetween(0, 600))
                ->setTipo($faker->randomElement(['Electrico', 'Hibrido', 'Gasolina', 'Gasoil', 'GLP', 'Gas']))
                ->setColor($faker->hexColor())
                ->setImg($URL_APP."img/coches/default.png")
                ->setMarca_id($id[random_int(0, count($id)-1)])
                ->create();
            }
        }
    }

    public function hayCoches() {
        $q = "select * from coches";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si existen coches: ".$ex->getMessage());
        }
        parent::$conexion = null;

        return ($stmt->rowCount() != 0);
    }

    public function detallesCoche($id) {
        $q = "Select * from coches, marcas where marcas.id = coches.marca_id AND coches.id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al mostrar los detalles del coche: ".$ex->getMessage());
        }
        parent::$conexion = null;

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function mostrarCoche($id) {
        $q = "select * from coche where id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al mostrar el coche: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function filtro($c, $t) {
        $q = "select * from coches where $c=:valor order by modelo";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':valor'=>$t
            ]);
        } catch (PDOException $ex) {
            die("Error al filtrar los detalles del coche: ".$ex->getMessage());
        }
        parent::$conexion = null;

        return $stmt;
    }
    //---------------------------------------------------
    /**
     * Set the value of marca_id
     *
     * @return  self
     */ 
    public function setMarca_id($marca_id)
    {
        $this->marca_id = $marca_id;

        return $this;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Set the value of kilometros
     *
     * @return  self
     */ 
    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;

        return $this;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}