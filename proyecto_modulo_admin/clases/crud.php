<?php

class crud{
	public function agregarproveedor($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO proveedor (nombre_prov,telefono_prov,direccion_prov,estatus) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

		return mysqli_query($conexion,$sql);
}
	public function obtenerDatosProveedor($idproveedor){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_proveedor,nombre_prov,telefono_prov,direccion_prov,estatus from proveedor where id_proveedor='$idproveedor'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);

		$datos=array(
						'id_proveedor'=> $ver[0],
						'nombre_prov'=> $ver[1],
						'telefono_prov'=> $ver[2],
						'direccion_prov'=> $ver[3],
						'estatus'=> $ver[4]
		);
			return $datos;
	}
	public function actualizarproveedor($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();
		$sql="UPDATE proveedor set 
						nombre_prov='$datos[1]',
						telefono_prov='$datos[2]',
						direccion_prov='$datos[3]',
						estatus='$datos[4]' where id_proveedor='$datos[0]'";
						return mysqli_query($conexion,$sql);
	}
	public function eliminarProveedor($idproveedor){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from proveedor where id_proveedor='$idproveedor'";
		return mysqli_query($conexion,$sql);
	}
}

?>