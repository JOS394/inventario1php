<!-- Eliminar provedor -->
    <div class="modal fade" id="del_<?php echo $sqrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Eliminar proveedor</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from provedor where userid='".$sqrow['userid']."'");
						$b=mysqli_fetch_array($a);
					?>
                    <h5><center>nombre de empresa: <strong><?php echo ucwords($b['company_name']); ?></strong></center></h5>
					<form role="form" method="POST" action="deletesupplier.php<?php echo '?id='.$sqrow['userid']; ?>">
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
					</form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Editar cliente-->
    <div class="modal fade" id="edit_<?php echo $sqrow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar proveedor</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<?php
						$a=mysqli_query($conn,"select * from provedor left join user on user.userid=provedor.userid where provedor.userid='".$sqrow['userid']."'");
						$b=mysqli_fetch_array($a);
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="edit_supplier.php<?php echo '?id='.$sqrow['userid']; ?>">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Empresa:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['company_name']); ?>" class="form-control" name="name">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Direccion:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['company_address']); ?>" class="form-control" name="address">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contatos:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['contact'] ?>" class="form-control" name="contact">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Nombre Usuario:</span>
                            <input type="text" style="width:400px;" value="<?php echo $b['username'] ?>" class="form-control" name="username">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Contraseña:</span>
                            <input type="password" style="width:400px;" value="<?php echo $b['password'] ?>" class="form-control" name="password">
                        </div>
						<div style="height:10px;"></div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Actualizar</button>
					</form>
                </div>
        </div>
    </div>
<!-- /.modal -->
