<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$especialidad;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="alert" style="background-color:#605ca8;color:#fff;font-size:20px;"><b>TEMAS</b></div>
					</div>
					<div class="col-sm-12">
						<button class="btn btn-primary pull-right registrar" data-toggle="modal" data-target="#Modal1" <?=($this->session->rol!="admin")?'style="display:null;"':'';?>><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR TEMA</b></button><br><br><br>
					</div>
					<div class="col-sm-6">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>División</b></span>
						  	<select class="form-control" id="input_temas_id_division" onChange="getCombos({'areas':['input_temas_id_area',false,'input_temas_id_division','id_especialidad','SI','temas']})">
						  		<?=$divisiones;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Área</b></span>
						  	<select class="form-control" id="input_temas_id_area" onChange="getTabla('temas','contenedor_tabla','input_temas_id_area','input_temas_id_division','id_especialidad')"></select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="contenedor_tabla">	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--AUX-->
<input type="hidden" id="id_especialidad" value="<?=$id_especialidad;?>">

<?php echo form_open('Casos_clinicos/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal1">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>AGREGAR TEMA</b></h4>
	      	</div>
	      	<?php echo form_open('Casos_clinicos/addTema',array('id'=>'addTema'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="add_input_temas_id_division" name="add_input_temas_id_division" onChange="getCombos({'areas':['add_input_temas_id_area',false,'add_input_temas_id_division','id_especialidad','SI','NO']})" required>
							  		<?=$divisiones;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="add_input_temas_id_area" name="add_input_temas_id_area" required></select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<input type="text" class="form-control" id="add_input_temas_tema" name="add_input_temas_tema" required>
							</div>
							<div class="form-group">
						    	<label for="upd_input_especialidades_especialidad">Objetivo</label>
						    	<textarea class="form-control input-sm" id="add_input_temas_objetivo" name="add_input_temas_objetivo" rows="1" cols="1" required>
						    	</textarea>
						  	</div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<div class="input-group form-group">
								  <span class="input-group-addon"><b>Punto clave</b></span>
								  <input type="text" class="form-control" id="addValor">
								  <span class="input-group-addon btnAddPuntoClave" id="add" style="background-color:#367fa9;color:#fff;cursor:pointer;border:1px solid #367fa9;"><i class="glyphicon glyphicon-plus-sign"></i></span>
							</div>
							<div id="addContenedor">
								<table class="table table-striped table-condensed" id="addTable">
									<tbody>
									</tbody>
								</table>
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
	        	<h4 class="modal-title"><b>EDITAR TEMA</b></h4>
	      	</div>
	      	<?php echo form_open('Casos_clinicos/updTema',array('id'=>'updTema'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="upd_input_temas_id_division" name="upd_input_temas_id_division" onChange="getCombos({'areas':['upd_input_temas_id_area',false,'upd_input_temas_id_division','id_especialidad','SI','NO']})" required <?=($this->session->rol!="admin")?'disabledd':'';?>>
							  		<?=$divisiones;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="upd_input_temas_id_area" name="upd_input_temas_id_area" required <?=($this->session->rol!="admin")?'disabledd':'';?>></select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<input type="text" class="form-control" id="upd_input_temas_tema" name="upd_input_temas_tema" required <?=($this->session->rol!="admin")?'disabledd':'';?>>
							</div>
							<div class="form-group">
						    	<label for="upd_input_especialidades_especialidad">Objetivo</label>
						    	<textarea class="form-control input-sm" id="upd_input_temas_objetivo" name="upd_input_temas_objetivo" rows="1" required>
						    	</textarea>
						  	</div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<div class="input-group form-group">
								  <span class="input-group-addon"><b>Punto clave</b></span>
								  <input type="text" class="form-control" id="updValor">
								  <span class="input-group-addon btnAddPuntoClave" id="upd" style="background-color:#367fa9;color:#fff;cursor:pointer;border:1px solid #367fa9;"><i class="glyphicon glyphicon-plus-sign"></i></span>
							</div>
							<div id="updContenedor">
							</div>
							<div id="alert2"></div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<h4><strong>PREGUNTAS SOBRE ESTE TEMA</strong> <button class="btn btn-sm btn-success pull-right guardar" type="button" onclick="agregarPregunta()"><i class="glyphicon glyphicon-plus-sign"></i> AGREGAR PREGUNTA</button> </h4><br>
							<div id="updContenedorPreguntas">
								<!-- Tabla Preguntas -->
							</div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_input_temas_id_tema" id="upd_input_temas_id_tema" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal4">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>AGREGAR PREGUNTA</b></h4>
	      	</div>
	      	<?php echo form_open('Casos_clinicos/addPregunta',array('id'=>'addPregunta'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-xs-12">
		      				<div class="input-group form-group">
							  	<span class="input-group-addon"><b>CASO</b></span>
							  	<select class="form-control" id="input_preguntas_id_caso" name="input_preguntas_id_caso" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
							  	<select class="form-control" id="input_preguntas_id_complejidad_cognitiva" name="input_preguntas_id_complejidad_cognitiva" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Periodo de la vida</b></span>
							  	<select class="form-control" id="input_preguntas_id_periodo_vida" name="input_preguntas_id_periodo_vida" required></select>
							</div>
						</div> 
	      				<div class="col-sm-6">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Numeración</b></span>
							  	<select class="form-control" id="input_preguntas_numeracion" name="input_preguntas_numeracion" required>
							  		<option value="P1">P1</option>
							  		<option value="P2">P2</option>
							  		<option value="P3">P3</option>
							  		<option value="P4">P4</option>
							  		<option value="P5">P5</option>
							  	</select>
							</div>
							<!--
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Dificultad</b></span>
							  	<select class="form-control" id="input_preguntas_dificultad" name="input_preguntas_dificultad" required>
							  		<option value="FACIL">FÁCIL</option>
							  		<option value="INTERMEDIO">INTERMEDIO</option>
							  		<option value="DIFICIL">DIFÍCIL</option>
							  	</select>
							</div>
							-->
	      				</div><!--
	      				<div class="col-sm-6">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Estatus</b></span>
							  	<select class="form-control" id="input_preguntas_examen_banco" name="input_preguntas_examen_banco" required>
							  		<option value="Banco">Banco</option>
							  		<option value="Examen">Examen</option>
							  		<option value="Revision">Revisión</option>
							  	</select>
							</div>
	      				</div> -->
	      				<div class="col-xs-12">
	      					<div class="form-group">
						    	<label for="input_preguntas_pregunta">Pregunta</label>
						    	<textarea class="form-control input-sm" id="input_preguntas_pregunta" name="input_preguntas_pregunta" rows="1" required></textarea>
						  	</div>
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opción A)</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_opcion_a" name="input_preguntas_opcion_a" required>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opción B)</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_opcion_b" name="input_preguntas_opcion_b" required>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opción C)</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_opcion_c" name="input_preguntas_opcion_c" required>
							</div>
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opción D)</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_opcion_d" name="input_preguntas_opcion_d" required>
							</div>
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opción E)</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_opcion_e" name="input_preguntas_opcion_e">
							</div>
	      				</div>
	      				<div class="col-sm-4">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Respuesta</b></span>
							  	<select class="form-control" id="input_preguntas_respuesta" name="input_preguntas_respuesta" required>
							  		<option value="A">A</option>
							  		<option value="B">B</option>
							  		<option value="C">C</option>
							  		<option value="D">D</option>
							  		<option value="E">E</option>
							  	</select>
							</div>
	      				</div>
	      				<div class="col-sm-8">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Bibliografía</b></span>
							  	<select class="form-control" id="input_preguntas_id_bibliografia" name="input_preguntas_id_bibliografia" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Capítulo</b></span>
							  	<input type="text" class="form-control" id="input_preguntas_capitulo" name="input_preguntas_capitulo">
							</div>
	      				</div>
	      				<br>
	      				<div class="col-xs-12" id="input_preguntas_contenedor_pc">
	      				</div>
	      				<div class="col-xs-12">
	      					<div id="alert4"></div>
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

<?php echo form_open('Casos_clinicos/getTabla',array('id'=>'getTabla'));?>
	<input type="hidden" name="pagina_tema" id="pagina_tema" value="0">
	<input type="hidden" name="pagina_pregunta" id="pagina_pregunta" value="0">
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/addPC',array('id'=>'addPC'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/delPC',array('id'=>'delPC'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/updPreguntaPC',array('id'=>'updPreguntaPC'));?>
<?php echo form_close();?>

<div id="popover_content_wrapper" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico">	
</div>
<div id="popover_content_title" style="display:none;">
	<button class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico" onClick="verImagen(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<?=$editar_pregunta;?>

