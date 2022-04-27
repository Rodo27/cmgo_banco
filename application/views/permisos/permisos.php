<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$title;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR USUARIO</b></button><br><br><br>
					</div>
					<div class="col-sm-12">

						<table class="table table-striped table-condensed" id="tabla_divisiones">
							<thead>
								<th>Usuario</th>
								<th>Correo</th>
								<th>Comité</th>
								<th>Rol</th>
								<th></th>
							</thead>
							<tbody>
								<?php
									foreach($usuarios as $value){
										echo '
										<tr>
											<td>'.$value["usuario"].'</td>
										    <td>'.$value['correo'].'</td>
										    <td>'.$value['comite'].'</td>
										    <td>'.$value['rol'].'</td>
										    <td>
										    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onclick="getRow('.$value['id_usuario'].')"></i>
										    	<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_usuario'].');"></i>
										    </td>
										</tr>';
									}
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal1">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>AGREGAR USUARIO</b></h4>
	      	</div>
	      	<?php echo form_open('Permisos/addUser',array('id'=>'addUser'));?>
	      		<div class="modal-body">
	      			<div class="row">

	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>USUARIO</b></span>
							  	<input type="text" class="form-control" id="add_usuario" name="add_usuario" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>CORREO</b></span>
							  	<input type="email" class="form-control" id="add_correo" name="add_correo" required>
							</div>
						</div>
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>COMITÉ</b></span>
							  	<select class="form-control" id="add_cc" name="add_cc" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>ROL</b></span>
							  	<select class="form-control" id="add_rol" name="add_rol" required>
							  		<option value="admin">Admin</option>
							  		<option value="medico">medico</option>
							  	</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert1"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal2">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>EDITAR USUARIO</b></h4>
	      	</div>
	      	<?php echo form_open('Permisos/updUser',array('id'=>'updUser'));?>
	      		<div class="modal-body">
	      			<div class="row">

	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>USUARIO</b></span>
							  	<input type="text" class="form-control" id="upd_usuario" name="upd_usuario" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>CORREO</b></span>
							  	<input type="email" class="form-control" id="upd_correo" name="upd_correo" required>
							</div>
						</div>
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>COMITÉ</b></span>
							  	<select class="form-control" id="upd_cc" name="upd_cc" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>ROL</b></span>
							  	<select class="form-control" id="upd_rol" name="upd_rol" required>
							  		<option value="admin">Admin</option>
							  		<option value="medico">medico</option>
							  	</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert2"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_id_usuario" id="upd_id_usuario" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<?php echo form_open('Permisos/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Permisos/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>