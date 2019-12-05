<?php
class jugadorClass{
    protected $idJugador;
    protected $nombreJugador;
    protected $apellidoJugador;
    protected $dniJugador
    protected $fechaNacimientoJugador;
    protected $numTelJugador;
    protected $rolJugador;
    protected $idEquipo;
    protected $direccionJugador;
    protected $emailJugador;
    protected $activo;
    protected $nickname;




    public function getIdJugador(){
        return $this->idJugador;
    }

    public function setIdJugador($idJugador){
        $this->idJugador = $idJugador;
    }

    public function getNombreJugador(){
        return $this->nombreJugador;
    }

    public function setNombreJugador($nombreJugador){
        $this->nombreJugador = $nombreJugador;
    }

    public function getApellidoJugador(){
        return $this->apellidoJugador;
    }

    public function setApellidoJugador($ApellidoJugador){
        $this->ApellidoJugador = $ApellidoJugador;
    }

    public function getDniJugador(){
        return $this->dniJugador;
    }

    public function setDniJugador($dniJugador){
        $this->dniJugador = $dniJugador;
    }

    public function getFechaNacimientoJugador(){
        return $this->fechaNacimientoJugador;
    }

    public function setFechaNacimientoJugador($fechaNacimientoJugador){
        $this->fechaNacimientoJugador = $fechaNacimientoJugador;
    }

    public function getNumTelJugador(){
        return $this->numTelJugador;
    }

    public function setNumTelJugador($numTelJugador){
        $this->numTelJugador = $numTelJugador;
    }

    public function getRolJugador(){
        return $this->rolJugador;
    }

    public function setRolJugador($rolJugador){
        $this->rolJugador = $rolJugador;
    }

    public function getIdEquipo(){
        return $this->idEquipo;
    }

    public function setIdEquipo($idEquipo){
        $this->idEquipo = $idEquipo;
    }

    public function getDireccionJugador(){
        return $this->direccionJugador;
    }

    public function setDireccionJugador($direccionJugador){
        $this->direccionJugador = $direccionJugador;
    }

    public function getEmailJugador(){
        return $this->emailJugador;
    }

    public function setEmailJugador($emailJugador){
        $this->emailJugador = $emailJugador;
    }

    public function getActivo(){
        return $this->activo;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }
    public function getNickname(){
        return $this->nickname;
    }

    public function setNickname($nickname){
        $this->nickname = $nickname;
    }

}