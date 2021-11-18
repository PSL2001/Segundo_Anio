<?php
namespace Concesionario;
use PDO;
use PDOException;

class Conexion {
    protected static $conexion;

    public function __construct() {
        if (self::$conexion == null) {
            # Si la variable es nula es que no hay conexion
            self::crearConexion();
        }
    }

    public static function crearConexion() {
        // 1. Leemos configuracion de .config
        $fichero = dirname(__DIR__, 1)."/.conf"; 
        /*__DIR__ devuelve el directorio actual, 
        dirname devuelve el nombre del directorio actual, 
        el 1 es para que salte 1 nivel */
        $opciones = parse_ini_file($fichero); // parse_ini_file parsea el archivo de configuracion
        $dbname = $opciones['bbdd'];
        $host = $opciones['host'];
        $username = $opciones['user'];
        $pass = $opciones['password'];

        //2. Una vez tenemos los datos parseados, creamos el dns (Descriptor de nombre de servicio)
        $dns = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; //Primero : y despues de eso ; 
        //NOTA: MIRA BIEN CEGATO
        //3. Creamos la conexion
        try {
            //Intentamos crear la conexion con PDO
            self::$conexion = new PDO($dns, $username, $pass);
            //Esta linea se pone solo en desarrollo, muestra los errores
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            //Lanzamos excepcion si falla $ex;
            die("Error en la conexion a la base de Datos: ". $ex->getMessage());
        }
    }
}

//Para probar si la conexion funciona
//echo "Probando Conexion <br>";
//$conexion = new Conexion();
