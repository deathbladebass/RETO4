<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/mensajeClass.php';

class mensajeModel extends mensajeClass{
    
    private $list=array();
    private $link;

    public function getLink()
    {
        return $this->link;
    }
     /**
     * @param mysqli $link
     */
     public function setLink($link)
     {
         $this->link = $link;
     }

    public function getList()
    {
        return $this->list;
    }

    public function setList()
    {
        $this->OpenConnect();
        $sql='select * from mensajes';
        $result=$this->link->query($sql);

        while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
         $new=new mensajeModel();
         $new->setIdMensaje($row['idMensaje']);
         $new->setTipo($row['tipo']);
         $new->setNombre($row['nombre']);
         $new->setMensaje($row['mensaje']);
         $new->setEmail($row['email']);
         $new->setFecha($row['fecha']);
         //$new->setAsunto($row['asunto']);
 
        
         array_push($this->list, $new);
     }
     
     mysqli_free_result($result);
        $this->CloseConnect();
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

    public function getListString(){
        $arr=array();

        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }

    public function deleteMensaje(){
        $this->OpenConnect();
        $id=$this->getIdMensaje();
        $sql= 'CALL spDeleteMensaje('.$id.')';
        $result= $this->link->query($sql);
        $this->CloseConnect();
    }

    public function modificarMensaje(){
        $this->OpenConnect();
        $id=$this->getIdMensaje();
        $tipo='"'.$this->getTipo().'"';
        $nombre='"'.$this->getNombre().'"';
        $mensaje='"'.$this->getMensaje().'"';
        $email='"'.$this->getEmail().'"';
        $fecha='"'.$this->getFecha().'"';
        $asunto='"'.$this->getAsunto().'"';
        $sql= 'Call spModificarMensaje('.$id.', '.$tipo.', '.$nombre.', '.$mensaje.', '.$email.', '.$fecha.', '.$asunto.')';
        echo $sql;
        $result=$this->link->query($sql);
        $this->CloseConnect();
    }
    
}