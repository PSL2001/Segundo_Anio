<?php
namespace Libreria;

use PDOException;
use Faker;

class Libros extends Conexion {
    private $id;
    private $titulo;
    private $sipnosis;
    private $isbn;
    private $autor_id;

    public function __construct() {
        parent::__construct();
    }

    //-----------------CRUD-----------------------------
    public function create() {
        $q = "insert into libros (titulo, sipnosis, isbn, autor_id) values (:t, :s, :isbn, :a)";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':t'=>$this->titulo,
                ':s'=>$this->sipnosis,
                ':isbn'=>$this->isbn,
                ':a'=>$this->autor_id
            ]);
            
        } catch (PDOException $ex) {
            die("Error al insertar libros: ".$ex->getMessage());
        }
        parent::$conexion = null;
    }
    public function read() {
        # code...
    }

    public function update() {
        # code...
    }

    public function delete() {
        # code...
    }
    //---------------Otros Metodos----------------------
    public function generarLibros($cantidad) {
        if (!$this->hayLibros()) { //Nota: llamamos a las funciones de la clase con un $this->
            //Nota: no olvidar el "!"
            $faker = Faker\Factory::create('es_ES');
            $autores = (new Autores)->devolverID(); //Devuelve los Id's de la clase autores
            for ($i=0; $i < $cantidad; $i++) { 
                $titulo = $faker->sentence(4);
                $sipnosis = $faker->text(200);
                $isbn = $faker->unique()->isbn13();
                $autor_id =$autores[array_rand($autores, 1)];

                (new Libros)->setTitulo($titulo)
                ->setSipnosis($sipnosis)
                ->setIsbn($isbn)
                ->setId_autor($autor_id)
                ->create();
            }
        }
    }
    public function hayLibros() {
        $q = "select * from libros";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si existen libros: ".$ex->getMessage());
        }
        $totalLibros = $stmt->rowCount(); //devuelve la cantidad de filas de la consulta
        parent::$conexion = null; //Cierra la conexion
        return ($totalLibros > 0);
    }

    public function ReadAll() {
        $q = "select * from libros order by titulo, autor_id";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al devolver los libros: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt;
    }
    //--------------Getters y Setters--------------------

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
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of sipnosis
     */ 
    public function getSipnosis()
    {
        return $this->sipnosis;
    }

    /**
     * Set the value of sipnosis
     *
     * @return  self
     */ 
    public function setSipnosis($sipnosis)
    {
        $this->sipnosis = $sipnosis;

        return $this;
    }

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of autor_id
     */ 
    public function getId_autor()
    {
        return $this->autor_id;
    }

    /**
     * Set the value of autor_id
     *
     * @return  self
     */ 
    public function setId_autor($autor_id)
    {
        $this->autor_id = $autor_id;

        return $this;
    }
}