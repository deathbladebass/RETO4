<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';

$jugador=json_decode($_GET['dataJugador']);
//Recibir los datos
$newPlayer= new jugadorModel();
 print_r ($jugador);  
//Nombre
$newPlayer->setNombre($jugador->nombre);
//Apellido
$newPlayer->setApellido($jugador->apellido);
//Nickname
$newPlayer->setNickname($jugador->nickname);
//DNI
$newPlayer->setDni($jugador->dni);
//fechaNacimiento
$newPlayer->setFechaNacimiento($jugador->fechaNacimiento);
//numeroTel
$newPlayer->setNumTel($jugador->numTel);
//rolJugador
$newPlayer->setRol($jugador->rol);
//Direccion
$newPlayer->setDireccion($jugador->direccion);
//Email
$newPlayer->setEmail($jugador->email);
//Activo
$newPlayer->setActivo(0);
$newPlayer->setIdEquipo($jugador->idEquipo);

print_r($newPlayer);
//Ejecutar el insert
$newPlayer->insertPlayer();

//Notificar la insercion
echo "Done";
?>