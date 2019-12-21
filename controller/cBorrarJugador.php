<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/jugadorModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';
}
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';


$newPlayer= new jugadorModel();

$id=$_GET['id'];
$newPlayer->setId($id);

$newPlayer->deletePlayer();
echo 'Done';