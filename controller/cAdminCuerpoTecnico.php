<?php
include_once '../model/cuerpoTecnicoModel.php';
$cuerpoTecnico= new cuerpoTecnicoModel();
$cuerpoTecnico->setList();
$cuerpoTecnicoList=$cuerpoTecnico->getListString();
echo $cuerpoTecnicoList;