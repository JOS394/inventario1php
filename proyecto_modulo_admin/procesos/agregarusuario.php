<?php
require_once "../clases/conexion.php";
require_once "../clases/crudusuario.php";
$obj= new crudusuario();

$datos=array(
$_POST['NombreUsuario'],
$_POST['Email'],
$_POST['Password'],
$_POST['level']
);

echo $obj->agregarusuario($datos);



?>