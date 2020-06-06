
<?php 



class Controlador {
	public static $ruta="/proyecto_modulo_normal/";



	public function libros($param,$param2) {
		include_once("app/controladores/controllerlibros.php");
		$obj=new ControllerLibros($param,$param2);
	}

}
 ?>