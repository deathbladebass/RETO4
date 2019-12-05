<?php
include_once 'connect_data.php';
include_once 'cuerpoTecnicoClass.php';

class cuerpoTecnicoModel extends cuerpoTecnicoClass{
    
    private $list;

    public function getList()
    {
        return $this->list;
    }

    public function setList($list)
    {
        $this->list = $list;
    }
}