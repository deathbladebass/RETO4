<?php
header('Access-Control-Allow-Origin *');
session_start();
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/usuarioModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
}

$usuario = new usuarioModel();
//print_r($_SESSION['username']);
$usuario->setUsuario( $_SESSION['username']);
$user= new usuarioModel();
$user=$usuario->findUser();

/* $usuario->setList();

 foreach($usuario as $object){
    if ($object->getUsuario()==$_SESSION['username']){
       
        $user->setUsuario($object->getUsuario());
        $user->setNombre($object->getNombre());
        $user->setApellido($object->getApellido());
        $user->setContrasena($object->getContrasena());
        $user->setTipo($object->getTipo());
        $user->setEmail($object->getEmail());
        
    }
} 
json_encode($user); */
echo json_encode($user);