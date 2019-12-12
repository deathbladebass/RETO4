<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/equipoModel.php';
$equipo=new equipoModel();
$equipo->setList();
$equiopList= $equipo->getListString();
echo $equiopList;