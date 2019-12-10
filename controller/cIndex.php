<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/equipoModel.php';

$equipos=new equipoModel();

$equipos->setEquipos();

$listaEquiposJson=$equipos->getListStringEquipos();

$_SESSION["usuario"]="";
$_SESSION["idUsu"]="";
$_SESSION["tipoUsu"]=1;

echo $listaEquiposJson;

unset ($equipos);