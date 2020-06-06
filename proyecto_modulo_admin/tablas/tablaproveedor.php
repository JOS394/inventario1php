<?php
require_once ("../clases/conexion.php");
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id_proveedor,nombre_prov,telefono_prov,direccion_prov, if(estatus=1, 'Activo', 'Inactivo') as estatus from proveedor";

$result=mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered " id="iddatatable">
		<thead style="background-color: #5882FA;color: white; font-weight: bold;">
			<tr>
			<td >ID</td>
			<td>Nombre Proveedor</td>
			<td>Telefono Proveedor</td>
			<td>Direccion Proveedor</td>
			<td>Estatus</td>
			<td>Editar</td>
			<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
			<td >ID</td>
			<td>Nombre Proveedor</td>
			<td>Telefono Proveedor</td>
			<td>Direccion Proveedor</td>
			<td>Estatus</td>
			<td>Editar</td>
			<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody >
			<?php
				while ($mostrar=mysqli_fetch_row($result)) {

?>
<tr>
	<td><?php echo $mostrar[0]  ?></td>
	<td><?php echo $mostrar[1]  ?></td>
	<td><?php echo $mostrar[2]  ?></td>
	<td><?php echo $mostrar[3]  ?></td>
	<td><?php echo $mostrar[4]  ?></td>
	<td><span class="btn btn-success btn-sm" data-toggle="modal" data-target="#editproveedormodal" id="btnActualizar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')"><i class="fas fa-edit"></i></span></td>
	<td><span class="btn btn-danger btn-sm" onclick="eliminarDatosProveedor('<?php echo $mostrar[0] ?>')" ><i class="far fa-trash-alt"></i></span></td></td>
</tr>
<?php
}
	?>
		</tbody>
	</table>
</div>
<!-- codigo para paginacion y busqueda -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>