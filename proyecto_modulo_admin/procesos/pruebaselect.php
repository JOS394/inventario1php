     <?php include_once "../clases/conexion.php";
			$obj= new conectar();
			$conexion=$obj->conexion();
			$query=mysqli_query($conexion,"SELECT id_proveedor,nombre_prov from proveedor"); 
			$query2=mysqli_query($conexion,"SELECT id_categoria,nombre_cat from categoria"); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
		<label>Proveedor</label>
		<select class="form-control form-control-lg col-sm-4" id="Proveedor" name="Proveedor">
		<?php while ($datos = mysqli_fetch_array($query))
		{  ?>
			<option value="1"><?php echo $datos['nombre_prov'] ?></option>
		<?php } ?>
		</select>	

				<label>Proveedor</label>
		<select class="form-control form-control-lg col-sm-4" id="Proveedor" name="Proveedor">
		<?php while ($datos2 = mysqli_fetch_array($query2))
		{  ?>
			<option value="1"><?php echo $datos2['nombre_cat'] ?></option>
		<?php } ?>
		</select>	
</body>
</html>