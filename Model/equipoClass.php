<?php
class jugadorClass{
    protected $idEquipo;
    protected $nombreEquipo
    protected $idCategoria;
    protected $idCuerpoTecnico;
    protected $liga;

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
    public function getIdCuerpoTecnico(){
        return $this->idCuerpoTecnico;
    }

    public function setIdCuerpoTecnico($idCuerpoTecnico){
        $this->idCuerpoTecnico = $idCuerpoTecnico;
    }
    public function getLiga(){
        return $this->liga;
    }

    public function setLiga($liga){
        $this->liga = $liga;
    }


}