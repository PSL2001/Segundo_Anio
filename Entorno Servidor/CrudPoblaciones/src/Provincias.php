<?php
namespace Examen;

use PDOException;
use Faker;
use PDO;

class Provincias extends Conexion {
    private $id;
    private $nombre;
    private $descripcion;

    public function __construct() {
        parent::__construct();
    }

    //-----------------------CRUD--------------------------
    public function create() {
        $q="insert into provincias(nombre, descripcion) values(:n, :d)";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':d'=>$this->descripcion
            ]);
        }catch(PDOException $ex){
            die("Error al crear: ".$ex->getMessage());
        }
        parent::$conexion=null;
    }

    public function read($id) {
        $q="select * from provincias where id=:i";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':i'=>$id
            ]);
        }catch(PDOException $ex){
            die("Error al recuperar prov: ".$ex->getMessage());
        }
        parent::$conexion=null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function update($id) {
        $q="update provincias set nombre=:n, descripcion=:d where id=:i";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':d'=>$this->descripcion,
                ':i'=>$id
            ]);
        }catch(PDOException $ex){
            die("Error al actualizar: ".$ex->getMessage());
        }
        parent::$conexion=null;
    }
    public function delete($id) {
        $q="delete from provincias where id=:i";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':i'=>$id
            ]);
        }catch(PDOException $ex){
            die("Error al borrar prov: ".$ex->getMessage());
        }
        parent::$conexion=null;
    }

    //-----------------------------Otras funciones----------------------------
    public function crearProvincias($cant) {
        if (!$this->hayProvincias()) {
            $faker = Faker\Factory::create('es_ES');
            for ($i=0; $i < $cant; $i++) { 
                (new Provincias)->setNombre($faker->unique()->state)
                ->setDescripcion($faker->text(200))
                ->create();
            }
        }
    }

    public function hayProvincias(): bool {
        $q = "select * from provincias";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si existen provincias: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }

    public function readAll() {
        $q = "select * from provincias";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si existen provincias: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt;
    }

    public function existeNombre(String $n): bool{

        $q= (!isset($this->id)) ? "select id from provincias where nombre=:n" : "select * from provincias where nombre=:n AND id <> {$this->id}";
        //die($q);
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':n'=>$n
            ]);
        }catch(PDOException $ex){
            die("Error al ver si hay prov: ".$ex->getMessage());
        }
        parent::$conexion=null;
        return ($stmt->rowCount()!=0);
    }

    public function provinciasId() {
        $q = "select id from provincias";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al devolver las provincias: ".$ex->getMessage());
        }
        parent::$conexion = null;
        $ids = [];
        while ($fila = $stmt->fetch(PDO::FETCH_OBJ)) {
            $ids[] = $fila->id;
        }
        return $ids;
    }

    //------------------------------------------------------------------------

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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