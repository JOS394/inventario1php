<?php
require_once "../clases/conexion.php";
require_once "../clases/crudusuario.php";
$obj= new crudusuario();

$datos=array(
$_POST['idusuario'],
$_POST['NombreUsuarioE'],
$_POST['EmailE'],
$_POST['PasswordE'],
$_POST['levelE'],


);

echo $obj->actualizarusuario($datos);



?>