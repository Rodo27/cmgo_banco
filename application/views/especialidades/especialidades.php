<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$title;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR ESPECIALIDAD</b></button><br><br><br>
					</div>
					<div class="col-xs-12">
						<?=$tabla;?>	
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
	        	<h4 class="modal-title"><b>AGREGAR ESPECIALIDAD</b></h4>
	      	</div>
	      	<?php echo form_open('Especialidades/addEspecialidad',array('id'=>'addEspecialidad'));?>
	      		<div class="modal-body">
	      			<div class="row">
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<input type="text" class="form-control" id="especialidad" name="especialidad" required>
							</div>
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
	        	<h4 class="modal-title"><b>EDITAR ESPECIALIDAD</b></h4>
	      	</div>
	      	<?php echo form_open('Especialidades/addEspecialidad',array('id'=>'addEspecialidad'));?>
	      		<div class="modal-body">
	      			<div class="row">
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Especialidad</b></span>
							  	<input type="text" class="form-control" id="upd_especialidad" name="upd_especialidad" required>
							</div>
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

<?php echo form_open('Especialidades/addRow',array('id'=>'addRow'));?>
<?php echo form_close();?>

<?php echo form_open('Especialidades/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Especialidades/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>