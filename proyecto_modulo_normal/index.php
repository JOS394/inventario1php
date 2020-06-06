   <?php
SESSION_START();

  if(isset($_SESSION['usern'])){
   
  include 'includes/headerLog.php';
  }else{
   include 'includes/header.php';
  }                       
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Inicio</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
<br> 
<div class="container">

<div id="carrusel" class="align-self-center">
  <div id="carouselExampleIndicators" class="carousel slide col-12" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="imagenes/slide1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/slide2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/slider3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="row">
<div class="col-md-5 p-lg-5 mx-auto my-5">
<div class="display-4 font-weight-normal">
  <h1>Productos en promocion</h1>

<p class="lead font-weight-normal">
Contamos con variedad de productos a buen precio!!.</p><div class="align-items-end"><img src="imagenes/utiles.png"></div>
<a class="btn btn-outline-secondary" href="#">Productos</a>
</div>
</div>
<div class="col-md-5 p-lg-5 mx-auto my-5">
<div class="display-4 font-weight-normal">
  <h1>Cuadernos</h1>

<p class="lead font-weight-normal">
Nuevos cuadernos para Iniciar Clases año escolar 2020.</p><div class="align-items-end "><img src="imagenes/cuadernos.png" width="100%"></div>
<a class="btn btn-outline-secondary" href="#">Proximamente</a>
</div>
</div>
</div>


<div class="col-lg-4">


<div class="col-lg-4"></div>
</div>
</div>



</div>
<footer class="bg-dark">
	<?php require_once "includes/footer.php";?>
</footer>
</body>
</html>
<script type="text/javascript">
  $('#carrusel').on('slide.bs.carousel', function () {
  // do something…
})

</script>