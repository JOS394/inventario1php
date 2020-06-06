<?php  


SESSION_START();
 if(isset($_SESSION['user'])){

  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php require_once "scripts.php";  require_once "includes/header.php"; 

	 ?>
	<link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/all.css">
<script type="text/javascript">
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}
</script>
<script type="text/javascript">
function numeros(nu) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
ppatron = /\d/; // Solo acepta números// 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}
</script>
</head>
<body>
	
	<div class="container ">
		<div class="row ">
			<div class="col-14 mx-14">
				<div class="card text-center">
					<div class="card-header">
					Tabla Proveedor
					</div>
					<div class="card-body ">
							<span class="btn btn-primary " data-toggle="modal" data-target="#addnewproveedormodal">
							Agregar nuevo <span class="fas fa-plus-square"></span>
						</span>
						<hr>
					<div id="tablaDatatable">
					</div>
					<div class="card-footer text-muted">
						by JOS3
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal o ventana de nuevo proveedor -->
<div class="modal fade" id="addnewproveedormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <form id="frmproveedor">
       	
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm" id="Nombre" name="Nombre" maxlength="50" onkeypress="return validar(event)">
		
		<label>Telefono</label>
		<input type="number" class="form-control input-sm" id="Telefono" name="Telefono">
		
		<label>Direccion</label>
		 <textarea class="form-control input-sm" id="Direccion" name="Direccion" maxlength="100" onkeypress="return validar(event)"></textarea>
		 
		<label>Estatus</label>
		<select class="form-control form-control-lg col-sm-4" id="status" name="status">
  <option value="1">Activo</option>
  <option value="2">Inactivo</option>
</select>
		
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAgregarNuevo">Agregar Nuevo</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal o ventana de editar proveedor -->
<div class="modal fade" id="editproveedormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="frmproveedorE">
       	<input type="text" hidden="" id="idproveedor" name="idproveedor" >
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm" id="NombreE" name="NombreE" maxlength="50" onkeypress="return validar(event)">
		
		<label>Telefono</label>
		<input type="number" class="form-control input-sm" id="TelefonoE" name="TelefonoE">
		
		<label>Direccion</label>
		 <textarea class="form-control input-sm" id="DireccionE" name="DireccionE" maxlength="100" onkeypress="return validar(event)"></textarea>
		 
		<label>Estatus</label>
		<select class="form-control form-control-lg col-sm-4" id="statusE" name="statusE">
  <option value="1">Activo</option>
  <option value="2">Inactivo</option>
</select>
		
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizar" >Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal o ventana de nuevo proveedor -->
<div class="modal fade" id="editproveedormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <form id="frmproveedor">
       	
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm" id="Nombre" name="Nombre" maxlength="50" onkeypress="return validar(event)">
		
		<label>Telefono</label>
		<input type="number" class="form-control input-sm" id="Telefono" name="Telefono">
		
		<label>Direccion</label>
		 <textarea class="form-control input-sm" id="Direccion" name="Direccion" maxlength="100" onkeypress="return validar(event)"></textarea>
		 
		<label>Estatus</label>
		<select class="form-control form-control-lg col-sm-4" id="status" name="status">
  <option value="1">Activo</option>
  <option value="2">Inactivo</option>
</select>
		
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAgregarNuevo">Agregar Nuevo</button>
      </div>
    </div>
  </div>
</div>



<?php require_once "includes/footer.php";?>
</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarNuevo').click(function(){
			datos=$('#frmproveedor').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarproveedor.php",
				success:function(r){
					if(r==1){
						alertify.success("agregado con exito");
						$('#frmproveedor')[0].reset();
						$("#addnewproveedormodal").modal("hide");
						$('#tablaDatatable').load('tablas/tablaproveedor.php');
						
					}else{
						alertify.error("fallo al agregar")
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmproveedorE').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizarproveedor.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablas/tablaproveedor.php');
						 $("#editproveedormodal").modal("hide");
						alertify.success("Actualizado con exito");
					}else{
						alertify.error("fallo al Actualizar")
					}
				}
			});
		});
	});

</script>
<!-- Recargar tabla -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tablas/tablaproveedor.php');
	});
</script>

<!-- Editar registro tabla -->
<script type="text/javascript">
	function agregaFrmActualizar(idproveedor){
		$.ajax({
			type:"POST",
			data:"idproveedor=" + idproveedor,
			url:"procesos/obtenerdatosproveedor.php",
			success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idproveedor').val(datos['id_proveedor']);
			$('#NombreE').val(datos['nombre_prov']);
			$('#TelefonoE').val(datos['telefono_prov']);
			$('#DireccionE').val(datos['direccion_prov']);
			$('#statusE').val(datos['estatus']);
			}
		});
	}
	function eliminarDatosProveedor(idproveedor){
		alertify.confirm('Eliminar un proveedor', '¿Seguro de eliminar este proveedor?', function(){ 

			$.ajax({
				type:"POST",
				data:"idproveedor=" + idproveedor,
				url:"procesos/eliminarproveedor.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tablas/tablaproveedor.php');
						alertify.success("Eliminado con exito");
				}else{
					alertify.error("No se pudo eliminar");
				}
				}
			});


	}
                , function(){

                });

	}
</script>
<?php  

}else{
	header("location:index.php");
  }
  ?>