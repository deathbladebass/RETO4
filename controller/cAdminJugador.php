<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';
$jugador = new jugadorModel();
$jugador->setList();
$jugadorList=$jugador->getListString();
echo $jugadorList;
?>