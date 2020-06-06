<?php  include_once ("scripts.php") ?>


<?php  session_start();

		if (isset($_SESSION["usuario"])) {
			if ($_SESSION["usuario"]["tipo"]==1) {
				header("location:admin.php");
			}
			
		}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin </title>
</head>
<body>
<label class="col-sm-2 col-form-label col-form-label-sm">Bienvenido Administrador</label>
</body>
</html>