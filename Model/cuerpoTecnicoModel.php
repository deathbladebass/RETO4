<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/cuerpoTecnicoClass.php';

class cuerpoTecnicoModel extends cuerpoTecnicoClass{
    
    private $list=array();
    private $link;

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
        $sql='select * from cuerpostecnicos';
        $result=$this->link->query($sql);

        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $new=new cuerpoTecnicoModel();
            $new->setIdCuerpoTecnico($row['id']);
            $new->setNombre($row['Nombre']);
            $new->setApellido($row['Apellido']); 
            $new->setRol($row['Rol']);
            $new->setIdEquipo($row['idEquipo']);
            $new->setFechaNacimiento($row['fechaNacimiento']);           
            $new->setDireccion($row['direccion']);
            $new->setEmail($row['email']);
            $new->setNumTel($row['numTel']);
            $new->setDni($row['dni']);
            
           
            
            array_push($this->list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }

    public function modificarCuerpoTecnico(){
        $this->OpenConnect();
        $id=$this->getIdCuerpoTecnico();
        $sql='CALL spModificarCuerpoTecnico('.$id.', '.$nombre.', '.$apellido.', '.$dni.', '.$fechaNacimiento.', '.$numTel.', '.$rol.', '.$direccion.', '.$email.')';
        $result= $this->link->query($sql);
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