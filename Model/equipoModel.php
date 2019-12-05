<?php
include_once 'connect_data.php';
include_once 'categoriaModel.php';
include_once 'equipoClass.php';

class equipoModel extends equipoClass{
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

        //$sql="call spSelectEquipos()";
        $sql="select * from equipos";
        $result=$this->link->query($sql);

       while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $new=new equipoModel();
        $new->setIdEquipo($row['idEquipo']);
        $new->setNombreEquipo($row['nombreEquipo']);
        $new->setImagen($row['imagenEquipo']);
        $new->setIdCategoria($row['idCategoria']);

        $categoria = new categoriaModel();
        $categoria->setIdCategoria($row['idCategoria']);
        $temp=$categoria->findIdCategoria();

        $new->setObjCategoria($temp);
        array_push($this->list, $new);
    }
    mysqli_free_result($result);
    $this->CloseConnect();
    }
    public function getListString(){
        $arr=array();
        foreach ($this->list as $object)
        {
           // print_r($object);
        $vars = $this->getObjectVars($object);
        //print_r($vars);
       // $objCategoria=$object->getObjCategoria()->getObjectVars();
         //   $vars['objCategoria']=$objCategoria; 
        array_push($arr, $vars);
        }
        //echo(json_encode($arr));
        //print_r($arr);
        return json_encode($arr);
    }
}