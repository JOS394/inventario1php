<?php
require_once "../clases/conexion.php";
require_once "../clases/crudproductos.php";
$obj= new crudproductos();
 
$datos=array(
$_POST['Nombre'],
$_POST['Existencia'],
$_POST['Precio'],
$_POST['Costo'],
$_POST['Marca'],
$_POST['Descripcion'],
$_POST['status'],
$_POST['Proveedor'],
$_POST['Categoria']

);


echo $obj->agregarproducto($datos);




?>