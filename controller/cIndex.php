<?php

include_once '../Model/equipoModel.php';

$equipos=new equipoModel();

$equipos->setEquipos();

$listaEquiposJson=$equipos->getListStringEquipos();

echo $listaEquiposJson;

unset ($equipos);