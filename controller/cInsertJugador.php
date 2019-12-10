<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';

$jugador=json_decode($_GET['dataJugador']);
//Recibir los datos
$newPlayer= new jugadorModel();
 
//Nombre
$newPlayer->setNombre($nombre);
//Apellido
$newPlayer->setApellido($apellido);
//Nickname
$newPlayer->setApellido($apellido);
//DNI
$newPlayer->setApellido($apellido);
//fechaNacimiento
$newPlayer->setApellido($apellido);
//numeroTel
$newPlayer->setApellido($apellido);
//rolJugador
$newPlayer->setApellido($apellido);
//Direccion
$newPlayer->setApellido($apellido);
//Email
$newPlayer->setApellido($apellido);
//Activo
$newPlayer->setApellido($apellido);

//Ejecutar el insert
$newPlayer->insertPlayer();

//Notificar la insercion
echo "Done";
?>