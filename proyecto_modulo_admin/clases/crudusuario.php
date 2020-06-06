<?php

class crudusuario{
	public function agregarusuario($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO usuario (nombre_usuario,email,password,nivel_usuario) values ('$datos[0]','$datos[1]',PASSWORD('$datos[2]'),'$datos[3]')";

		return mysqli_query($conexion,$sql);
}
	public function obtenerDatosUsuario($idusuario){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_usuario,nombre_usuario,email,password,nivel_usuario from usuario where id_usuario='$idusuario'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
						'id_usuario'=> $ver[0],
						'nombre_usuario'=> $ver[1],
						'email'=> $ver[2],
						'password'=> $ver[3],
						'nivel_usuario'=> $ver[4]
		);
			return $datos;
	}
	public function actualizarusuario($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();
		$sql="UPDATE usuario set 
						nombre_usuario='$datos[1]',
						email='$datos[2]',
						password=PASSWORD('$datos[3]'),
						nivel_usuario='$datos[4]' where id_usuario='$datos[0]'";
						return mysqli_query($conexion,$sql);
	}
	public function eliminarUsuario($idusuario){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from usuario where id_usuario='$idusuario'";
		return mysqli_query($conexion,$sql);
	}
}

?>