<!DOCTYPE html>
<html>
<head>


	<title>..::Login::..</title>
	<meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="librerias/bootstrap4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/sweetAlert/css/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="librerias/sweetAlert/css/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="librerias/animate.css">
</head>
<body class="bg-dark py-4 " style="background-image: url('librerias/img/bg1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	
	<div class="container py-5">
		<div class="row">
			<div class="col-md-6 mx-auto">
				<div class="card">
					<div class="card-header py-1">
						<h1 class="text-center">Login</h1>
					</div>
					<div class="card-body">
						<div style="text-align: center;">
						<img src="login/img/login.png" height="90">
						<p></p>
					</div>
							<div class="form-label-group mb-4">
								<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
							</div>
							<div class="form-label-group mb-4">
								<input type="password" name="password" id="password" class="form-control" placeholder="Contrase&ntilde;a">
							</div>
							<div class="alert alert-danger d-none mb-4" role="alert" id="mensaje">
								<span>Error</span>
							</div>
							<span class="btn btn-primary btn-lg btn-block mb-4" id="entrarSistema">Entrar</span>
							<p class="text-muted text-center">
								By Jose España&copy; 2019
							</p>
					</div>
				</div>
			</div>
		</div>

</div>
</body>
<script src="librerias/jquery/jquery-3.2.1.min.js"></script>
<script src="librerias/alertify/alertify.js"></script>
<script src="librerias/bootstrap4/js/bootstrap.min.js"></script>
<script src="librerias/sweetAlert/js/sweetalert2.all.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if (($('#usuario').val()=="") && ($('#password').val()=="")){
Swal.fire({
  position: 'top-center',
  type: 'error',
  title: 'No se permiten campos vacios',
  showConfirmButton: false,
  timer: 1400
})
				return false;
			}else if ($('#usuario').val()=="") {
				  Swal.fire({
				  position: 'top-center',
				  type: 'error',
				  title: 'Debes Ingresar Usuario',
				  showConfirmButton: false,
				  timer: 1400
				})
				return false;
			}else if($('#password').val()==""){
				  Swal.fire({
				  position: 'top-center',
				  type: 'error',
				  title: 'Debes Ingresar contraseña',
				  showConfirmButton: false,
				  timer: 1400
				})
				return false;
			}
			cadena="usuario=" + $('#usuario').val() + "&password=" + $('#password').val();

			$.ajax({
				type:"POST",
				url: "login/login.php",
				data:cadena,
				success:function(r){
				if (r==1) {
					

				let timerInterval
				Swal.fire({
				  title: 'Iniciando Sesion',
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
					window.location="inicio.php";
				  }
				})

				}else{

				  Swal.fire({
				  position: 'top-center',
				  type: 'error',
				  title: 'Fallo de sesion<br>vuelve a intentarlo',

				  showConfirmButton: false,
				  timer: 1300
				})

				}
			}

			})
		});
	});
</script>
</html>


