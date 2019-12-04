<?php
require_once 'connect_data.php';
require_once 'usuarioClass.php';
require_once 'mensajeClass.php';

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