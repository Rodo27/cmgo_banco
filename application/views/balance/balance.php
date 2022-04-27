<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$title;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<br>
					<br>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Especialidad</b></span>
						  	<select class="form-control" id="especialidad" onchange="getTabla()">
						  		<?=$especialidades;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Tipo de examen</b></span>
						  	<select class="form-control" id="tipo_examen" onchange="getTabla()">
						  		<option value="examen_2017">EXAMEN 2017</option>
						  		<option value="examen_2018_1">EXAMEN 2018-1</option>
						  		<option value="examen_2018_2">EXAMEN 2018-2</option>
						  		<option value="examen_2018_1_2">EXAMEN 2018 1 Y 2</option>
						  	</select>
						</div>
					</div>
					<div class="col-sm-12 hidden-xs"><hr></div>
					<div class="col-sm-12" id="tabla">
						<!-- Tabla -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo form_open('Balance/getTabla',array('id'=>'getTabla'));?>
<?php echo form_close();?>