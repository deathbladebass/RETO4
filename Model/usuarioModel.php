<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioClass.php';

class usuarioModel extends usuarioClass{
    
    private $list=array();
    private $link;

    //Conexion
    public function OpenConnect(){
        
        $konDat=new connect_data();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    public function CloseConnect(){
        
        mysqli_close ($this->link);
        
    }
    
    //Link
    public function getLink(){
        
        return $this->link;
    }
    /**
     * @param mysqli $link
     */
    public function setLink($link){
        
        $this->link = $link;
        
    }
    
    //Lista
    public function getList(){
        
        return $this->list;
    }

    public function setList(){
        $this->OpenConnect();
        
        $sql="call spUsuarios()";
        $result=$this->link->query($sql);
        
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           
            $newUser= new usuarioModel();
            $newUser->setIdUsuario($row['idUsuario']);
            $newUser->setNombre($row['nombre']);
            $newUser->setApellido($row['apellido']);
            $newUser->setUsuario($row['usuario']);
            $newUser->setContrasena($row['contrasenia']);
            $newUser->setTipo($row['tipo']);
            $newUser->setEmail($row['email']);
            
            //print_r($newUser);
            array_push($this->list, $newUser);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        }
        
        public function insertUser() {
           
         $this->OpenConnect();
         
         $usuario=$this->getUsuario();
         $nombre=$this->getNombre();
         $contrasenia=$this->getContrasena();
         $email=$this->getEmail();
         $apellido=$this->getApellido();
         $tipo=$this->getTipo();
         
         $sql="call spInsertUser('$usuario','$nombre','$contrasenia','$email', '$apellido',$tipo)";
         echo "sql=".$sql; 
         $result=$this->link->query($sql); 
         
         if ($this->link->affected_rows  >=1){
             return "Insertado";
         } else {
             return "error";
         }
         $this->CloseConnect();
        }
        
    }