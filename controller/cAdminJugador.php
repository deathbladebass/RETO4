<?php
include_once '../model/jugadorModel.php';
$jugador = new jugadorModel();
$jugador->setList();
$jugadorList=$jugador->getListString();
echo $jugadorList;
?>