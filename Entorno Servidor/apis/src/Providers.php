<?php

namespace App;

class Providers {
    private static $BASE_URL = "https://pixabay.com/api/";
    private static $KEY = "26150978-acf888584aca04d07bd0a6ae4";
    private $url;
    private $file;
    private $data;

    public function __construct($query) {
        $this->url = self::$BASE_URL."?key=".self::$KEY."&q=$query";
        $this->file = file_get_contents($this->url);
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        $this->data = json_decode($this->file);
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}