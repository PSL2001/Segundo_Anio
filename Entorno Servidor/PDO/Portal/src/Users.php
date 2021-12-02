<?php
namespace Portal;

use Faker;
use PDO;
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
            //Me creo un usuario admin y otro normal, manualmente
            (new Users)->setUsername("admin")->setEmail("admin@gmail.org")->
            setPassword(hash("sha256", "secret0"))
            ->setImg("/images/users/admin.png")
            ->setPerfil(1)
            ->create();
            (new Users)->setUsername("usuario")->setEmail("usuario@gmail.org")->
            setPassword(hash("sha256", "usuario"))
            ->setImg("/images/users/users.png")
            ->setPerfil(0)
            ->create();
            //El resto lo generamos con faker
            $faker = Faker\Factory::create('es_ES');
            for ($i=0; $i < $cant; $i++) { 
                (new Users)->setUsername($faker->unique()->username)
                ->setEmail($faker->unique()->freeEmail)
                ->setPassword($faker->sha256())
                ->setImg("/img/users/users.png")
                ->setPerfil($faker->numberBetween(0,1))
                ->create();
            }
        }
    }

    public function hayUsuarios(): bool {
        $q = "select * from users";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al comprobar si hay usuarios: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return ($stmt->rowCount() != 0);
    }

    public function getImagen() {
        $q = "select img from users where username = :u";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$this->username
            ]);
        } catch (PDOException $ex) {
            die("Error al devolver la imagen: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ)->img;
    }

    public function comprobarUsuario($u, $p): bool{
        $q="select * from users where username=:u AND password=:p";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':u'=>$u,
                ':p'=>$p
            ]);
        }catch(PDOException $ex){
            die("Error al verificar usuario: ".$ex->getMessage());
        }
        parent::$conexion=null;
        return ($stmt->rowCount()!=0);
    }

    public function getPerfil() {
        $q = "select perfil from users where username = :u";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':u'=>$this->username
            ]);
        }catch (PDOException $ex) {
            die("Error al devolver el perfil del usuario: ".$ex->getMessage());
        }
        parent::$conexion = null;

        return $stmt;
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