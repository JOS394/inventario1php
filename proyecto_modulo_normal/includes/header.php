

<?php require_once "scripts.php";

 ?>
 <link href="librerias/login.css" rel="stylesheet" id="bootstrap-css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="index.php"><span class="fas fa-home fa-2x fa-lg"></span>Libreria Luigi</a>
  <div class="navbar-header">
    </div>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    </ul>

        <ul class="nav navbar-nav navbar-right ">

      <li><a href="register.php"><button class="btn btn-light my-2 my-sm-0" type="button" id="BtnRegistrarse" target="logBtncerrar">    <span class="fas fa-users fa-lg"></span>Registrarse</button></a></li>

      <li><a href="login.php"  ><button class="btn btn-light my-2 my-sm-0" type="button" id="BtnAcceder" target="BtnAcceder">    <span class="fas fa-sign-in-alt fa-lg"></span>Acceder</button></a></li>
    </ul>
  </div>

</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand active" href="index.php">Pagina Principal</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0\\">
      <li class="nav-item">
        <a class="nav-link" href="prod.php">Productos</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 " type="submit">Search</button>
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

