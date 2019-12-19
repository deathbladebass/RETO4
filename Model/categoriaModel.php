<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/categoriaClass.php';

class categoriaModel extends categoriaClass{
    
    private $list=array();
    private $listEquipos=array();
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

    public function CloseConnect()
    {
        mysqli_close ($this->link);
        
    }
    public function getList()
    {
        return $this->list;
    }

    public function setList()
    {
        $this->OpenConnect();
        $sql='call spCategorias()';
        $result=$this->link->query($sql);
        while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $new=new categoriaModel();
            $new->setIdCategoria($row['idCategoria']);
            $new->setAbreviatura($row['abreviatura']);
            $new->setNombreCategoria($row['nombre']);
            $new->setDireccion($row['direccion']);
            $new->setDescripcion($row['descripcion']);
            
            array_push($this->list, $new);
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();  
    }

    public function deleteCategoria(){
        $this->OpenConnect();
        $id=$this->getIdCategoria();
        $sql= 'call spDeleteCategoria('.$id.')';
        $result= $this->link->query($sql);
        $this->CloseConnect();
    } 

    public function findIdCategoria(){
        $this->OpenConnect();
        $id=$this->getIdCategoria();
        //$sql="call spSelectEquipos()";
        $sql="select * from categorias where idCategoria=$id";
        $result=$this->link->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
       //mysqli_free_result($result);
       $this->CloseConnect();

       return $row;
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