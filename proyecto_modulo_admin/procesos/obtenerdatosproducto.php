<?php
require_once "../clases/conexion.php";
require_once "../clases/crudproductos.php";
$obj= new crudproductos();

echo json_encode($obj->obtenerDatosProducto($_POST['idproducto']));

  ?>