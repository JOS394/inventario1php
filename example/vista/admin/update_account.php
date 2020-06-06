<?php

	include('session.php');

	$cpass=md5($_POST['cpass']);
	$repass=md5($_POST['repass']);

	if($cpass!=$repass){
		?>
		<script>
			window.alert('Las contraseñas requeridas no coinciden. ¡Cuenta no actualizada!');
			window.history.back();
		</script>
		<?php
	}
	elseif($cpass!=$srow['password']){
		?>
		<script>
			window.alert('La contraseña actual no coincide. ¡Cuenta no actualizada!');
			window.history.back();
		</script>
		<?php
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];

		if($password==$srow['password']){
			$fipassword=$password;
		}
		else{
			$fipassword=md5($password);
		}
		mysqli_query($conn,"update `user` set username='$username', password='$fipassword' where userid='".$_SESSION['id']."'");
		mysqli_query($conn,"insert into activitylog (userid,action,activity_date) values ('".$_SESSION['id']."','Update account',NOW())");
		?>
		<script>
			window.alert('Cuenta actualizada con éxito!');
			window.history.back();
		</script>
		<?php
	}

?>
