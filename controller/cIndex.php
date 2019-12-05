<?php

include_once '../Model/equipoModel.php';

$equipos=new equipoModel();

$equipos->setEquipos();

echo $equipos;