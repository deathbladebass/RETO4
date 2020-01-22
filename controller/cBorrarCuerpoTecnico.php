<?php
header('Access-Control-Allow-Origin *');
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/cuerpoTecnicoModel.php';

$cuerpoTecnico= new cuerpoTecnicoModel();
$cuerpoTecnico->setIdCuerpoTecnico($_GET['id']);
$cuerpoTecnico->deleteCuerpoTecnico();
echo 'Done';