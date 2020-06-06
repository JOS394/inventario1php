<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcategoria.php";
$obj= new crudcategoria();

$datos=array(
$_POST['Nombre'],

);

echo $obj->agregarCategoria($datos);



?>