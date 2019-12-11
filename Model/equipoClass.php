<?php
class equipoClass{
    protected $idEquipo;
    protected $nombreEquipo;
    protected $idCategoria;
    protected $imagen;
    protected $objCategoria;

    public function getIdEquipo(){
        return $this->idEquipo;
    }

    public function setIdEquipo($idEquipo){
        $this->idEquipo = $idEquipo;
    }
    public function getNombreEquipo(){
        return $this->nombreEquipo;
    }

    public function setNombreEquipo($nombreEquipo){
        $this->nombreEquipo = $nombreEquipo;
    }
    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
    public function getImagen(){
        return $this->imagen;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }

    public function getObjCategoria(){
        return $this->objCategoria;
    }
    public function setObjCategoria($objCategoria){
        $this->objCategoria=$objCategoria;
    }
    function getObjectVars($object)
    {
        //$vars = get_object_vars($this);
        $vars = get_object_vars($object);
        return  $vars;
    }
    function getObjectVarsEquipo(){
        $vars = get_object_vars($this);
        return  $vars;
    }

}