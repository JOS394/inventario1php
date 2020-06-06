<?php
require_once "../clases/conexion.php";
require_once "../clases/crudproductos.php";
$obj= new crudproductos();

$datos=array(
$_POST['idproducto'],
$_POST['NombreE'],
$_POST['ExistenciaE'],
$_POST['PrecioE'],
$_POST['CostoE'],
$_POST['MarcaE'],
$_POST['DescripcionE'],
$_POST['statusE'],
$_POST['ProveedorE'],
$_POST['CategoriaE']


);

echo $obj->actualizarproducto($datos);



?>