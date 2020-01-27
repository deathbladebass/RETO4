<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/galeriaClass.php';

class galeriaModel extends galeriaClass{
    
    private $list=array();
    private $link;
    
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
        $sql='CALL spAllImagenesGaleria()';
        $result=$this->link->query($sql);
        while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $new=new galeriaModel();
            $new->setIdImg($row['idImg']);
            $new->setRuta($row['ruta']);
            $new->setPrivada($row['privada']);
                    
            array_push($this->list, $new);
        }
        
        mysqli_free_result($result);
        $this->CloseConnect();
    }
    
    public function OpenConnect() {
        $konDat=new connect_data();
        try {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión.
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect() {
        mysqli_close ($this->link);
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