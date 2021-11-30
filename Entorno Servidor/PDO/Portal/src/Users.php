<?php
namespace Portal;

use PDOException;

class Users extends Conexion {
    private $id;
    private $username;
    private $email;
    private $password;
    private $img;
    private $perfil;


    public function __construct() {
        parent::__construct();
    }

    //--------------------------CRUD------------------------------
    public function create() {
        $q = "insert into users(username, email, password, img, perfil) values(:u, :e, :p, :i, :pe)";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$this->username,
                ':e'=>$this->email,
                ':p'=>$this->password,
                ':i'=>$this->img,
                ':pe'=>$this->perfil
            ]);
        } catch (PDOException $ex) {
            die("Error al crear el usuario: ".$ex->getMessage());
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
    //-------------------------Otros Metodos----------------------
    public function crearUsuarios($cant) {
        if (!$this->hayUsuarios()) {
            for ($i=0; $i < $cant; $i++) { 
                # code...
            }
        }
    }

    public function hayUsuarios() {

    }

    //-------------------------Setters----------------------------

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

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }
}