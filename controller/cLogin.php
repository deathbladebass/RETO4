<?php
include_once ("../model/usuarioModel.php");

$login = new usuarioModel();
$login->setList();

$usuarios=$login->getList();

$usuario=filter_input(INPUT_GET, 'usuario');
$contrasena=filter_input(INPUT_GET, 'pass');

foreach ($usuarios as $object){
    if ($object->getUsuario()==$usuario && $object->setContrasena()==$contrasena) {
        $_SESSION["usuario"]= $object->getUsuario();
        $_SESSION["id"]=$object->getIdUsuario();
        $_SESSION["tipo"]=$object->getTipo();
        
        $resultado="Login Correcto";
    }else{
        $resultado="Usuario o Contraseña incorrectos";
    }
    
    
}

echo $resultado;