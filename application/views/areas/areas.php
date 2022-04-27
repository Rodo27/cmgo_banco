<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$title;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<br>
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR ÁREA</b></button><br><br><br>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Especialidad</b></span>
						  	<select class="form-control" id="id_especialidad" onchange="getCombo('ADD','TODAS')">
						  		<option value="TODAS">TODAS</option>
						  		<?=$especialidades;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Divisiones</b></span>
						  	<select class="form-control" id="id_division" onchange="getTabla()">
						  	</select>
						</div>
					</div>
					<div class="col-sm-12 hidden-xs"><hr></div>
					<div class="col-sm-12" id="contenedor_tabla"></div>
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
	        	<h4 class="modal-title"><b>AGREGAR ÁREA</b></h4>
	      	</div>
	      	<?php echo form_open('Areas/addArea',array('id'=>'addArea'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<select class="form-control" id="add_id_especialidad" name="add_id_especialidad" onchange="getCombo('UPD')" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Divisiones</b></span>
							  	<select class="form-control" id="add_id_division" name="add_id_division" required>
							  	</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<input type="text" class="form-control" id="add_area" name="add_area" required>
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
	        	<h4 class="modal-title"><b>EDITAR ÁREA</b></h4>
	      	</div>
	      	<?php echo form_open('Areas/updArea',array('id'=>'updArea'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<select class="form-control" id="upd_id_especialidad" name="upd_id_especialidad" onchange="getCombo('AGR')" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Divisiones</b></span>
							  	<select class="form-control" id="upd_id_division" name="upd_id_division" required>
							  	</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<input type="text" class="form-control" id="upd_area" name="upd_area" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert2"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_id_area" id="upd_id_area" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<?php echo form_open('Areas/getTabla',array('id'=>'getTabla'));?>
<?php echo form_close();?>

<?php echo form_open('Areas/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Areas/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<?php echo form_open('Areas/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>