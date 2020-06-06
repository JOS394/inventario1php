<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Proveedores
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addsupplier"><i class="fa fa-plus-circle"></i> Añadir Proveedor</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="supTable">
                <thead>
                    <tr>
                        <th>Nombre de Empresa</th>
                        <th>Nombre de Usuario</th>
                        <th>Contraseña</th>
						<th>Dirección</th>
                        <th>Datos de Contacto</th>
						<th>Acción</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$sq=mysqli_query($conn,"select * from provedor left join user on user.userid=provedor.userid");
					while($sqrow=mysqli_fetch_array($sq)){
					?>
						<tr>
							<td><?php echo $sqrow['company_name']; ?></td>
							<td><?php echo $sqrow['username']; ?></td>
							<td>*****</td>
							<td><?php echo $sqrow['company_address']; ?></td>
							<td><?php echo $sqrow['contact']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $sqrow['userid']; ?>"><i class="fa fa-edit"></i> Editar</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $sqrow['userid']; ?>"><i class="fa fa-trash"></i> Borrar</button>
								<?php include('supp_butt.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>
