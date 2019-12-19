<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/mensajeModel.php';
$mensaje=new mensajeModel();
$mensaje->setIdMensaje($_GET['id']);
$mensaje->setTipo($_GET['tipo']);
$mensaje->setNombre($_GET['nombre']);
$mensaje->setMensaje($_GET['mensaje']);
$mensaje->setEmail($_GET['email']);
$mensaje->setFecha($_GET['fecha']);
$mensaje->setAsunto($_GET['asunto']);
$mensaje->modificarMensaje();