<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/equipoModel.php';
$equipo=new equipoModel();
$id=$_GET['id'];
$equipo->setIdEquipo($id);
$equipo->deleteEquipo();
echo 'Done';