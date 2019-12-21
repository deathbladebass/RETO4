<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/mensajeModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/mensajeModel.php';
}

$nuevoMensaje=new mensajeModel();

$nombre=filter_input(INPUT_GET, 'nombre');
$email=filter_input(INPUT_GET, 'email');
$tipo=filter_input(INPUT_GET, 'tipo');
$asunto=filter_input(INPUT_GET, 'asunto');
$mensaje=filter_input(INPUT_GET, 'mensaje');

$nuevoMensaje->setNombre($nombre);
$nuevoMensaje->setEmail($email);
$nuevoMensaje->setTipo($tipo);
$nuevoMensaje->setAsunto($asunto);
$nuevoMensaje->setMensaje($mensaje);

$resultado=$nuevoMensaje->insert();

echo "Mensaje enviado!\n\nResponderemos a su email lo antes posible";
// echo $resultado;
