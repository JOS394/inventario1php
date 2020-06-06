<?php
require_once ("../clases/conexion.php");
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id_prod,nombre_prod,existencia,precio,costo,marca,descripcion, if(status=1, 'Disponible', 'Agotado') as status,
prove.nombre_prov,cate.nombre_cat from producto pro 
join proveedor prove on prove.id_proveedor=pro.id_proveedor 
join categoria cate on cate.id_categoria=pro.id_categoria";


$result=mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered " id="iddatatable">
		<thead style="background-color: #5882FA;color: white; font-weight: bold;">
			<tr>
			<td >ID</td>
			<td>Nombre Producto</td>
			<td>Existencia</td>
			<td>Precio</td>
			<td>Costo</td>
			<td>Marca</td>
			<td>Descripcion</td>
			<td>Status</td>
			<td>Proveedor</td>
			<td>Categoria</td>
			<td>Acciones</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
		
			<td >ID</td>
			<td>Nombre Producto</td>
			<td>Existencia</td>
			<td>Precio</td>
			<td>Costo</td>
			<td>Marca</td>
			<td>Descripcion</td>
			<td>Status</td>
			<td>Proveedor</td>
			<td>Categoria</td>
			<td>Acciones</td>
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
	<td><?php echo $mostrar[5]  ?></td>
	<td><?php echo $mostrar[6]  ?></td>
	<td><?php echo $mostrar[7]  ?></td> 
	<td><?php echo $mostrar[8]  ?></td>
	<td><?php echo $mostrar[9]  ?></td>
	<td><span class="btn btn-success btn-sm" data-toggle="modal" data-target="#editproductomodal" id="btnActualizar"  onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')"><i class="fas fa-edit"></i></span>
		<br><br>
		<span class="btn btn-danger btn-sm" onclick="eliminarDatosProducto('<?php echo $mostrar[0] ?>')" ><i class="far fa-trash-alt"></i></span>

	</td>
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
