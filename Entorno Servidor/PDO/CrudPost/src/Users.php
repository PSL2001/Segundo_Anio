<?php
namespace Posts;

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