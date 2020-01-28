<?php
header('Access-Control-Allow-Origin *');
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/cuerpoTecnicoModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/cuerpoTecnicoModel.php';
}

$cuerpoTecnico= new cuerpoTecnicoModel();

$cuerpoTecnico->setIdCuerpoTecnico($_GET['id']);
$cuerpoTecnico->setNombre($_GET['nombre']);
$cuerpoTecnico->setApellido($_GET['apellido']);
$cuerpoTecnico->setDni($_GET['dni']);
$cuerpoTecnico->setFechaNacimiento($_GET['fechaNacimiento']);
$cuerpoTecnico->setNumTel($_GET['numTel']);
$cuerpoTecnico->setRol($_GET['rol']);
$cuerpoTecnico->setDireccion($_GET['direccion']);
$cuerpoTecnico->setEmail($_GET['email']);

$cuerpoTecnico->modificarCuerpoTecnico();