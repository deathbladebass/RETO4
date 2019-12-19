<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/jugadorModel.php';

$id=$_GET['id'];
$newPlayer= new jugadorModel();
$newPlayer->setId($id);
$newPlayer->deletePlayer();
echo 'Done';