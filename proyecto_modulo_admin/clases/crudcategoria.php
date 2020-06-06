<?php

class crudcategoria{
	public function agregarCategoria($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO categoria (nombre_cat) values ('$datos[0]')";

		return mysqli_query($conexion,$sql);
}
	public function obtenerDatoscategoria($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_categoria,nombre_cat from categoria where id_categoria='$idcategoria'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
						'id_categoria'=> $ver[0],
						'nombre_cat'=> $ver[1],

		);
			return $datos;
	}
	public function actualizarcategoria($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();
		$sql="UPDATE categoria set 
						nombre_cat='$datos[1]'
						 where id_categoria='$datos[0]'";
						return mysqli_query($conexion,$sql);
	}
	public function eliminarcategoria($idcategoria){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from categoria where id_categoria='$idcategoria'";
		return mysqli_query($conexion,$sql);
	}
}

?>