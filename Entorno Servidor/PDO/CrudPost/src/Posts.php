<?php
namespace Posts;
use Faker;
use PDOException;
use PDO;
class Posts extends Conexion{
    private $id;
    private $titulo;
    private $body;
    private $created_at;
    private $updated_at;
    private $user_id;

    public function __construct(){
        parent::__construct();
    }

    //------------------------ CRUD ------------------------
    public function create(){
        $q="insert into posts(titulo, body, user_id) values(:t, :b, :ui)";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':t'=>$this->titulo,
                ':b'=>$this->body,
                ':ui'=>$this->user_id
            ]);
        }catch(PDOException $ex){
            die("Error al crear post: ".$ex->getMessage());
        }
        parent::$conexion=null;

    }
    public function read($un){
        $q="select posts.* from posts, users where users.id=user_id AND username=:u order by updated_at desc, titulo asc";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':u'=>$un
            ]);
        }catch(PDOException $ex){
            die("Error al leer post:".$ex->getMessage());
        }
        parent::$conexion=null;
        return $stmt;
    }
    public function update(){
        $q = "update posts set titulo=:t, body=:b where id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':t'=>$this->titulo,
                ':b'=>$this->body,
                ':i'=>$this->id
            ]);
        } catch (PDOException $ex) {
            die("Error al actualizar el post. ".$ex->getMessage());
        }
        parent::$conexion = null;
    }
    public function delete($id){
        $q = "delete from posts where id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar post: ".$ex->getMessage());
        }
    }
    //------------------------ OTROS METODOS ------------------------
    public function generarPosts($cantidad){
        if(!$this->hayPosts()){
            $faker= Faker\Factory::create('es_ES');
            $usuarios=(new Users)->getIds();

            for($i=0; $i<$cantidad; $i++){
                (new Posts)->setTitulo(ucfirst($faker->words(4, true)))
                ->setBody($faker->text(200))
                ->setUser_id($usuarios[random_int(0, count($usuarios)-1)])
                ->create();
            }
        }
    }

    public function hayPosts(){
        $q="select * from posts";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al comprobar si hay posts:".$ex->getMessage());
        }
        parent::$conexion=null;
        return ($stmt->rowCount()!=0);
    }
    public function devolverPost($id) {
        $q = "select * from posts where id = :i";
        $stmt = parent::$conexion->prepare($q);

        try {
            $stmt->execute([
                ':i'=>$id
            ]);
        } catch (PDOException $ex) {
            die("Error al devolver el Post: ".$ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
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
     * Set the value of body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}