<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/jugadorModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';
}

$jugador = new jugadorModel();

$jugador->setList();
$jugadorList= $jugador->getListString();

echo $jugadorList;