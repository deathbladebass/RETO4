<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/JugadorModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/JugadorModel.php';
}

$jugador= new jugadorModel();

$jugador->setId($_GET['id']);
$jugador->setNombre($_GET['nombre']);
$jugador->setApellido($_GET['apellido']);
$jugador->setNickname($_GET['nickname']);
$jugador->setEmail($_GET['email']);
$jugador->setNumTel($_GET['numTel']);
$jugador->setDni($_GET['dni']);
$jugador->setFechaNacimiento($_GET['fechaNacimiento']);
$jugador->setRol($_GET['rol']);
$jugador->setDireccion($_GET['direccion']);
$jugador->setIdEquipo($_GET['idEquipo']);
$jugador->setActivo(0);


$jugador->modificarJugador();