<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/RETO4/Model/categoriaModel.php';
$categoria = new categoriaModel();
$categoria->cargarCategoria();
$categoriasList=$categoria->getListString();
echo $categoriasList;