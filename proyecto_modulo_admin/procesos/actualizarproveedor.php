<?php
require_once "../clases/conexion.php";
require_once "../clases/crud.php";
$obj= new crud();

$datos=array(
$_POST['idproveedor'],
$_POST['NombreE'],
$_POST['TelefonoE'],
$_POST['DireccionE'],
$_POST['statusE'],


);

echo $obj->actualizarproveedor($datos);



?>