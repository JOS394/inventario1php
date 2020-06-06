<?php
require_once "../clases/conexion.php";
require_once "../clases/crud.php";
$obj= new crud();

$datos=array(
$_POST['Nombre'],
$_POST['Telefono'],
$_POST['Direccion'],
$_POST['status']
);

echo $obj->agregarproveedor($datos);



?>