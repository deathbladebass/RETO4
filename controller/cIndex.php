<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/equipoModel.php';

$equipos=new equipoModel();

$equipos->setEquipos();

$listaEquiposJson=$equipos->getListStringEquipos();

$_SESSION["username"]="";
$_SESSION["idUsu"]="";
$_SESSION["tipoUsu"]=0;

echo $listaEquiposJson;

unset ($equipos);