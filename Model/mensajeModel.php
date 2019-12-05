<?php
include_once 'connect_data.php';
include_once 'mensajeClass.php';

class mensajeModel extends mensajeClass{
    
    private $list;

    public function getList()
    {
        return $this->list;
    }

    public function setList($list)
    {
        $this->list = $list;
    }
    
    public function OpenConnect() {
        $konDat=new connect_data();
        try {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión.
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect() {
        mysqli_close ($this->link);
    }
    
    public function insert() {
        $this->OpenConnect();
        
        $nombre=$this->getNombre();
        $email=$this->getEmail();
        $tipo=$this->getTipo();
        $asunto=$this->getAsunto();
        $mensaje=$this->getMensaje();
        
        
        $sql = "CALL spNewMensaje('$tipo', '$nombre', '$mensaje', '$email', '$asunto')";
        
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            return "El mensaje se ha insertado con exito";
        } else {
            return "Fallo en la insercion del mensaje: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
}