<?php
namespace Concesionario;

class Imagen{
    private $appUrl; //url de nuestra aplicacion hasta public
    private $nombreF;
    private $dirStorage; //directorio donde guardaremos la imagen
    
    public function isImagen($tipo){

        $tiposBuenos=[
            'image/jpeg',
            'image/bmp',
            'image/png',
            'image/webp',
            'image/gif',
            'image/svg-xml',
            'image/x-icon'
        ];
        return in_array($tipo, $tiposBuenos);
    }
    public function guardarImagen($imagen){
        //die($this->nombreF);
        return move_uploaded_file($imagen, $this->nombreF);
    }
    public function getUrlImagen($dir){
        return $this->appUrl."img/$dir/".basename($this->nombreF); //http://127.0.0.1/~usuario/Entorno%20Servidor/PDO/Concesionario/public/img/marcas/
    }
    public function guardardefault($carpeta){
        return $this->appUrl."/img/$carpeta/default.png"; 
    }
    function borrarFichero($nombre){
        unlink($this->dirStorage.$nombre);
    }

    /**
     * Set the value of appUrl
     *
     * @return  self
     */ 
    public function setAppUrl($appUrl)
    {
        $this->appUrl = $appUrl;

        return $this;
    }

    /**
     * Set the value of nombreF
     *
     * @return  self
     */ 
    public function setNombreF($nombreF)
    {
        $this->nombreF = $this->dirStorage.uniqid()."_".$nombreF;

        return $this;
    }

    /**
     * Set the value of dirStorage
     *
     * @return  self
     */ 
    public function setDirStorage($dirStorage)
    {
        $this->dirStorage = $dirStorage;

        return $this;
    }
}