<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);

		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!";
			header('location: index.php');
		}
		else{

		$fusername=$username;

		$password = check_input($_POST["password"]);
		$fpassword=md5($password);

		$query=mysqli_query($conn,"select * from `user` where username='$fusername' and password='$fpassword'");

		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Ingreso Invalido, Intentelo Otra Vez!";
			header('location: index.php');
		}
		else{

			$row=mysqli_fetch_array($query);
			if ($row['access']==1){
				$_SESSION['id']=$row['userid'];
				?>
				<script>
					window.alert('Ingreso Exitoso, Bienvenido Administrador!');
					window.location.href='admin/';
				</script>
				<?php
			}
			elseif ($row['access']==2){
				$_SESSION['id']=$row['userid'];
				?>
				<script>
					window.alert('Ingreso Exitoso, Bienvenido Usuario!');
					window.location.href='user/';
				</script>
				<?php
			}
			else{
				$_SESSION['id']=$row['userid'];
				?>
				<script>
					window.alert('Ingreso Exitoso, Bienvenido Proveedor!');
					window.location.href='supplier/';
				</script>
				<?php
			}
		}

		}
	}
?>
