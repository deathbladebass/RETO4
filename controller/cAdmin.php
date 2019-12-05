<?php
include_once '../model/equipoModel.php';

$equipo = new equipoModel();

$equipo->setList();

$equipoLista=$equipo->getListString();
echo ($equipoLista);
?>