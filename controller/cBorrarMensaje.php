<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/mensajeModel.php';
$mensaje = new mensajeModel();
$mensaje->setIdMensaje($_GET['id']);
$mensaje->deleteMensaje();
echo 'Done';