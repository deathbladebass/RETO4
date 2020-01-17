<?php

class votacionClass{
        
        protected $idVotacion;
        protected $idUsuario;
        protected $idJugador;
    

    public function getIdVotacion(){
        return $this->$idVotacion;
    }
    public function getIdUsuario(){
        return $this->$idUsuario;
    }
    public function getIdJugador(){
        return $this->$idJugador;
    }
    public function setIdVotacion($idVotacion){
        $this->idVotacion= $idVotacion;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario= $idUsuario;
    }
    public function setIdJugador($idJugador){
        $this->idJugador=$idJugador;
    }
    
}
?>