<?php
require_once 'connect_data.php';
require_once 'categoriaClass.php';

class categoriaModel extends categoriaClass{
    
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