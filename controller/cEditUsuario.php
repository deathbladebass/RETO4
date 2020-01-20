<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/usuarioModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
}
$nombre=FILTER_INPUT(input_get, "nombre");
$apellido=FILTER_INPUT(input_get, "apellido");
$nickname=FILTER_INPUT(input_get, "nickname");
$idUsuario=FILTER_INPUT(input_get, "idUsuario");
$user=new usuarioModel();
$user->setNombre($nombre);
$user->setApellido($apellido);
$user->setUsuario($nickname);
$user->setIdUsuario($idUsuario);
$user->update();