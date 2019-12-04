<?php
require_once 'connect_data.php';
require_once 'jugadorClass.php';
require_once 'equipoClass.php';

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