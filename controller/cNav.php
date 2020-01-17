<?php
session_start();



if (!isset($_SESSION["tipoUsu"])) {   
    $resultado=array('username' => "", 'tipoUsu' => 0); 
}else{
    $resultado=array('idUsuario' => $_SESSION["idUsuario"], 'username' => $_SESSION["username"], 'tipoUsu' => $_SESSION["tipoUsu"]); 
}

echo json_encode($resultado);