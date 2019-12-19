<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/EquipoModel.php';
$equipo= new EquipoModel();
    $equipo->setIdCategoria($_GET['categoria']);
    $equipo->setNombreEquipo($_GET['nombre']);
    $equipo->setIdEquipo($_GET['id']);
    $equipo->modificarEquipo();
    echo 'Done';

