<?php  

SESSION_START();
 if(isset($_SESSION['user'])){

  ?>
<!DOCTYPE html>
	
<head><meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php require_once "scripts.php";  require_once "includes/header.php"; require_once "clases/conexion.php";

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
	
	<div class="container-fluid">
		<div class="row ">
			<div class="col-16 mx-auto">
				<div class="card text-center">
					<div class="card-header">
					Tabla Productos
					</div>
					<div class="card-body ">
							<span class="btn btn-primary " data-toggle="modal" data-target="#addnewproductomodal" >
							Agregar nuevo producto <span class="fas fa-plus-square"></span>
						</span>
						<hr>
					<div style="width: initial;" id="tablaDatatable">


					</div>
					<div class="card-footer text-muted">
						by JOS3
					</div>
				</div>
			</div>
		</div>
	</div>





<!-- Modal o ventana de nuevo producto -->
<div class="modal fade" id="addnewproductomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content col-14 mx-auto">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php 
			$obj= new conectar();
			$conexion=$obj->conexion();
			$queryproveedor=mysqli_query($conexion,"SELECT id_proveedor,nombre_prov from proveedor"); 
			$querycategoria=mysqli_query($conexion,"SELECT id_categoria,nombre_cat from categoria");	?>

<form method="POST" class="form-horizontal" role="form" id="frmproducto" enctype="multipart/form-data">
   <div class="col-md-6">
 <div class="form-group row">

                              <label class="col-sm-2 col-sm-2 col-form-label">Foto</label>
                              <div class="col-sm-10">
                              	   	<input type="file" id="image" name="image" />

                              	   <img id="preview2" class="fileinput-preview img-thumbnail thumbnail small" data-trigger="fileinput" style="width: 200px; height: 150px;">                              								
                              </div>
                          </div>
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm-8" id="Nombre" name="Nombre"  
		onkeypress="return validar(event)">
		 <br>
		<label>Existencia</label>
		<input type="number" class="form-control col-xs-3" id="Existencia" name="Existencia">
			<br>
 				<div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                 	<label>Precio </label>
									<input type="number" class="form-control input-sm" id="Precio" name="Precio">
                                </div>
                          </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                            <label>Costo</label>
							<input type="number" class="form-control input-sm" id="Costo" name="Costo">    </div>
                            </div>
                        </div>
                         </div>
                     </div>
                     <br>

		<label>Marca</label>
		<input type="text" class="form-control input-sm-2" id="Marca" name="Marca" maxlength="20" onkeypress="return validar(event)">
		</div>
		 <br>
		<div class="col-md-6 ml-1">
		<label>Descripcion</label>
		 <textarea class="form-control input-sm" id="Descripcion" name="Descripcion" maxlength="100"></textarea>
		 <br>
		<label>Estatus</label>
		<select class="form-control form-control-lg col-sm-6" id="status" name="status">
  		<option value="1">Disponible</option>
  		<option value="2">Agotado</option>
		</select>
	
		<label>Proveedor</label>
		<select class="form-control form-control-lg col-sm-8" id="Proveedor" name="Proveedor">
		<?php while ($proveedor = mysqli_fetch_array($queryproveedor))
		{  ?>
			<option value="<?php echo $proveedor['id_proveedor'] ?>"><?php echo $proveedor['nombre_prov'] ?></option>
		<?php } ?>
		</select>	
				<label>Categoria</label>
		<select class="form-control form-control-lg col-sm-8" id="Categoria" name="Categoria">
		<?php while ($categoria = mysqli_fetch_array($querycategoria))
		{  ?>
			<option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nombre_cat'] ?></option>
		<?php } ?>
		</select>
		</div>
       <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary upload" id="btnAgregarNuevo">Agregar Nuevo</button>
       </form>
      </div>
    </div>
  </div>
</div>
</div>




<!-- Modal o ventana de editar producto -->
<div class="modal fade" id="editproductomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content col-14 mx-auto">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresar nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php 
			$obj= new conectar();
			$conexion=$obj->conexion();
			$queryproveedor=mysqli_query($conexion,"SELECT id_proveedor,nombre_prov from proveedor"); 
			$querycategoria=mysqli_query($conexion,"SELECT id_categoria,nombre_cat from categoria");	?>

<form method="POST" class="form-horizontal" role="form" id="frmproductoE" enctype="multipart/form-data">
	<input type="text" hidden="" id="idproducto" name="idproducto" >
   <div class="col-md-6">
 <div class="form-group row">

                              <label class="col-sm-2 col-sm-2 col-form-label">Foto</label>
                              <div class="col-sm-10">
                              	   	<input type='file' id="image2" name="image2" />

                              	   <img id="preview2" class="fileinput-preview img-thumbnail thumbnail small" data-trigger="fileinput" style="width: 200px; height: 150px;">                              								
                              </div>
                          </div>
       	<label>Nombre</label>
		<input type="text" class="form-control input-sm-8" id="NombreE" name="NombreE" maxlength="50" onkeypress="return validar(event)">
		 <br>
		<label>Existencia</label>
		<input type="number" class="form-control col-xs-3" id="ExistenciaE" name="ExistenciaE">
			<br>
 				<div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                 	<label>Precio </label>
									<input type="number" class="form-control input-sm" id="PrecioE" name="PrecioE">
                                </div>
                          </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                            <label>Costo</label>
							<input type="number" class="form-control input-sm" id="CostoE" name="CostoE">    </div>
                            </div>
                        </div>
                         </div>
                     </div>
                     <br>

		<label>Marca</label>
		<input type="text" class="form-control input-sm-2" id="MarcaE" name="MarcaE" maxlength="20" onkeypress="return validar(event)">
		</div>
		 <br>
		<div class="col-md-6 ml-1">
		<label>Descripcion</label>
		 <textarea class="form-control input-sm" id="DescripcionE" name="DescripcionE" maxlength="100" onkeypress="return validar(event)"></textarea>
		 <br>
		<label>Estatus</label>
		<select class="form-control form-control-lg col-sm-6" id="statusE" name="statusE">
  		<option value="1">Disponible</option>
  		<option value="2">Agotado</option>
		</select>
	
		<label>Proveedor</label>
		<select class="form-control form-control-lg col-sm-8" id="ProveedorE" name="ProveedorE">
		<?php while ($proveedor = mysqli_fetch_array($queryproveedor))
		{  ?>
			<option value="<?php echo $proveedor['id_proveedor'] ?>"><?php echo $proveedor['nombre_prov'] ?></option>
		<?php } ?>
		</select>	
				<label>Categoria</label>
		<select class="form-control form-control-lg col-sm-8" id="CategoriaE" name="CategoriaE">
		<?php while ($categoria = mysqli_fetch_array($querycategoria))
		{  ?>
			<option value="<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nombre_cat'] ?></option>
		<?php } ?>
		</select>
		</div>
       <br>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary upload2" id="btnActualizar">Guardar Cambios</button>
       </form>
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
			datos=$('#frmproducto').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregarproducto.php",
				success:function(r){
					if(r==1){
						
						$("#addnewproductomodal").modal("hide");
						$('#frmproducto')[0].reset();	
					
						
						//mensaje cargado producto sweet alert imagen


						let timerInterval
						Swal.fire({
						  title: 'Se esta insertando el producto..!',
						  html: '',
						  timer: 2000,
						  timerProgressBar: true,
						  onBeforeOpen: () => {
						    Swal.showLoading()
						    timerInterval = setInterval(() => {
						     
						    }, 100)
						  },
						  onClose: () => {
						    clearInterval(timerInterval)
						  }
						}).then((result) => {
						  if (
						    /* Read more about handling dismissals below */
						    result.dismiss === Swal.DismissReason.timer
						  ) {
						    console.log('I was closed by the timer')
						    $('#tablaDatatable').load('tablas/tablaproductos.php'); // eslint-disable-line
						  }
						})

					}else{
						alertify.error("fallo al agregar")
					}						
				}

			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmproductoE').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizarproducto.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tablas/tablaproductos.php');
						$("#editproductomodal").modal("hide");
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
		$('#tablaDatatable').load('tablas/tablaproductos.php');
	});
