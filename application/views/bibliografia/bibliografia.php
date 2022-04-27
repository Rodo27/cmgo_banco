<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b>BIBLIOGRAFÍAS</b></h4>
				<input type="hidden" id="rol" value="<?=$this->session->rol;?>">
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12 registrar">
						<button class="btn btn-primary pull-right " data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR BIBLIOGRAFÍA</b></button><br><br><br>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="bibliografia_contenedor">	
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
	        	<h4 class="modal-title"><b>AGREGAR BIBLIOGRAFÍA</b></h4>
	      	</div>
	      	<?php echo form_open('Bibliografia/addBibliografia',array('id'=>'addBibliografia'));?>
	      		<div class="modal-body">
	      			<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
						    	<label for="add_bibliografia"><b>BIBLIOGRAFÍA</b></label>
						    	<textarea class="form-control input-sm" id="add_bibliografia" name="add_bibliografia" rows="1" required></textarea>
						  	</div>
						  	<div class="input-group form-group">
							  	<span class="input-group-addon"><b>CAPÍTULO</b></span>
							  	<input type="text" class="form-control" id="add_capitulo" name="add_capitulo" required>
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
	        	<h4 class="modal-title"><b>EDITAR BIBLIOGRAFÍA</b></h4>
	      	</div>
	      	<?php echo form_open('Bibliografia/updBibliografia',array('id'=>'updBibliografia'));?>
	      		<div class="modal-body">
	      			<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
						    	<label for="upd_bibliografia"><b>BIBLIOGRAFÍA</b></label>
						    	<textarea class="form-control input-sm medForm" id="upd_bibliografia" name="upd_bibliografia" rows="1" required></textarea>
						  	</div>
						  	<div class="input-group form-group">
							  	<span class="input-group-addon"><b>CAPÍTULO</b></span>
							  	<input type="text" class="form-control medForm" id="upd_capitulo" name="upd_capitulo" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert2"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_id_bibliografia" id="upd_id_bibliografia" value="0">
	      			<button type="submit" class="btn btn-primary guardar"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>


<!--AUX-->
<?php echo form_open('Bibliografia/getTabla',array('id'=>'getTabla'));?>
<?php echo form_close();?>

<?php echo form_open('Bibliografia/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Bibliografia/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<script src="<?=base_url();?>AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url();?>AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>AdminLTE/dist/js/app.min.js"></script>
<script src="<?=base_url();?>AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>

<script type='text/javascript'>

	$(document).ready(function(){

		if($('#rol').val() == "medico"){
			$('.registrar').hide();
			$('.guardar').hide();
			$('.medForm').prop('disabled', true);
		}
	});
	
</script>