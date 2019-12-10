<?php
include_once $_SERVER['DOCUMENT_ROOT'].'Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'Reto4/model/usuarioClass.php';

class usuarioModel extends usuarioClass{
    
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