<?php

class crudusuario{
	public function agregarusuario($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO usuario (nombre_usuario,nombre_completo,telefono,email,password,nivel_usuario) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]',PASSWORD('$datos[4]'),'$datos[5]')";

		return mysqli_query($conexion,$sql);
}

}

?>