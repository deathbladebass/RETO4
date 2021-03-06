<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/connect_data_server.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/categoriaModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/equipoClass.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/categoriaModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoClass.php';
}

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

    //Datos para el admin.php
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
        $vars = get_object_vars($object);
        
        array_push($arr, $vars);
        }
        
        return json_encode($arr);
    }
    
    //Datos para el index
    public function setEquipos(){
        
        $this->OpenConnect();
        
        $sql="call spEquipos()";
        $result=$this->link->query($sql);
        
        while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $equipoNuevo= new equipoModel();
            $equipoNuevo->setIdEquipo($row['idEquipo']);
            $equipoNuevo->setNombreEquipo($row['nombreEquipo']);
            $equipoNuevo->setImagen($row['imagenEquipo']);
            
            //print_r($equipoNuevo);
            
            array_push($this->list, $equipoNuevo);
        }
        $this->CloseConnect();
    }
    
    //Insert Equipo
    
    public function deleteEquipo(){
        $this->OpenConnect();
        $id=$this->getIdEquipo();
        $sql= 'Call spDeleteEquipo('.$id.')';
        $result=$this->link->query($sql);
        $this->CloseConnect();
    }
    
    public function getListStringEquipos(){
           
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVarsEquipo();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    public function modificarEquipo(){
        $this->OpenConnect();
        $categoria=$this->getIdCategoria();
        $id=$this->getIdEquipo();
        $equipo='"'.$this->getNombreEquipo().'"';
        $sql='call spModificarEquipo('.$id.', '.$equipo.', '.$categoria.')';
        echo $sql;
        $result=$this->link->Query($sql);
        $this->CloseConnect();
    }
}
