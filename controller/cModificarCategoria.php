<?php

if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/categoriaModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/categoriaModel.php';
}

$categoria=new categoriaModel();

$categoria->setIdCategoria($_GET['id']);
$categoria->setNombreCategoria($_GET['nombre']);
$categoria->setAbreviatura($_GET['abreviatura']);

$categoria->modificarCategoria();