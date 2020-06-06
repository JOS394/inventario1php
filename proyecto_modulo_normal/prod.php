<?php
SESSION_START();
if(isset($_SESSION['usern'])){
   
  include 'includes/headerLog.php';
  }else{
   include 'includes/header.php';
  }
  ?>
  <body>
  	
<br><br>
	<div class="container-fluid">

  <?php     
require_once ("clases/conexion.php");
require_once "scripts.php";

$obj= new conectar();
$conexion=$obj->conexion();
?>


<?php

$sql= "SELECT * from producto ";
$result=mysqli_query($conexion,$sql);
$ver=mysqli_fetch_row($result);

      $p=0;
while ($row=$result->fetch_assoc()) {
	# code...

	echo "<div class='card-deck'>";
$nombre= $row['nombre_prod'];
	
	$precio=$row['precio'];
	$des=$row['Descripcion'];
	$ruta=$row['fotoRuta'];
	$mar=$row['marca'];
	$existencia=$row['existencia'];
	//echo $ruta;
	


echo "
  <div class='card' >
  <img src='../proyecto_modulo_admin/$ruta' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$nombre</h5>
    <p class='card-text'>$des<br> $ $precio</p>
   
  </div>
</div>



";

	# code...
$row=$result->fetch_assoc();
$nombre= $row['nombre_prod'];
if($nombre==""){echo "<div class='card' ><div class='card-body'></div>
</div>
<div class='card' ><div class='card-body'></div>
</div>
<div class='card' ><div class='card-body'></div>
</div>
";break;}
	
	$precio=$row['precio'];
	$des=$row['Descripcion']."<br>";
	$ruta=$row['fotoRuta'];$mar=$row['marca'];
	$existencia=$row['existencia'];
	//echo $ruta;
	


echo "
  <div class='card' >
  <img src='../proyecto_modulo_admin/$ruta' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$nombre</h5>
    <p class='card-text'>$des <br> $ $precio</p>
  </div>
</div>


";

$row=$result->fetch_assoc();
$nombre= $row['nombre_prod'];if($nombre==""){echo "<div class='card' ><div class='card-body'></div>
</div>
<div class='card' ><div class='card-body'></div>
</div>

";break;}
	
	$precio=$row['precio'];
	$des=$row['Descripcion']."<br>";
	$ruta=$row['fotoRuta'];$mar=$row['marca'];
	$existencia=$row['existencia'];
	//echo $ruta;
	


echo "
  <div class='card' >
  <img src='../proyecto_modulo_admin/$ruta' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$nombre</h5>
    <p class='card-text'>$des <br> $ $precio</p>
  </div>
</div>
";

$row=$result->fetch_assoc();

$nombre= $row['nombre_prod'];
if($nombre==""){echo "<div class='card' ><div class='card-body'></div>
</div>

";break;}
	
	$precio=$row['precio'];
	$des=$row['Descripcion']."<br>";
	$ruta=$row['fotoRuta'];$mar=$row['marca'];
	$existencia=$row['existencia'];
	//echo $ruta;
	


echo "<div class='card' >
  <img src='../proyecto_modulo_admin/$ruta' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$nombre</h5>
    <p class='card-text'>$des <br> $ $precio.</p>
  </div>
</div></div><br>";


}


           
  ?>
</div>
<br> <br>
<?php require_once "includes/footer.php";?>
  </body>
