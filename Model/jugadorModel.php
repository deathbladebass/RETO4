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
        $sql="select idJugador,nombre,nickname,apellido,fechaNacimiento,dni,numeroTelefono,rol,idEquipo,direccion,email,activo,img from jugadores";
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
            $new->setImagen($row['img']);
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
    }
    
    public function insertPlayer(){
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $nombre=$this->getNombre();
        $apellido=$this->getApellido();
        $nickname=$this->getNickname();
        $fechaNacimiento=$this->getFechaNacimiento();
        $dni=$this->getDni();
        $numeroTel=$this->getNumTel();
        $rol=$this->getRol();
        $equipo=$this->getIdEquipo();
        $direccion=$this->getDireccion();
        $email=$this->getEmail();
        $activo=$this->getActivo();
        $imagen=$this->getImagen();
        
        
        //echo "Antesd del insert";
        $sql="CALL spInsert('$nombre', '$apellido', '$nickname', '$fechaNacimiento', '$dni', '$numeroTel', '$rol', '$equipo', '$direccion', '$email', '$activo', '$imagen')";
        //echo $sql;
        //echo "Despues del insert";
        $status=$this->link->query($sql);
        
        if ($this->link->affected_rows  >=1){
            return "Insertado";
        } else {
            return "error";
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

}