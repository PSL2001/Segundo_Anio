<?php
namespace Concesionario;

use PDOException;
use Faker;

class Marcas extends Conexion {
    private $id;
    private $nombre;
    private $img;
    private $pais;

    public function __construct() {
        parent::__construct();
    }

    //-------------------CRUD----------------
    public function create() {
        $q = "insert into marcas(nombre, img, pais) values(:n, :i, :p)";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':n'=>$this->nombre,
                ':i'=>$this->img,
                ':p'=>$this->pais
            ]);
        } catch (PDOException $ex) {
            die("Error al crear la marca: ".$ex->getMessage());
        }
        parent::$conexion = null;
    }

    public function read() {

    }

    public function update() {

    }

    public function delete() {

    }

    //------------------Otros Metodos--------------------
    public function crearMarcas($cant) {
        $APP_URL = "http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/img/marcas/default.png";
        if (!$this->hayMarcas()) {
            $faker = Faker\Factory::create('es_ES');
            for ($i=0; $i < $cant; $i++) { 
                $nombre = $faker->word();
                $pais = $faker->country();
                $img = $APP_URL;
                (new Marcas)->setNombre($nombre)
                ->setPais($pais)
                ->setImg($img)
                ->create();

            }
        }
    }

    public function readAll() {
        $q = "select * from marcas";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al leer todas las marcas");
        }
        parent::$conexion = null;
        return $stmt;
    }

    public function hayMarcas() {
        $q = "select * from marcas";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si hay marcas: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }
    //---------------------------------------------
    /**
     * Set the value of pais
     *
     * @return  self
     */ 
    public function setPais($pais)
    {
        $this->pais = $pais;

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
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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