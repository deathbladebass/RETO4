<?php
class jugadorClass{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $dni;
    protected $fechaNacimiento;
    protected $numTel;
    protected $rol;
    protected $idEquipo;
    protected $direccion;
    protected $email;
    protected $activo;
    protected $nickname;
    protected $imagen;



    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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

    public function setApellido($Apellido){
        $this->apellido = $Apellido;
    }

    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getNumTel(){
        return $this->numTel;
    }

    public function setNumTel($numTel){
        $this->numTel = $numTel;
    }

    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }

    public function getIdEquipo(){
        return $this->idEquipo;
    }

    public function setIdEquipo($idEquipo){
        $this->idEquipo = $idEquipo;
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
    public function getImagen(){
        return $this->imagen;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }

}