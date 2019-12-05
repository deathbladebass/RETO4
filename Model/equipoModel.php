<?php
require_once 'connect_data.php';
require_once 'cuerpoTecnicoClass.php';
require_once 'equipoClass.php';

class equipoModel extends equipoClass{
    
    private $list;

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

    public function getList()
    {
        return $this->list;
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

    public function setList()
    {
       $this->OpenConnect();
       $sql='Select * from equipo';
       $result=$this->link->query($sql);
       while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $new=new equipoModel();
        $new->setIdEquipo($row['idEquipo']);
        $new->setNombreEquipo($row['nombreEquipo']);
        $new->setIdCategoria($row['idCategoria']);
        $new->setImagen($row['imagenEquipo']);
        
        array_push($this->list, $new);
    }
    mysqli_free_result($result);
    $this->CloseConnect();
    }
    public function getListString(){
        $arr=array();
        foreach ($this->list as $object)
        {
        $vars = get_object_vars($object);
        array_push($arr, $vars);
        }
        //echo(json_encode($arr));
        //print_r($arr);
        return json_encode($arr);
    }
}