<?php
include_once ('cIniciarSesion.php');
header('Access-Control-Allow-Origin *');




if (!isset($_SESSION["tipoUsu"])) {   
    $resultado=array('username' => "", 'tipoUsu' => 0); 
}else{
    $resultado=array('username' => $_SESSION["username"], 'tipoUsu' => $_SESSION["tipoUsu"]); 
}

echo json_encode($resultado);