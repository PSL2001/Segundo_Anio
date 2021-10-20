<?php
class Ordenador extends Producto implements Interfaz1 {
    public $cpu;
    public $sistema;

    public function __construct($c, $n, $p, $c0, $s) {
        parent::__construct($c,$n,$p);
        $this->cpu = $c0;
        $this->sistema = $s;
    }

    public function __toString() {
        return parent::__toString()." CPU: {$this->cpu}, Sistema: {$this->sistema}"; 
    }


    public function verDatos() { //Para acceder a un atributo publico o protected, basta con un $this->(valor), sin embargo necesitaremos el metodo get para los privados
        echo "<br> El nombre del producto es: ".$this->nombre."<br>";
        echo "<br> El precio del producto es: ".$this->pvp."<br>";
        echo "<br> El codigo del producto es: ".$this->getCodigo()."<br>";
    }

    public function muestra() {
        
    }
    public function CalculaDescuento($p) {
        $this->pvp = $this->pvp - ($p/100 * $this->pvp);
    }
}