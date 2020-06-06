<?php  

session_start();

require_once ("../clases/conexion.php");
$obj= new conectar();
$conexion=$obj->conexion();

$usuarion=$_POST['usuario'];
$pass=$_POST['password'];


$sql= "SELECT * from usuario where nombre_usuario='$usuarion' and password=PASSWORD('$pass') and nivel_usuario=2";
$result=mysqli_query($conexion,$sql);

if(mysqli_num_rows($result) > 0){
	$_SESSION['usern']=$usuarion;
	echo 1;
}else{ 
	echo 0;
}

?>