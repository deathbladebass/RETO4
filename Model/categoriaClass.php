<?php
class categoriaClass{
    protected $idCategoria;
    protected $nombreCategoria;
    protected $abreviatura;
    protected $direccion;
    protected $descripcion;
    

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }

    public function getNombreCategoria(){
        return $this->nombreCategoria;
    }

    public function setNombreCategoria($nombreCategoria){
        $this->nombreCategoria = $nombreCategoria;
    }

    public function getAbreviatura(){
        return $this->abreviatura;
    }

    public function setAbreviatura($abreviatura){
        $this->abreviatura = $abreviatura;
    }
    
    public function getDireccion(){
        return $this->abreviatura;
    }
    
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }
}