

<?php require_once "scripts.php";
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="#"><span class="fas fa-home fa-2x fa-lg"></span>Home</a>
  <div class="navbar-header">
    </div>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    </ul>

        <ul class="nav navbar-nav navbar-right ">

      <li><a href="#"><button class="btn btn-success my-2 my-sm-0" type="button" ><span class="fas fa-user fa-lg"></span><?php echo $_SESSION["usern"];?></button></a></li>
      <li><a href="login/salir.php"> <button class="btn btn-light my-2 my-sm-0 y-sm-0" type="button" id="Btncerrar" class="Btncerrar">  <span class="fas fa-door-open fa-lg"></span>Cerrar Sesion</button></a></li>
      
    </ul>
  </div>

</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand active" href="inicio.php">Pagina Principal</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          
      <li class="nav-item">
        <a class="nav-link" href="prod.php">Productos</a>
      </li>
  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
    </form>
  </div>
</nav>

<script type="text/javascript">
$( "#Btncerrar" ).click(function() {
          
          let timerInterval
        Swal.fire({
          title: 'Cerrando  Sesion <br> Espera un momento',
          timer: 1000,
          popup: 'animated hinge',
          onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              Swal.getContent().querySelector('b')
                .textContent = Swal.getTimerLeft()
            }, 100)
          },
          onClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.timer
          ) {
            console.log('I was closed by the timer')
          window.location="login/salir.php";
          }
        })
});
</script>

