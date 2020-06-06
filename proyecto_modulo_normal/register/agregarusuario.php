<?php
require_once "../clases/conexion.php";
require_once "crudusuario.php";
$obj= new crudusuario();

$datos=array(
$_POST['usuario'],
$_POST['email'],
$_POST['nombres'],
$_POST['telefono'],
$_POST['password'],
$_POST['levelusuario']
);

echo $obj->agregarusuario($datos);



?>