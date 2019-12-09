<?php
include_once 'connect_data.php';
include_once 'jugadorClass.php';
include_once 'equipoClass.php';

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
    public function getListString(){
        $arr=array();
        
        //echo(json_encode($arr));
        //print_r($arr);
        return json_encode($arr);
    }

}