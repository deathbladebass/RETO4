<?php
class cuerpoTecnicoClass{
    protected $idCuerpoTecnico;
    protected $nombre;
    protected $apellido;
    protected $dni;
    protected $fechaNacimiento;
    protected $numTel;
    protected $rol;
    protected $direccion;
    protected $email;

    public function getIdCuerpoTecnico(){
        return $this->idCuerpoTecnico;
    }

    public function setIdCuerpoTecnico($idCuerpoTecnico){
        $this->idCuerpoTecnico = $idCuerpoTecnico;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }
    public function getNumtTel(){
        return $this->numTel;
    }

    public function setNumTel($numTel){
        $this->numTel = $numTel;
    }
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }
    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
}