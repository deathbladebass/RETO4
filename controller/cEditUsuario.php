<?php
if ($_SERVER['SERVER_NAME'] == "grupo1.dominios.fpz1920.com") {
    include_once $_SERVER['DOCUMENT_ROOT'].'/model/usuarioModel.php';
}else {
    include_once $_SERVER['DOCUMENT_ROOT'].'/Reto4/model/usuarioModel.php';
}
$nombre=filter_input(INPUT_POST, "nombre");
$apellido=filter_input(INPUT_POST, "apellido");
$nickname=filter_input(INPUT_POST, "nickname");
$idUsuario=filter_input(INPUT_POST, "idUsuario");
$imagen=filter_input(INPUT_POST, "imagen");
$savedFileBase64=filter_input(INPUT_POST, 'savedFileBase64');



$user=new usuarioModel();
$user->setNombre($nombre);
$user->setApellido($apellido);
$user->setUsuario($nickname);
$user->setIdUsuario($idUsuario);
$user->setImagen($imagen);
$user->update();

/*Llega $_POST["savedFileBase64"] ==> 'data:image/png;base64,AAAFBfj42Pj4...';
Se obtiene el contenido limpio del fichero, sin cabecera de tipo de archivo
*/
$fileBase64 = explode(',', $savedFileBase64)[1];

// Se convierte de base64 a binario/texto para almacenarlo
$file = base64_decode($fileBase64);


/*Se especifica el directorio donde se almacenarán los ficheros(se crea si no existe)*/
$writable_dir = '../view/img/';
if(!is_dir($writable_dir)){mkdir($writable_dir);}

//Se escribe el archivo
file_put_contents($writable_dir.$imagen, $file,  LOCK_EX);


echo $user;