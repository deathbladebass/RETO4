<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoModel.php';

$equipo = new equipoModel();

$equipo->setList();

$equipoLista=$equipo->getListString();
echo $equipoLista;
?>