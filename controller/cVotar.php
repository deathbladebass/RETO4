<?php
header('Access-Control-Allow-Origin *');
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/votacionoModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/votacionModel.php';
}
include_once('cIniciarSesion.php');

    $voto=new votacionModel();

    $voto=setIdUsuario($_SESSION['idUsuario']);
    $voto->setIdJugador($_GET['idJugador']);
    $voto->insert();
?>