<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/Model/equipoModel.php';

$equipos=new equipoModel();

$equipos->setEquipos();

$listaEquiposJson=$equipos->getListStringEquipos();

echo $listaEquiposJson;

unset ($equipos);