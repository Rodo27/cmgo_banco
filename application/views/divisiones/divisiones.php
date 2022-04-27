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
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR DIVISIÓN</b></button><br><br><br>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Especialidad</b></span>
						  	<select class="form-control" id="id_especialidad" name="id_especialidad" onchange="getTabla()">
						  		<option value="TODAS">TODAS</option>
						  		<?=$especialidades;?>
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
	        	<h4 class="modal-title"><b>AGREGAR DIVISIÓN</b></h4>
	      	</div>
	      	<?php echo form_open('Divisiones/addDivision',array('id'=>'addDivision'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<select class="form-control" id="add_id_especialidad" name="add_id_especialidad" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<input type="text" class="form-control" id="add_division" name="add_division" required>
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
	        	<h4 class="modal-title"><b>EDITAR DIVISIÓN</b></h4>
	      	</div>
	      	<?php echo form_open('Divisiones/updDivision',array('id'=>'updDivision'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<select class="form-control" id="upd_id_especialidad" name="upd_id_especialidad" required>
							  		<?=$especialidades;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<input type="text" class="form-control" id="upd_division" name="upd_division" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert2"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" id="upd_id_division" name="upd_id_division" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<?php echo form_open('Divisiones/getTabla',array('id'=>'getTabla'));?>
<?php echo form_close();?>

<?php echo form_open('Divisiones/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Divisiones/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>