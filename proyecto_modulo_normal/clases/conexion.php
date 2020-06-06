
<?php 
class conectar{
	public function conexion(){
		$conexion= mysqli_connect('localhost', 'user1', 'catolica', 'libreria');
		return $conexion;
	}
}
?>