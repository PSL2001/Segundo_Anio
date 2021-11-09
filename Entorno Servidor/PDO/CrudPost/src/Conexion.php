<?php
namespace Posts;

use PDO;
use PDOException;

class Conexion {
    protected static $conexion;

    public function __construct()
    {
        if (self::$conexion == null) {
            self::crearConexion();
        }
    }

    private static function crearConexion() {
        // Leemos el archivo de configuracion
        $fichero = dirname(__DIR__, 1)."/.conf";
        $opciones = parse_ini_file($fichero);
        //Guardamos los datos
        $host = $opciones['host'];
        $bbdd = $opciones['bbdd'];
        $usuario = $opciones['user'];
        $password = $opciones['password'];
        //Creamos el dns
        $dns = "mysql:host=$host;dbname=$bbdd;charset=utf8mb4";
        //Iniciamos la conexion
        try {
            self::$conexion = new PDO($dns, $usuario, $password);
            //Esto solo si estamos en desarrollo
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Error al conectar con la base de datos. ".$ex->getMessage());
        }

    }
}