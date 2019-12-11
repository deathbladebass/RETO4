<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/jugadorModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/equipoModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/categoriaModel.php';
$jugador = new jugadorModel();
$jugador->setList();
$jugadorList= $jugador->getListString();
$equipo=new equipoModel();
$equipo->setList();
$equiopList= $equipo->getListString();
$categoria = new categoriaModel();
$categoria->setList();
$list=array();
$categoriaList= $categoria->getListString();
array_push($list, $jugadorList);
array_push($list, $equiopList);
array_push($list, $categoriaList);
json_encode($list);

echo $list;