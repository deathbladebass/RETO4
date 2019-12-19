<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/cuerpoTecnicoModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/cuerpoTecnicoModel.php';
}
$cuerpoTecnico= new cuerpoTecnicoModel();

$cuerpoTecnico->setList();

$cuerpoTecnicoList=$cuerpoTecnico->getListString();

echo $cuerpoTecnicoList;