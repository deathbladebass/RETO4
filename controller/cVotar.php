<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/votacionoModel.php';
}else {
    include_once "../model/votacionModel.php";
}

include_once "../model/votacionModel.php";

    $data = json_decode($_GET['data']);
    
    $voto=new votacionModel();

    $voto->setIdUsuario($data->usuario);
    $voto->setIdJugador($data->idJugador);
    
    $voto->insert();
?>