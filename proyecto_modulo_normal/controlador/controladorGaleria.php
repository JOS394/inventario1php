<?php 
class ControllerLibros {
	private function gallery() {
		include_once("app/vistas/gallery.php");
	}

	private function getLibrosGallery() {
		$info=array('success'=>true,'data'=>$this->libro->getLibrosGallery($this->param2));
		echo json_encode($info);
	}


}

 ?>