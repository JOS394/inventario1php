

<?php require_once "scripts.php";

 ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-primary">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="inicio.php">Pagina Principal</a>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

<li class="nav-item ">
  
        <a class="nav-link" href="indexproductos.php">Productos<span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="indexcategoria.php">Categoria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexproveedor.php">Proveedor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexusuario.php">Usuarios</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
   <button class="btn btn-outline-success my-2 my-sm-0" ><?php echo $_SESSION["user"];?></button>
     
      <button class="btn btn-outline-light my-2 my-sm-0" type="button" id="Btncerrar" target="logBtncerrar">Cerrar Sesion</button>
     
    </form>
  </div>
</nav>
<script type="text/javascript">
$( "#Btncerrar" ).click(function() {
          
          let timerInterval
        Swal.fire({
          position: 'top-end',
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
