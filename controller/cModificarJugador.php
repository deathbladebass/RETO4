<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/JugadorModel.php';

$jugador= new jugadorModel();
$jugador->setNombre();
$jugador->setApellido();
$jugador->setNickname();
$jugador->setEmail();
$jugador->setNumTel();
$jugador->setDni();
$jugador->fechaNacimiento();
$jugador->setRol();
$jugador->setDireccion();