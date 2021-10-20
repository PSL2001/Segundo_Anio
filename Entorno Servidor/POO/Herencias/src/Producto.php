<?php
class Producto {
    private $codigo;
    public $nombre;
    protected $pvp;

    public function __construct($c, $n, $p) {
        $this->codigo = $c;
        $this->nombre = $n;
        $this->pvp = $p;
    }

    public function __toString() {
        return "Codigo: ". $this->codigo .", Nombre: {$this->nombre}, PVP: {$this->pvp}"; 
    }

    /**
     * Get the value of pvp
     */ 
    public function getPvp()
    {
        return $this->pvp;
    }

    /**
     * Set the value of pvp
     *
     * @return  self
     */ 
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }
}