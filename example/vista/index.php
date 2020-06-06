<?php include('header.php'); ?>
<?php
	session_start();

	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);

		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
	}
?>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> INGRESAR</center></h2>
		<hr>
		<form method="POST" action="login.php">
		Usuario: <input type="text" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
		<div style="height: 10px;"></div>
		Contraseña: <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>
		<p class="text-center"><a href="/proyectoventas/PLANESUCHITEL/index.html" class="btn btn-danger" role="button">Regresar</a></p>
		<p class="text-center"><a href="/proyectoventas/PLANESUCHITEL/vista/reguistrarUsuario.php" class="btn btn-danger" role="button">Reguistrar</a></p>

		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">

			<center>
			<?php

				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}

			?>

			</center>
		</div>
	</div>
</div>

<?php include('script.php'); ?>
</body>
</html>
