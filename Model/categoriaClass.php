<?php


class categoriaClass{
    protected $idCategoria;
    protected $nombreCategoria;

    public function getIdCategoria(){
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }

    public function getNombreCategoria(){
        return $this->nombreCategoria;
    }

    public function setNombreCategoria($idCategoria){
        $this->nombreCategoria = $nombreCategoria;
    }

}