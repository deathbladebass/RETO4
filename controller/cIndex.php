<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/mensajeModel.php';

$mensajes=new mensajeModel();

$mensajes->setList();

$listaMensajesJson=$mensajes->getListString();

echo $listaMensajesJson;

unset ($mensajes);