<?php
namespace Libreria;

use PDOException;
use Faker;
use PDO;

class Autores extends Conexion {
    private $id;
    private $nombre;
    private $apellidos;
    private $pais;

    public function __construct() {
        parent::__construct(); //Llamamos al constructor padre, que hace la conexion
    }

    //----------------CRUD---------------
    public function create() {
        $q = "insert into autores(nombre, apellidos, pais) values(:n, :a, :p)"; //:n, :a, :p sirven para parametrizar los datos (evita ataques);
        $stmt = parent::$conexion->prepare($q); //prepare()-> prepara la conexion

        try {
            $stmt->execute([ //Para parametrizar, debemos poner los valores en un array asociativo que metemos en un execute
                ':n'=>$this->nombre,
                ':a'=>$this->apellidos,
                ':p'=>$this->pais
            ]);
        } catch (PDOException $ex) { //Las excepciones son de PDO, pillamos el PDOException
            //throw $th;
            die("Error al insertar en la Base de Datos: ". $ex->getMessage());
        }
        parent::$conexion == null; //Cerramos la conexion;
    }

    public function read($id) {
        $q = "select * from autores where id=:i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al leer un autor: " .$ex->getMessage());
        }
        parent::$conexion == null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update() {
        $q = "update autores set nombre=:n, apellidos=:a, pais=:p where id=:i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':n'=>$this->nombre,
                ':a'=>$this->apellidos,
                ':p'=>$this->pais,
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar el autor ".$ex->getMessage());
        }
        parent::$conexion == null;
    }
    public function delete($id) {
        $q = "delete from autores where id=:i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar el Autor: " .$ex->getMessage());
        }
        parent::$conexion == null;

    }
    //----------------Otros Metodos-------------
    public function readAll() {
        $q = "select * from autores order by apellidos";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute(); //No hay que parametrizar nada el [] no hace falta;
        } catch (PDOException $ex) {
            die("Error al leer los datos: ". $ex->getMessage());
        }
        parent::$conexion == null; //Cerramos la conexion;
        return $stmt;
    }

    public function generarAutores($cantidad){
        if($this->hayAutores()==0){
            //si no hay autores los creo, si ya los hay NO hago nada
            $faker= Faker\Factory::create('es_ES');
            for($i=0; $i < $cantidad; $i++){
                $nombre=$faker->firstName();
                $apellidos=$faker->lastName()." ".$faker->lastName();
                $pais=$faker->country();
                (new Autores)->setNombre($nombre)
                ->setApellidos($apellidos)
                ->setPais($pais)
                ->create();
            }
        }
    }

    public function devolverID() {
        $q = "select id from autores order by id";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al leer la id de los autores: ".$ex->getMessage());
        }
        $id = []; //Creamos un array
        while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) { //Mientras haya datos en el stmt
            $id[] = $fila->id; //Pasamos los ids de filas al array
        }
        parent::$conexion = null; //Cerramos conexion
        return $id; //Devolvemos el array
    }

    public function hayAutores() {
        $q = "select * from autores";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al leer los autores ".$ex->getMessage());
        }
        parent::$conexion == null; //Cerramos la conexion
        return $stmt->rowCount(); //Devuelve las filas que hay en la tabla
    }

    public function devolverAutores() {
        $q = "select apellidos, nombre, id from autores order by apellidos";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al devolver autores: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetchAll(PDO::FETCH_OBJ); //fetchAll se puede utilizar tambien, devuelve los datos en un array
    }

    //----------------Getters y Setters-------------------

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
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
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

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
}