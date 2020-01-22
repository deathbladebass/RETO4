<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/usuarioModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
}
$nombre=filter_input(INPUT_GET, "nombre");
$apellido=filter_input(INPUT_GET, "apellido");
$nickname=filter_input(INPUT_GET, "nickname");
$idUsuario=filter_input(INPUT_GET, "idUsuario");
$user=new usuarioModel();
$user->setNombre($nombre);
$user->setApellido($apellido);
$user->setUsuario($nickname);
$user->setIdUsuario($idUsuario);
echo $idUsuario;
$user->update();
echo $user;