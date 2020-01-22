<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/votacionModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/votacionModel.php';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/votacionModel.php';


$usuario=filter_input(INPUT_GET, "data");

$votos= new votacionModel();

$votos->setIdUsuario($usuario);

//console.log($votos->getIdUsuario());

$votos->setUserVote();

$votosList=$votos->getListString();

echo $votosList;
