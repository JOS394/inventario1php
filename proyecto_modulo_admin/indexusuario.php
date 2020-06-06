<?php  


SESSION_START();
 if(isset($_SESSION['user'])){

  ?>
<!DOCTYPE html>
<html>
<head>


<meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Usuarios</title>
	<?php require_once "scripts.php"; 
		  require_once "includes/header.php"; 
		 ?>
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
	<div class="container col-auto mx-auto" >
		<div class="row" >
			<div class="col-auto mx-auto">
				<div class="card text-center">
					<div class="card-header">
					<h2>Tabla Usuario</h2>
					</div>
					<div class="card-body ">
							<span class="btn btn-primary " data-toggle="modal" data-target="#addnewusuariomodal">
							Agregar nuevo <span class="fas fa-plus-square"></span>
						</span>
						<hr>
					<div id="tablaDatatable">
					</div>
					<div class="card-footer text-muted">
						by Jose Wilfredo España
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal o ventana de nuevo usuario -->
<div class="modal fade" id="addnewusuariomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <form id="frmUsuario">
       	
       	<label>Nombre usuario</label>
		<input type="text" class="form-control input-sm col-sm-7" id="NombreUsuario" name="NombreUsuario" maxlength="50" >
		
		<label>Email</label>
		<input type="email"  class="form-control input-sm col-sm-9"  id="Email" name="Email" placeholder="name@example.com">
		
		<label>Password</label>
		 <input type="password" class="form-control input-sm col-sm-7" id="Password" name="Password" placeholder="Password">
		 
		<label>Nivel de Usuario</label>
		<select class="form-control form-control-lg col-sm-5" id="level" name="level">
  <option value="1">Administrador</option>
  <option value="2">Usuario Normal</option>
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
<div class="modal fade" id="editUsuariomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <form id="frmusuarioE">
        <input type="text" hidden="" id="idusuario" name="idusuario" >
       	<label>Nombre usuario</label>
		<input type="text" class="form-control input-sm col-sm-7" id="NombreUsuarioE" name="NombreUsuarioE"maxlength="20" >
		
		<label>Email</label>
		<input type="email"  class="form-control input-sm col-sm-9"  id="EmailE" name="EmailE" placeholder="name@example.com">
		
		<label>Password</label>
		 <input type="text" class="form-control input-sm col-sm-7" id="PasswordE" name="PasswordE" placeholder="Password">
		 
		<label>Nivel de Usuario</label>
		<select class="form-control form-control-lg col-sm-5" id="levelE" name="levelE">
  <option value="1">Administrador</option>
  <option value="2">Usuario Normal</option>
</select>
		
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizar"  >Guardar Cambios</button>
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
			datos=$('#frmUsuario').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarusuario.php",
				success:function(r){
					if(r==1){
						alertify.success("agregado con exito");
						$('#frmUsuario')[0].reset();
						$("#addnewusuariomodal").modal("hide");
						$('#tablaDatatable').load('tablas/tablausuario.php');
						
					}else{
						alertify.error("fallo al agregar")
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmusuarioE').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizarusuario.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablas/tablausuario.php');
						 $("#editUsuariomodal").modal("hide");
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
		$('#tablaDatatable').load('tablas/tablausuario.php');
	});
</script>

<!-- Editar registro tabla -->
<script type="text/javascript">
	function agregaFrmActualizar(idusuario){
		$.ajax({
			type:"POST",
			data:"idusuario=" + idusuario,
			url:"procesos/obtenerdatosusuario.php",
			success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idusuario').val(datos['id_usuario']);
			$('#NombreUsuarioE').val(datos['nombre_usuario']);
			$('#EmailE').val(datos['email']);
			$('#PasswordE').val(datos['password']);
			$('#levelE').val(datos['nivel_usuario']);
			}
		});
	}
	function eliminarDatosUsuario(idusuario){
		alertify.confirm('Eliminar un Usuario', '¿Seguro de eliminar este usuario?', function(){ 

			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"procesos/eliminarusuario.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tablas/tablausuario.php');
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