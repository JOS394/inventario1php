<?php
require_once "../clases/conexion.php";
require_once "../clases/crudcategoria.php";
$obj= new crudcategoria();

echo json_encode($obj->obtenerDatosCategoria($_POST['idcategoria']));

  ?>