<?php
<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/connect_data_server.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/votacionClass.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/votacionClass.php';
}

class votacionModel extends votacionClass{
    
    private $list=array();
    private $link;

    //Conexion
    public function OpenConnect(){
        
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
    public function CloseConnect(){
        
        mysqli_close ($this->link);
        
    }
    
    //Link
    public function getLink(){
        
        return $this->link;
    }
    /**
     * @param mysqli $link
     */
    public function setLink($link){
        
        $this->link = $link;
        
    }
    //Lista
    public function getList(){
        
        return $this->list;
    }

    public function loadVotacion(){
        
        $this->OpenConnect();

        $sql='call spVotacion()';
        $result=$this->link->query($sql);
        
        while ($row = mysql_fetch_array($result, MYSQLI_ASSOC)){

            $new= new votacionModel();
            $new->setIdVotacion($row['idVotacion']);
            $new->setIdUsuario($row['idUsuario']);
            $new->setIdJugador($row['idJugador']);
            
            array_push($this->list, $new);
        }
        mysql_free_result($result);
        $this->CloseConnect();
    }

    public function insert(){

        $this->OpenConnect();

        $idJugador=$this->getIdJugador();
        $idUsuario=$this->getIdUsuario();

        $sql='CALL spInsertVoto('.$idJugador.', '.$idUsuario.')';

        $result=$this->link->query($sql);

        $this->CloseConnect();
    }

}