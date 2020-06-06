<?php

require_once "../clases/conexion.php";
require_once "../clases/crudproductos.php";

$obj= new crudproductos();

echo $obj->eliminarProducto($_POST['idproducto']);

  ?>