<?php
include_once 'connect_data.php';
include_once 'jugadorClass.php';
include_once 'equipoClass.php';

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