<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioClass.php';

$login = new usuarioModel();
$login->setList();

$login->getList();
//$listaUsuarios=;

//Comprobar que exista


//Nombre
$nombre=filter_input(INPUT_GET, 'nombre');
$login->setNombre($nombre);

//Apellido
$apellido=filter_input(INPUT_GET, 'apellido');
$login->setApellido($apellido);

//Contraseña
$contrasenia=filter_input(INPUT_GET, 'contrasenia');
$login->setContrasena($contrasenia);

//Usuario
$usuario=filter_input(INPUT_GET, 'usuario');
$login->setUsuario($usuario);
echo $usuario;

//Email
$email=filter_input(INPUT_GET, 'email');
$login->setEmail($email);

//Tipo
$login->setTipo('1');

//Ejecuta el insert
$result=$login->insertUser();
echo $result;