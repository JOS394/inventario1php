<?php

class crudproductos{
	

	public function agregarproducto($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="INSERT INTO producto (nombre_prod,existencia,precio,costo,marca,Descripcion,status,id_proveedor,id_categoria) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]')";

		return mysqli_query($conexion,$sql);
		
	}

	public function obtenerDatosProducto($idproducto){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT id_prod,nombre_prod,existencia,precio,costo,marca,Descripcion,status,id_proveedor,id_categoria from producto where id_prod='$idproducto'";
		$result=mysqli_query($conexion,$sql);
		$ver=mysqli_fetch_row($result);


		$datos=array(
						'id_prod'=> $ver[0],
						'nombre_prod'=> $ver[1],
						'existencia'=> $ver[2],
						'precio'=> $ver[3],
						'costo'=> $ver[4],
						'marca'=> $ver[5],
						'Descripcion'=> $ver[6],
						'status'=> $ver[7],
						'id_proveedor'=> $ver[8],
						'id_categoria'=> $ver[9]
		);
			return $datos;
	}
	public function actualizarproducto($datos){
		$obj= new conectar();
		$conexion=$obj->conexion();
		$sql="UPDATE producto set 
						nombre_prod='$datos[1]',
						existencia='$datos[2]',
						precio='$datos[3]',
						costo='$datos[4]',
						marca='$datos[5]',
						Descripcion='$datos[6]',
						status='$datos[7]',
						id_proveedor='$datos[8]',
						id_categoria='$datos[9]' where id_prod='$datos[0]'";
						return mysqli_query($conexion,$sql);
	}
	public function eliminarProducto($idproducto){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="DELETE from producto where id_prod='$idproducto'";
		return mysqli_query($conexion,$sql);
	}
	
public function actualizarrutaFoto($datos){
        $obj= new conectar();
        $conexion=$obj->conexion();
        $sql="UPDATE producto set 
                        rutaFoto='".$fileDirAct."'
                        where id_prod='$datos[0]'";
                        return mysqli_query($conexion,$sql);
   
						}
}






?>