<?php
include_once '../model/mensajeModel.php';
$mensaje= new mensajeModel();
$mensaje->setList();
$mensajeList=$mensaje->getListString();
echo ($mensajeList);