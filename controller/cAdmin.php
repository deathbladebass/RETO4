<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/equipoModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/connect_data.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
}
$equipo = new equipoModel();

$equipo->setList();

$equipoLista=$equipo->getListString();
echo $equipoLista;
?>