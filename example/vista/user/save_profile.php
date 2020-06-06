<?php
	include('session.php');
	$uid=$_GET['id'];

	$name= $_POST['cname'];
	$address= $_POST['address'];
	$contact= $_POST['contact'];

	mysqli_query($conn,"update cliente set customer_name='$name', address='$address', contact='$contact' where userid='$uid'");

	?>
		<script>
			window.alert('Perfil Actualizado Con Exito!');
			window.history.back();
		</script>
	<?php

?>