</script>

<!-- Editar registro tabla -->
<script type="text/javascript">
	function agregaFrmActualizar(idproducto){
		$.ajax({
			type:"POST",
			data:"idproducto=" + idproducto,
			url:"procesos/obtenerdatosproducto.php",
			success:function(r){
			datos=jQuery.parseJSON(r);
			$('#idproducto').val(datos['id_prod']);
			$('#NombreE').val(datos['nombre_prod']);
			$('#ExistenciaE').val(datos['existencia']);
			$('#PrecioE').val(datos['precio']);
			$('#CostoE').val(datos['costo']);
			$('#MarcaE').val(datos['marca']);
			$('#DescripcionE').val(datos['Descripcion']);
			$('#statusE').val(datos['status']);
			$('#ProveedorE').val(datos['id_proveedor']);
			$('#CategoriaE').val(datos['id_categoria']);
			}
		});
	}

	function eliminarDatosProducto(idproducto){
		alertify.confirm('Eliminar un producto', '¿Seguro de eliminar este producto?', function(){ 

			$.ajax({
				type:"POST",
				data:"idproducto=" + idproducto,
				url:"procesos/eliminarproducto.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tablas/tablaproductos.php');
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

	function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  readURL(this);
});

$(document).ready(function() {
    $(".upload").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });
}


);


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#preview2').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image2").change(function() {
  readURL(this);
});

$(document).ready(function() {
    $(".upload2").on('click', function() {
        var formData = new FormData();
        var files = $('#image2')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'uploadE.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });
}


);






</script>



<?php  

}else{
	header("location:index.php");
  }
  ?>