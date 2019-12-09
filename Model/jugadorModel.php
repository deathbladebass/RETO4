<?php
include_once $_SERVER['DOCUMENT_ROOT'].'Reto4/model/connect_data.php';
include_once $_SERVER['DOCUMENT_ROOT'].'Reto4/model/jugadorClass.php';
include_once $_SERVER['DOCUMENT_ROOT'].'Reto4/model/equipoClass.php';

class jugadorModel extends jugadorClass{
    
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