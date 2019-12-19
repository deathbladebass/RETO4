<?php
class mensajeClass{
    
    protected $idMensaje;
    protected $tipo;

    protected $nombre;
    protected $mensaje;
    protected $email;
    protected $fecha;
    protected $asunto;
    
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }


    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function setIdMensaje($idMensaje)
    {
        $this->idMensaje = $idMensaje;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    }
    
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }

}

