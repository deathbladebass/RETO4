<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorClass.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoClass.php';

class jugadorModel extends jugadorClass{
    private $link;
    private $list=array();
    

    public function OpenConnect()
    {
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
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
        
    }

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
        $sql="select idJugador,nombre,nickname,apellido,fechaNacimiento,dni,numeroTelefono,rol,idEquipo,direccion,email,activo from jugadores";
        $result=$this->link->query($sql);

        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $new=new jugadorModel();
            $new->setId($row['idJugador']);
            $new->setNombre($row['nombre']);
            $new->setNickname($row['nickname']);
            $new->setApellido($row['apellido']); 
            $new->setFechaNacimiento($row['fechaNacimiento']);           
            $new->setDni($row['dni']);
            $new->setNumTel($row['numeroTelefono']);
            $new->setRol($row['rol']);
            $new->setIdEquipo($row['idEquipo']);
            $new->setDireccion($row['direccion']);
            $new->setEmail($row['email']);
            $new->setActivo($row['activo']);
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
    }
    
    public function insertPlayer(){
        $this->OpenConnect();
        $nickname='"'.$this->getNickname().'"';
        $nombre='"'.$this->getNombre().'"';
        $apellido='"'.$this->getApellido().'"';
        $fechaNacimiento='"'.$this->getFechaNacimiento().'"';
        $dni='"'.$this->getDni().'"';
        $numTel=$this->getNumtel();
        $rol='"'.$this->getRol().'"';
        $idEquipo=$this->getIdEquipo();
        $direccion='"'.$this->getDireccion().'"';
        $email='"'.$this->getEmail().'"';
        $activo=$this->getActivo();
        $sql = 'Call spInsertJugador('.$nombre.', '.$apellido.', '.$nickname.', '.$fechaNacimiento.', '.$dni.', '.$numTel.', '.$rol.', '.$direccion.', '.$email.', '.$activo.', '.$idEquipo.')';
      //  $sql= 'CALL spInsertJugador('.$nombre.', '.$apellido.', '.$nickname.', '.$fechaNacimiento.', '.$dni.', '.$numTel.', '.$rol.', '.$direccion.', '.$email.', '.$activo.', '.$idEquipo.')';
        echo ($sql);
        $result=$this->link->query($sql);
        $this->CloseConnect();
    }

    public function deletePlayer(){
        $this->OpenConnect();
        $id=$this->getId();
        $sql = 'CALL spDeleteJugador('.$id.')';
        $result=$this->link->query($sql);
        $this->CloseConnect();
    }

    public function modificarJugador(){
        $this->OpenConnect();
        $id=$this->getId();
        $nombre='"'.$this->getNombre().'"';
        $apellido='"'.$this->getApellido().'"';
        $nickname='"'.$this->getNickname().'"';
        $email='"'.$this->getEmail().'"';
        $numTel=$this->getNumTel();
        $dni='"'.$this->getDni().'"';
        $fechaNacimiento='"'.$this->getFechaNacimiento().'"';
        $rol='"'.$this->getRol().'"';
        $direccion='"'.$this->getDireccion().'"';
        $idEquipo=$this->getIdEquipo();
        $activo=$this->getActivo();
        //$sql='call spModificarJugador("nombre",'.$apellido.', '.$nickname.', '.$email.', '.$numTel.', '.$dni.',"1840-09-30", '.$rol.', '.$direccion.', '.$id.', '.$idEquipo.', '.$activo.')';

        $sql='call spModificarJugador('.$nombre.','.$apellido.', '.$nickname.', '.$email.', '.$numTel.', '.$dni.','.$fechaNacimiento.', '.$rol.', '.$direccion.', '.$id.', '.$idEquipo.', '.$activo.')';

        $result=$this->link->query($sql);
        echo $sql;
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

}