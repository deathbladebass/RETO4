<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/jugadorModel.php';
$jugador = new jugadorModel();
$jugador->setList();
$jugadorList= $jugador->getListString();




echo $jugadorList;