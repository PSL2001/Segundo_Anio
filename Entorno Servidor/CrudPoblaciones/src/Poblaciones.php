<?php

namespace Examen;

use PDO;
use PDOException;
use Faker;

class Poblaciones extends Conexion
{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $poblacion;
    private $provincia_id;

    public function __construct()
    {
        parent::__construct();
    }
    //---------------------------------CRUD-------------------------------------
    public function create()
    {
        $q = "insert into poblaciones(nombre, descripcion, imagen, poblacion, provincia_id) values(:n, :d, :i, :p, :pi)";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':d' => $this->descripcion,
                ':i' => $this->imagen,
                ':p' => $this->poblacion,
                ':pi' => $this->provincia_id
            ]);
        } catch (PDOException $ex) {
            die("Error al crear: " . $ex->getMessage());
        }
        parent::$conexion = null;
    }

    public function read()
    {
        $q = (!isset($this->provincia_id))
            ? "select poblaciones.*, provincias.nombre as pnombre from poblaciones, provincias where provincias.id=provincia_id order by pnombre, nombre"
            : "select poblaciones.*, provincias.nombre as pnombre from poblaciones, provincias  where provincia_id={$this->provincia_id} AND provincias.id=provincia_id order by pnombre, nombre";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar poblaciones:  " . $ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt;
    }

    public function read1($id)
    {
        $q = "select poblaciones.*, provincias.nombre as pnombre from poblaciones, provincias  where poblaciones.id=:id AND provincias.id=provincia_id";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $ex) {
            die("Error al recuperar poblaciones:  " . $ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id)
    {
        $q = "delete from poblaciones where id=:id";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':id' => $id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar poblaciones:  " . $ex->getMessage());
        }
        parent::$conexion = null;
    }
    public function update($id)
    {
        $q = "update poblaciones set nombre=:n, descripcion=:d, imagen=:i, poblacion=:p, provincia_id=:pi where id = :id";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':d' => $this->descripcion,
                ':i' => $this->imagen,
                ':p' => $this->poblacion,
                ':pi' => $this->provincia_id,
                ':id' => $id
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar: " . $ex->getMessage());
        }
        parent::$conexion = null;
    }


    //----------------------------------Otros metodos---------------------------
    public function hayPoblaciones()
    {
        $q = "select id from poblaciones";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al ver si hay poblacion:  " . $ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }

    public function crearPoblaciones($cant)
    {
        if (!$this->hayPoblaciones()) {
            $ids = (new Provincias)->provinciasId();
            $faker = Faker\Factory::create('es_ES');
            for ($i = 0; $i < $cant; $i++) {
                (new Poblaciones)->setNombre($faker->unique()->city)
                    ->setDescripcion($faker->text(100))
                    ->setImagen('/img/poblaciones/default.jpg')
                    ->setPoblacion($faker->numberBetween(1500, 2450000000))
                    ->setProvincia_Id($faker->randomElement($ids))
                    ->create();
            }
        }
    }

    //--------------------------------------------------------------------------
    /**
     * Set the value of provincia_id
     *
     * @return  self
     */
    public function setProvincia_id($provincia_id)
    {
        $this->provincia_id = $provincia_id;

        return $this;
    }

    /**
     * Set the value of poblacion
     *
     * @return  self
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

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
