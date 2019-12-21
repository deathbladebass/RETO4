<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/categoriaModel.php';
    
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/categoriaModel.php';
}

include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/categoriaModel.php';

$categoria=new categoriaModel();

$categoria->setList();

$categoriaList=$categoria->getListString();

echo ($categoriaList);