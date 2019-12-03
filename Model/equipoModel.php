<?php
require_once 'connect_data.php';
require_once 'cuerpoTecnicoClass.php';
require_once 'equipoClass.php';

class equipoModel extends equipoClass{
    
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