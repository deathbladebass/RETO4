<?php
session_start();
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/connect_data.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/galeriaModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/galeriaModel.php';
}

$galeria=new galeriaModel();

$galeria->setList();

$listaGaleriaJson=$galeria->getListString();

echo $listaGaleriaJson;

unset ($galeria);