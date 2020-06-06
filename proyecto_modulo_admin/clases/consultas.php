<?php
include '../upload.php'
$objeto= new foto();
$conexion=$objeto->consultarRuta();


class consultas{
	public function consultarproveedor(){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT * from proveedor where estatus=1";

		return mysqli_query($conexion,$sql);
}
	public function consultarultimo($ultimo){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$ultimoregistro="SELECT MAX(id_prod) FROM producto";

		return $ultimo=mysqli_query($conexion,$ultimoregistro);
}
	public function updatefoto(){
		$obj= new conectar();
		$conexion=$obj->conexion();

		$updaterutafoto="UPDATE producto set 
						rutaFoto='".consultarRuta()."',
						estatus='$datos[4]' where id_producto='".consultarultimo()."'";
		return mysqli_query($conexion,$updaterutafoto);
}



}
?>