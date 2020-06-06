<?php  


SESSION_START();
 if(isset($_SESSION['user'])){
include_once "includes/header.php";
require_once ("clases/conexion.php");

  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
<br><br><br>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <div class="card">
        <div class="card-header">
<img src="librerias/img/proveedor.png" align="center"  class="card-img-top center mx-auto" alt="...">
        </div>
        <div class="card-block">
       <center><h5 class="card-title center">Proveedores Existentes</h5></center>
    	<p class="card-text">
          <?php
		$obj= new conectar();
		$conexion=$obj->conexion();

		$sql="SELECT * from proveedor where estatus=1";
		$result=mysqli_query($conexion,$sql);
		$proveedores=mysqli_fetch_row($result);
		echo "<center><h5>".($proveedores[0]).("</h5></center>");  

 ?>
</p>
        </div>
        <div class="card-footer text-muted">

        </div>
      </div>
    </div>

    <div class="col-sm-2 ">
      <div class="card">
        <div class="card-header">
<img src="librerias/img/categorias.png" align="center"  class="card-img-top center" alt="...">
        </div>
        <div class="card-block">
         <center><h5 class="card-title center">Categorias Existentes</h5></center>
          <p class="card-text"></p>
   
<?php

		$sql1="SELECT count(*)  from categoria";
		$result1=mysqli_query($conexion,$sql1);
		$categorias=mysqli_fetch_row($result1);
		echo "<center><h5>".($categorias[0]).("</h5></center>");  

 ?>
</p>
        </div>
        <div class="card-footer text-muted">

        </div>
      </div>
    </div>     

     <div class="col-sm-2">
      <div class="card">
        <div class="card-header">
<img src="librerias/img/usuarios.png" align="center"  class="card-img-top center mx-auto" alt="Card image cap">
        </div>
        <div class="card-block">
       <center><h5 class="card-title center">Usuarios Existentes</h5></center>
    	<p class="card-text">
          <?php

		$sql2="SELECT count(*) from usuario where nivel_usuario=2";
		$result2=mysqli_query($conexion,$sql2);
		$usuarios=mysqli_fetch_row($result2);
		echo "<center><h5>".($usuarios[0]).("</h5></center>");  

 ?>
</p>
        </div>
        <div class="card-footer text-muted">

        </div>
      </div>
    </div>
    </div>


  </div>
<br><br><br><br>



	<?php require_once "includes/footer.php";?>

</body>

</html>


<?php  

}else{
	header("location:index.php");
  }
  ?>
