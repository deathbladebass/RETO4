<?php
include_once 'connect_data.php';
include_once 'categoriaClass.php';

class categoriaModel extends categoriaClass{
    
    private $list=array();
    private $listEquipos=array();
    

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

    public function setList($list)
    {
        $this->list = $list;
    }

    public function findIdCategoria(){
        $this->OpenConnect();
        $id=$this->getIdCategoria();
        //$sql="call spSelectEquipos()";
        $sql="select * from categorias where idCategoria=$id";
        $result=$this->link->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
       mysqli_free_result($result);
       $this->CloseConnect();

       return $row;
    }
}