<?php
namespace Examen;

use PDO;
use PDOException;

class Conexion {
    protected static $conexion;

    public function __construct() {
        if (self::$conexion == null) {
            self::crearConexion();
        }
    }

    public static function crearConexion() {
        $fichero = dirname(__DIR__, 1)."/.conf";
        $opciones = parse_ini_file($fichero);
        $base=$opciones['bbdd'];
        $usuario=$opciones['usuario'];
        $pass=$opciones['pass'];
        $host=$opciones['host'];
        //creamos el dns descriptor de nombre de servicio
        $dns="mysql:host=$host;dbname=$base;charset=utf8mb4";
        //creamos la conexion
        try{
            $options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            self::$conexion=new PDO($dns, $usuario, $pass, $options);
        }catch(PDOException $ex){
            die("Error al conectar con la BBDD, mensaje=".$ex->getMessage());
        }
    }
}