<?php
class galeriaClass{
    
    protected $idImg;
    protected $ruta;
    protected $privada;
    public function getIdImg()
    {
        return $this->idImg;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function getPrivada()
    {
        return $this->privada;
    }

    public function setIdImg($idImg)
    {
        $this->idImg = $idImg;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function setPrivada($privada)
    {
        $this->privada = $privada;
    }

    
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }
    
}