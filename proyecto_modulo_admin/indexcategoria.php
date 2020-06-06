<?php  


SESSION_START();
 if(isset($_SESSION['user'])){

  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php require_once "scripts.php";  
	require_once "includes/header.php";
	 ?>
	<script src="librerias/validation/BootstrapValidation.js"></script>
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
	
	<div class="container col-auto mx-auto">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card text-center ">
					<div class="card-header ">
					<h5>Tabla Categoria</h5>
					</div>
					<div class="card-body ">
							<span class="btn btn-success " data-toggle="modal" data-target="#addnewcategoriamodal">
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

<!-- Modal o ventana de nueva categoria -->
<div class="modal" id="addnewcategoriamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nueva categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <form id="frmcategoria">
       	
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm" id="Nombre" name="Nombre" maxlength="50" onkeypress="return validar(event)" required/>
		
		
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
<div class="modal fade" id="editcategoriamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form id="frmcategoriaE">
       	<input type="text" hidden="" id="idcategoria" name="idcategoria" minlength="5" maxlength="20" onkeypress="return validar(event)">
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm" id="NombreE" name="NombreE"  maxlength="50" onkeypress="return validar(event)" required=""E>

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizar" >Guardar Cambios</button>
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
			datos=$('#frmcategoria').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarcategoria.php",
				success:function(r){
					if(r==1){
						alertify.success("agregado con exito");
						$('#frmcategoria')[0].reset();
						$("#addnewcategoriamodal").modal("hide");
						$('#tablaDatatable').load('tablas/tablacategoria.php');
						
					}else{
						alertify.error("fallo al agregar")
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmcategoriaE').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizarcategoria.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablas/tablacategoria.php');
						 $("#editcategoriamodal").modal("hide");
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
		$('#tablaDatatable').load('tablas/tablacategoria.php');
	});
</script>

<!-- Editar registro tabla -->
<script type="text/javascript">
	function agregaFrmActualizar(idcategoria){
		$.ajax({
			type:"POST",
			data:"idcategoria=" + idcategoria,
			url:"procesos/obtenerdatoscategoria.php",
			success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idcategoria').val(datos['id_categoria']);
			$('#NombreE').val(datos['nombre_cat']);

			}
		});
	}
	function eliminarDatosCategoria(idcategoria){
		alertify.confirm('Eliminar una categoria', '¿Seguro de eliminar esta categoria?', function(){ 

			$.ajax({
				type:"POST",
				data:"idcategoria=" + idcategoria,
				url:"procesos/eliminarcategoria.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tablas/tablacategoria.php');
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
