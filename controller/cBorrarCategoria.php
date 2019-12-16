<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/categoriaModel.php';

$categoria= new categoriaModel();
$categoria->setIdCategoria($_GET['id']);
$categoria->deleteCategoria();
echo 'Done';