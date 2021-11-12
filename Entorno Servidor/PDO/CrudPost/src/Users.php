<?php
namespace Posts;

use PDO;
use PDOException;

class Users extends Conexion {
    private $id;
    private $username;
    private $email;
    private $password;
    private $img;

    public function __construct()
    {
        parent::__construct();
    }

    //------------------------CRUD-------------------------------
    public function create() {
        $q = "insert into users(username, email, password, img) values(:u, :e, :p, :i)";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$this->username,
                ':e'=>$this->email,
                ':p'=>$this->password,
                ':i'=>$this->img
            ]);
        } catch (PDOException $ex) {
            die("Error al insertar el usuario: ".$ex->getMessage());
        }
        parent::$conexion = null;
    }

    public function read() {
        $q="select * from users where username=:u";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':u'=>$this->username
            ]);
        }catch(PDOException $ex){
            die("Error al devolver usuario:".$ex->getMessage());
        }
        parent::$conexion=null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function update() {

    }

    public function delete() {

    }

    //------------------------Otros Metodos----------------------
    public function existeCampo($c, $v) {
        $q = "select * from users where $c = :v";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':v'=>$v
            ]);
        } catch (PDOException $ex) {
            die("Error al comprobar el campo: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }
    public function recuperarImagen($username) {
        $q = "select img from users where username = :u";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$username
            ]);
        } catch (PDOException $ex) {
            die("Error al recuperar imagen: ".$ex->getMessage());
        }

        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ)->img;
    }

    public function comprobarUsuario($u, $p) {
        $q = "select * from users where username = :u AND password = :p";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$u,
                ':p'=>$p
            ]);
        } catch (PDOException $ex) {
            die("Error al comprobar el usuario: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }

    public function getIds() {
        $q="select id from users";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al devolver ids: ".$ex->getMessage());
        }
        parent::$conexion=null;
        $ids=[];
        while($fila=$stmt->fetch(PDO::FETCH_OBJ)){
            $ids[]=$fila->id;
        }
        return $ids;
    }
    public function devolverID($username) {
        $q = "select id from users where username = :u";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$username
            ]);
        } catch (PDOException $ex) {
            die("Error al leer al devolver la id");
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ)->id;
    }
    //-----------------------------------------------------------
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
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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
}