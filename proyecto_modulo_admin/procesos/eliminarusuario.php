<?php

require_once "../clases/conexion.php";
require_once "../clases/crudusuario.php";

$obj= new crudusuario();

echo $obj->eliminarUsuario($_POST['idusuario']);

  ?>