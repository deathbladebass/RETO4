<?php
session_start();
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/connect_data.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/connect_data.php';
}

$mensajes=new mensajeModel();

$mensajes->setList();

$listaMensajesJson=$mensajes->getListString();

echo $listaMensajesJson;

unset ($mensajes);