<?php
session_start();
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/usuarioModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioClass.php';

$login = new usuarioModel();
$login->setList();

//Usuario
$usuario=filter_input(INPUT_GET, 'usuario');
$login->setUsuario($usuario);
//echo $usuario;

//Nombre
$nombre=filter_input(INPUT_GET, 'nombre');
$login->setNombre($nombre);

//Apellido
$apellido=filter_input(INPUT_GET, 'apellido');
$login->setApellido($apellido);

//Contrase�a
$contrasenia=filter_input(INPUT_GET, 'contrasenia');
$login->setContrasena($contrasenia);



//Email
$email=filter_input(INPUT_GET, 'email');
$login->setEmail($email);

//Tipo
$login->setTipo('1');

$existe=false;
//Comprobar que exista
foreach ($login->getList() as $usu) {
    if ($usuario==$usu.$usuario) {
        $existe=true;
    }
}

if (!$existe) {
    //Ejecuta el insert
    $result=$login->insertUser();
}else {
    $result="Usuario existente";
}

echo $result;