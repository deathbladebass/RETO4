<?php
header('Access-Control-Allow-Origin *');
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/equipoModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoModel.php';
}

$equipo=new equipoModel();

$equipo->setEquipos();
$equiopList= $equipo->getListStringEquipos();

echo $equiopList;