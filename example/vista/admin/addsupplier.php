<?php
	include('session.php');

	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	mysqli_query($conn,"insert into user (username, password, access) values ('$username', '$password', '3')");
	$userid=mysqli_insert_id($conn);

	mysqli_query($conn,"insert into provedor (userid, company_name, company_address, contact) values ('$userid', '$name', '$address', '$contact')");

	?>
		<script>
			window.alert('¡Proveedor agregado con éxito!');
			window.history.back();
		</script>
	<?php
?>
