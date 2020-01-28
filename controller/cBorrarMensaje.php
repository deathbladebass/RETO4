<?php
header('Access-Control-Allow-Origin *');
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/mensajeModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/mensajeModel.php';
}

$mensaje = new mensajeModel();

$mensaje->setIdMensaje($_GET['id']);

$mensaje->deleteMensaje();
echo 'Done';