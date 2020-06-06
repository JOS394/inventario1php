<?php

require_once "../clases/conexion.php";
require_once "../clases/crudcategoria.php";

$obj= new crudcategoria();

echo $obj->eliminarCategoria($_POST['idcategoria']);

  ?>