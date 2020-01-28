<?php
include_once('cIniciarSesion.php');
header('Access-Control-Allow-Origin *');

session_destroy();

header("Location: ../index.html");
?>