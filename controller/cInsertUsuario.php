<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioClass.php';

$login = new usuarioModel();
$login->setList();

$nombre=filter_input(INPUT_GET, 'nombre');
$apellido=filter_input(INPUT_GET, 'apellido');
$contrasenia=filter_input(INPUT_GET, 'contrasenia');
$usuario=filter_input(INPUT_GET, 'usuario');
$email=filter_input(INPUT_GET, 'email');
$tipo=1;


$login->insertUser($nombre,$apellido,$contrasenia,$usuario,$email,$tipo);

//$result="No insertado";

echo $result;