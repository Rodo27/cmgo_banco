<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$especialidad;?></b></h4>
				<input type="hidden" id="rol" value="<?=$this->session->rol;?>">
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="alert" style="background-color:#605ca8;color:#fff;font-size:20px;"><b>TEMAS</b></div>
					</div>
					<div class="col-sm-12">
						<button class="btn btn-primary pull-right registrar" data-toggle="modal" data-target="#Modal1" <?=($this->session->rol!="admin")?'style="display:nonee;"':'';?>><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR TEMA</b></button><br><br><br>
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

<?php echo form_open('Conocimientos_generales/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>

<!--ventaba modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="Modal1">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>AGREGAR TEMA</b></h4>
	      	</div>
	      	<?php echo form_open('Conocimientos_generales/addTema',array('id'=>'addTema'));?>
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
	      	<?php echo form_open('Conocimientos_generales/updTema',array('id'=>'updTema'));?>
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control medForm" id="upd_input_temas_id_division" name="upd_input_temas_id_division" onChange="getCombos({'areas':['upd_input_temas_id_area',false,'upd_input_temas_id_division','id_especialidad','SI','NO']})" required <?=($this->session->rol!="admin")?'disabledd':'';?>>
							  		<?=$divisiones;?>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control medForm" id="upd_input_temas_id_area" name="upd_input_temas_id_area" required <?=($this->session->rol!="admin")?'disabledd':'';?>></select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<input type="text" class="form-control medForm" id="upd_input_temas_tema" name="upd_input_temas_tema" required <?=($this->session->rol!="admin")?'disabledd':'';?>>
							</div>
							<div class="form-group">
						    	<label for="upd_input_especialidades_especialidad">Objetivo</label>
						    	<textarea class="form-control input-sm medForm" id="upd_input_temas_objetivo" name="upd_input_temas_objetivo" rows="1" required>
						    	</textarea>
						  	</div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<div class="input-group form-group">
								  <span class="input-group-addon"><b>Punto clave</b></span>
								  <input type="text" class="form-control Guardar" id="updValor">
								  <span class="input-group-addon btnAddPuntoClave guardar" id="upd" style="background-color:#367fa9;color:#fff;cursor:pointer;border:1px solid #367fa9;"><i class="glyphicon glyphicon-plus-sign"></i></span>
							</div>
							<div id="updContenedor">
							</div>
							<div id="alert2"></div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<h4><strong>PREGUNTAS SOBRE ESTE TEMA</strong> <button class="btn btn-sm btn-success pull-right" type="button" onclick="agregarPregunta()"><i class="glyphicon glyphicon-plus-sign"></i> AGREGAR PREGUNTA</button> </h4><br>
							<div id="preguntas_contenedor">
								<!-- Tabla Preguntas -->
							</div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_input_temas_id_tema" id="upd_input_temas_id_tema" value="0">
	      			<button type="submit" class="btn btn-primary guardar"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal3">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Conocimientos_generales/updPregunta',array('id'=>'updPregunta'));?>
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-4">
	        			<h4 class="modal-title">
	        				<b>EDITAR PREGUNTA &mdash; CONOCIMIENTO GENERALES</b>
	        			</h4>
	        		</div>
	        		<div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2017" value="examen_2017"> EXAMEN 2017<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_1_2" value="examen_2018_1_2"> EXAMEN 2018 1 y 2<br>
	        		</div>
	        		<div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2018_1" value="examen_2018_1"> EXAMEN 2018-1<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_2" value="examen_2018_2"> EXAMEN 2018-2<br>
	        		</div>
	        		<div class="col-xs-3">
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">No PREGUNTA: <span id="head_id_pregunta"></span></span>
	        		</div>
	        	</div>
	      	</div>
	      	
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="id_division" name="id_division" onChange="getCombosx({'areas':['id_area',false,'id_division','id_especialidad','NO','NO'],
							  																						  'temas':['id_tema',false,'id_area','id_especialidad','NO','NO']})" required></select>
							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="id_area" name="id_area" onChange="getCombosx({'temas':['id_tema',false,'id_area','id_especialidad','NO','NO']})" required></select>
							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="id_tema" name="upd_preguntas_id_tema" required></select>
							</div>
  						</div>
	      				<div class="col-sm-6">
	      					<div class="row">
	      						<div class="col-sm-12">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
									  	<select class="form-control" id="upd_preguntas_id_complejidad_cognitiva" name="upd_preguntas_id_complejidad_cognitiva" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Periodo de la vida</b></span>
									  	<select class="form-control" id="upd_preguntas_id_periodo_vida" name="upd_preguntas_id_periodo_vida" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Estatus</b></span>
									  	<select class="form-control" id="upd_preguntas_examen_banco" name="upd_preguntas_examen_banco" required>
									  	</select>
									</div>
	      						</div>
	      						<!-- BANCO -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_BANCO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control" required onchange="accion(this)" name="upd_preguntas_accion_banco" id="upd_preguntas_accion_BANCO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="BANCO_A_PILOTO">Subir a Piloto</option>
								    		<option value="BANCO_RESERVA_PILOTO">Reserva para Piloto</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto BANCO_A_PILOTO">
								    	<label>Pregunta Piloto a sustituir</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_BANCO" name="upd_preguntas_accion_comentario_BANCO">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>

	      						<!-- EXAMEN -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_EXAMEN">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_examen" id="upd_preguntas_accion_EXAMEN">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN_FUNCIONA">Funciona</option>
								    		<option value="EXAMEN_MODIFICAR">Modificada</option>
								    		<option value="EXAMEN_ELIMINAR">Eliminar</option>
								    		<option value="EXAMEN_RESERVA">Reserva</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN_ELIMINAR EXAMEN_RESERVA">
								    	<label>Pregunta Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_EXAMEN" name="upd_preguntas_accion_comentario_EXAMEN">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>

	      						<!-- PILOTO -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_PILOTO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_piloto" id="upd_preguntas_accion_PILOTO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="PILOTO_MODIFICADA">Modificada</option>
								    		<option value="PILOTO_RESERVA_EXAMEN2">Reserva para examen2</option>
								    		<option value="PILOTO_A_EXAMEN">Subir a Examen</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_PILOTO" name="upd_preguntas_accion_comentario_PILOTO">
								    		<?php
								    			foreach ($examen as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>

	      						<!-- RESERVA -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_RESERVA">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_reserva" id="upd_preguntas_accion_RESERVA">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
											<option value="EXAMEN2">Reserva para examen2</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN1">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_RESERVA" name="upd_preguntas_accion_comentario_RESERVA">
								    		<?php
								    			foreach ($examen as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      					</div>
						</div>
						<div class="col-sm-6">
							<div class="col-xs-6">
	      						<div class="input-group form-group">
								  	<span class="input-group-addon"><b>INFIT</b></span>
								  	<input type="text" class="form-control" id="upd_preguntas_analisis_infit" disabled>
								</div>
	      					</div>
	      					<div class="col-xs-6">
	      						<div class="input-group form-group">
								  	<span class="input-group-addon"><b>OUTFIT</b></span>
								  	<input type="text" class="form-control" id="upd_preguntas_analisis_outfit" disabled>
								</div>
	      					</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>Dificultad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
								  	<input type="text" class="form-control" id="upd_preguntas_analisis_dif" disabled>
								  	<span class="input-group-addon"><b id="dif"> </b></span>
								</div>
								<hr>
								<b>Dificultad</b><br>
								<h5 style="background-color:#FF0000;margin:0;padding:5px 5px;"><b>Fácil: </b><b class="pull-right">700 &mdash; 850</b></h5>
								<h5 style="background-color:#FFD700;margin:0;padding:5px 5px;"><b>Regular: </b><b class="pull-right">851 &mdash; 1000</b></h5>
								<h5 style="background-color:#7CFC00;margin:0;padding:5px 5px;"><b>Difícil: </b><b class="pull-right">1001 &mdash; 1150</b></h5>
								<h5 style="background-color:#008000;margin:0;padding:5px 5px;"><b>Muy difícil: </b><b class="pull-right">1151 &mdash; 1300</b></h5>
							</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>Discriminación</b></span>
								  	<input type="text" class="form-control" id="upd_preguntas_analisis_dis" disabled>
								  	<span class="input-group-addon"><b id="dis"> </b></span>
								</div>
								<hr>
								<b>Discriminación</b><br>
								<h5 style="background-color:#008000;margin:0;padding:5px 5px;"><b>Esperada:</b><b class="pull-right">1 o más</b></h5>
								<h5 style="background-color:#FFD700;margin:0;padding:5px 5px;"><b>Regular:</b><b class="pull-right">0.80 &mdash; 0.99</b></h5>
								<h5 style="background-color:#FF0000;margin:0;padding:5px 5px;"><b>Mala:</b><b class="pull-right">0.79 o menos</b></h5>
							</div>	
						</div>
	      				<div class="col-xs-12">
	      					<div class="form-group">
						    	<label for="upd_preguntas_pregunta">Pregunta</label>
						    	<textarea class="form-control input-sm" id="upd_preguntas_pregunta" name="upd_preguntas_pregunta" rows="1" required></textarea>
						  	</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción A)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_a" name="upd_preguntas_opcion_a" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_b" name="upd_preguntas_opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_c" name="upd_preguntas_opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_d" name="upd_preguntas_opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_e" name="upd_preguntas_opcion_e">
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_e"></div></div>
							  	</div>
							  	<div class="col-xs-12"><hr></div>	
		      				</div>
	      				</div>
	      				<div class="col-sm-4">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Respuesta</b></span>
							  	<select class="form-control" id="upd_preguntas_respuesta" name="upd_preguntas_respuesta" required>
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
							  	<select class="form-control" id="upd_preguntas_id_bibliografia" name="upd_preguntas_id_bibliografia" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Capítulo</b></span>
							  	<input type="text" class="form-control" id="upd_preguntas_capitulo" name="upd_preguntas_capitulo">
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Modificación</b></span>
							  	<input type="text" class="form-control" id="upd_preguntas_modificacion" name="upd_preguntas_modificacion">
							</div>
	      				</div>
	      				<br>
	      				<div class="col-xs-12" id="upd_preguntas_puntos_clave">
	      				</div>
	      				<div class="col-xs-12">
	      					<div id="alert3"></div>
	      				</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_preguntas_id_pregunta" id="upd_preguntas_id_pregunta" value="0">
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
	      	<?php echo form_open('Conocimientos_generales/addPregunta',array('id'=>'addPregunta'));?>
	      		<div class="modal-body">
	      			<div class="row">
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
							  	<span class="input-group-addon"><b>Estatus</b></span>
							  	<select class="form-control" id="input_preguntas_examen_banco" name="input_preguntas_examen_banco" required>
							  		<option value="BANCO">Banco</option>
							  		<option value="BANCO_REVISION">Banco_revision</option>
							  	</select>
							</div>
	      				</div>
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
	      			<input type="hidden" name="input_preguntas_id_tema" id="input_preguntas_id_tema" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade " tabindex="-1" role="dialog" id="ModalPreg" data-keyboard="false">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-4">
	        			<h4 class="modal-title">
	        				<b>EDITAR PREGUNTA &mdash; CONOCIMIENTO GENERALES</b>
	        			</h4>
	        		</div>
	        	</div>
	      	</div>
	      	
			  <form id="editar_pregunta_form_e" method="get" >
			  <input type="hidden" id="id_pregunta_e" name="id_pregunta_e">
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-4">
  							<div class="input-group form-group">
							  
									<span class="input-group-addon"><b>División</b></span>
									<select class="form-control campo-division medForm" id="id_division2_e" name="id_division_e" onchange="getAreas(this.value);" required>
									</select>

								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Área</b></span>
									<select class="form-control campo-area medForm" id="id_area2_e" name="id_area_e" onchange="getTemas(this.value);" required></select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Tema</b></span>
									<select class="form-control campo-tema medForm" id="id_tema2_e" name="id_tema_e" onChange="getPuntosClave_tabla_editar(this.value);" required></select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
											<select class="form-control campo-complejidad-cognitiva medForm" id="id_complejidad_cognitiva2_e" name="upd_preguntas_id_complejidad_cognitiva_e" required></select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Periodo de la vida</b></span>
											<select class="form-control campo-periodo medForm" id="id_periodo_vida2_e" name="upd_preguntas_id_periodo_vida_e" required>
											</select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Estatus</b></span>
											<select class="form-control campo-estatus medForm" id="estatus_list_e" name="id_estatus_e">
											</select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Acción</b></span>
											<select class="form-control campo-accion medForm" id="accion_list_e" name="id_accion_e">
											</select>
										</div>

										


									
									</div>
								</div>	
								
							</div>

							
							<div class="col-md-6 medForm" id="tabla_puntos">
								<input type="hidden" id="puntos_clave_arreglo_e"  name="puntos_clave_e" class="puntos_clave_arreglo">
								<table class="table table-striped table-condensed tabla_pc" id="tabla_puntos_clave_e">
									<thead>
										<th>Numeración</th>
										<th>Punto Clave</th>
										<th>check</th>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>

							
						</div>

						<div class="row">
							<div class="col-md-2 col-md-offset-5">
								<button class="btn btn-primary collapsed " id="ocul_ver" value="false" onClick="verOcultarCalibracion(this.value);"  type="button" data-toggle="collapse" data-target="#dif-discri , #infit-outfit-dif-disc" aria-expanded="false" aria-controls="dif-discri , infit-outfit-dif-disc">
													 Calibración
								</button>
							</div>
						</div>


						<div class="row">
							<!-- Bloque para INFIT, OUTFIT, DIF, DISCR, Dificultad y Discriminación -->
							
								<div class="row">
									<div class="col-sm-6 collapse" id="dif-discri" aria-expanded="false" style="height: 0px;">
										<div class="col-xs-6">
											
											<b>Dificultad</b>
											<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: solid solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>Menor a -2 </b><b class="pull-right">Muy fácil</b></h5>
											<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid;border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>-2 a -1 </b><b class="pull-right">Fácil</b></h5>
											<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a -1 </b><b class="pull-right">Regular</b></h5>
											<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a 2 </b><b class="pull-right">Difícil</b></h5>
											<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>Mayor a 2 </b><b class="pull-right">Muy difícil</b></h5>
											
										</div>   

										<div class="col-xs-6">
											
											<b>Discriminación</b>
											<h5 style="background-color:#2ba72b;margin:0;padding:5px 5px;"><b>0.40 o más</b><b class="pull-right">Muy buena</b></h5>
											<h5 style="background-color:#72d872;margin:0;padding:5px 5px;"><b>0.20 a 0.39</b><b class="pull-right">Buena</b></h5>
											<h5 style="background-color:#FFD700;margin:0;padding:5px 5px;"><b>0.15 a 0.19</b><b class="pull-right">Requiere revisión</b></h5>
											<h5 style="background-color:#FF0000;margin:0;padding:5px 5px;"><b>0.14 o menos</b><b class="pull-right">No discrimina</b></h5>

										</div>   

									</div>

									<br>
										
									<div class="col-sm-6 collapse" id="infit-outfit-dif-disc" aria-expanded="false" style="height: 0px;">
										<div class="col-xs-6">
											<div class="input-group form-group">
												<span class="input-group-addon"><b>INFIT</b></span>
												<input type="text" class="form-control" id="analisis_infit" disabled="">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="input-group form-group">
												<span class="input-group-addon"><b>OUTFIT</b></span>
												<input type="text" class="form-control" id="analisis_outfit" disabled="">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="input-group form-group">
												<span class="input-group-addon"><b>DIF &nbsp; &nbsp; </b></span>
												<input type="text" class="form-control" id="analisis_dif" disabled="">
												<span class="input-group-addon"><b id="dif"><i class="glyphicon glyphicon-record"></i></b></span>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="input-group form-group">
												<span class="input-group-addon"><b>DISCR  &nbsp; </b></span>
												<input type="text" class="form-control" id="analisis_dis" disabled="">
												<span class="input-group-addon"><b id="dis"><i class="glyphicon glyphicon-record rojo"></i></b></span>
											</div>
											
											
										</div>
									</div>
								</div>
							
							<div class="col-xs-12"><hr></div> <!-- Linea divisora -->
							<!-- Pregunta y respuestas -->
							<div class="col-xs-12">
								<div class="form-group">
									<label for="upd_preguntas_pregunta">Pregunta</label>
									<textarea class="form-control input-sm medForm" id="pregunta2_e" name="upd_preguntas_pregunta_e" rows="1" required></textarea>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción A)</b></span>
											<input type="text" class="form-control medForm" id="opcion_a2_e" name="upd_preguntas_opcion_a_e" required>
										</div>
									</div>

									<div class="col-xs-4">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%;" id="barra_a">
												<span class="porcentaje_barra_a porcentaje_barra"></span>
											</div>
										</div>
									</div>

									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción B)</b></span>
											<input type="text" class="form-control medForm" id="opcion_b2_e" name="upd_preguntas_opcion_b_e" required>
											
											
										</div>
										
									</div>
									<div class="col-xs-4">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%;" id="barra_b">
												<span class="porcentaje_barra_b porcentaje_barra"></span>
											</div>
										</div>
									</div>
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción C)</b></span>
											<input type="text" class="form-control medForm" id="opcion_c2_e" name="upd_preguntas_opcion_c_e" required>
										</div>
									</div>

									<div class="col-xs-4">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%;" id="barra_c">
												<span class="porcentaje_barra_c porcentaje_barra"></span>
											</div>
										</div>
									</div>

									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción D)</b></span>
											<input type="text" class="form-control medForm" id="opcion_d2_e" name="upd_preguntas_opcion_d_e" required>
										</div>
									</div>

									<div class="col-xs-4">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%;" id="barra_d">
												<span class="porcentaje_barra_d porcentaje_barra"></span>
											</div>
										</div>
									</div>

									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción E)</b></span>
											<input type="text" class="form-control medForm" id="opcion_e2_e" name="upd_preguntas_opcion_e_e">
										</div>
									</div>

									<div class="col-xs-4">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%;" id="barra_e">
												<span class="porcentaje_barra_e porcentaje_barra"></span>
											</div>
										</div>
									</div>

									<div class="col-xs-12"><hr></div>	
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Respuesta</b></span>
									<select class="form-control medForm" id="respuesta2_e" name="upd_preguntas_respuesta_e" required>
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
									<select class="form-control campo-bibliografia medForm" id="id_bibliografia2_e" name="upd_preguntas_id_bibliografia_e" required><?=$bibliografia;?></select>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Capítulo</b></span>
									<input type="text" class="form-control medForm" id="capitulo2_e" name="upd_preguntas_capitulo_e">
								</div>
							</div>

							<div class="col-xs-12"><hr></div> <!-- Linea divisora -->

							<div class="col-xs-12" id="div_pregunta_examen_boton">
	      						<div class="form-group">
									<button class="btn btn-primary collapsed guardar" id="actual_examen" type="button" onClick="getContenidoActualPregunta();"data-toggle="collapse" data-target="#div_pregunta_examen" aria-expanded="false" aria-controls="div_pregunta_examen">
										Ver contenido de la pregunta actual en el examen
									</button>
						  		</div>
							</div>
							<div class="collapse" id="div_pregunta_examen" aria-expanded="false" style="height: 0px;">
								<div class="card card-body">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="pregunta_examen_actual">Pregunta</label>
											<textarea class="form-control input-sm examen_actual" id="pregunta_examen_actual" rows="1" disabled="" style="margin: 0px 1.9125px 0px 0px; width: 1170px; height: 59px;"></textarea>
										</div>
									</div>

									<div class="col-xs-12">
										<div class="form-group">
											<div class="col-xs-12" id="imagenes_pregunta"></div>
										</div>
									</div>

									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-8">
												<div class="input-group form-group">
													<span class="input-group-addon"><b>Opción A)</b></span>
													<input type="text" class="form-control examen_actual" id="opcion_a_examen" disabled="">
												</div>
											</div>

											<div class="col-xs-4">
												<div id="grafica_cc"></div>
											</div>
										<!-- 	<div class="col-xs-4">
												<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>
											</div> -->
											<div class="col-xs-8">
												<div class="input-group form-group">
													<span class="input-group-addon"><b>Opción B)</b></span>
													<input type="text" class="form-control examen_actual" id="opcion_b_examen" disabled="">
												</div>
											</div>
										<!-- 	<div class="col-xs-4">
												<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>
											</div> -->
											<div class="col-xs-8">
												<div class="input-group form-group">
													<span class="input-group-addon"><b>Opción C)</b></span>
													<input type="text" class="form-control examen_actual" id="opcion_c_examen" disabled="">
												</div>
											</div>
											<!-- <div class="col-xs-4">
												<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>
											</div> -->
											<div class="col-xs-8">
												<div class="input-group form-group">
													<span class="input-group-addon"><b>Opción D)</b></span>
													<input type="text" class="form-control examen_actual" id="opcion_d_examen" disabled="">
												</div>
											</div>
											<!-- <div class="col-xs-4">
												<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>
											</div> -->
											<div class="col-xs-8">
												<div class="input-group form-group">
													<span class="input-group-addon"><b>Opción E)</b></span>
													<input type="text" class="form-control examen_actual" id="opcion_e_examen" disabled="">
												</div>
											</div>
											<!-- <div class="col-xs-4">
												<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_e"></div></div>
											</div> -->
										</div>
									</div>
									<div class="col-sm-4">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Respuesta</b></span>
											<input type="text" class="form-control examen_actual" id="respuesta_examen_actual" disabled="">
										</div>
									</div>
								</div>
							</div>

							<div class="col-xs-12"><hr></div> <!-- Linea divisora -->

							<div class="col-xs-12" id="div_rubrica_examen_boton">
								<div class="form-group">
									<button id="lista_cotejo" onClick="cambiarEstadoBotonListaCotejo();" class="btn btn-primary collapsed list_cotejo" type="button" data-toggle="collapse" data-target="#div_rubrica_examen" aria-expanded="false" aria-controls="div_rubrica_examen">
										Ver lista de cotejo
									</button>
								</div>

									<div class="alert alert-success" id="registrado_lc" style="display : none!important">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>¡Se guardo correctamente!</strong> Lista de cotejo actualizada.
									</div>
									<div class="alert alert-danger" id="registrado_mal_lc" style="display : none!important">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Salió algo mal</strong> Lista de cotejo no fue guardada.
									</div>

							</div>
							
							<div class="collapse" id="div_rubrica_examen" aria-expanded="false" style="height: 0px;">
						  <div class="card card-body">

		      				<div class="col-xs-10 col-xs-offset-1">
								<div class="row">

									<table class="table table-striped table-bordered table-sm">
									  <thead class="thead-light">
									    <tr class="info">
									      <th scope="col">Criterios para la revisión técnica de reactivos de opción múltiple</th>
									      <th scope="col" colspan="3" style="text-align:center;">¿Cumple con el criterio técnico?</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr class="success">
									      <th scope="row">Con referencia al reactivo en su conjunto</th>
									      <td style="text-align:center;">Sí</td>
									      <td style="text-align:center;">No</td>
									      <td style="text-align:center;">N/A</td>
									    </tr>
									    <tr>
									      <th scope="row">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Corresponde con el árbol temático.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Corresponde con el contenido de la especificación.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incluye situaciones comprensibles para todos los sustentantes.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Está planteado de manera que no se responde por lógica natural o por inferencia.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Es independiente de otros reactivos, en el sentido de que la información contenida en uno, no sugiera la solución ni sea requisito para contestar otro.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Emplea un vocabulario que es pertinente para la población objetivo y que favorece su comprensión.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Está libre de información que pueda beneficiar a algún grupo social.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="na" class="rubrica"></td>
									    </tr>
									    <tr>
									      <th scope="row">8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Evita emplear situaciones o vocabulario que puedan resultar ofensivos para algún grupo social.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Está libre de estereotipos: sociales, culturales o religiosos.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">10.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Está fundamentado en fuentes de información arbitradas y confiables.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="na" class="rubrica"></td>
									    </tr>
									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a la base </th>
									    </tr>

									    <tr>
									      <th scope="row">11.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Está redactada de forma afirmativa.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="na" class="rubrica"></td>
									    </tr>
									    <tr>
									      <th scope="row">12.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Especifica claramente la tarea cognitiva que se debe realizar.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="na" class="rubrica"></td>
									    </tr>
									    <tr>
									      <th scope="row">13.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incluye la referencia documental correspondiente cuando se emplee material de otro autor.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="na" class="rubrica"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a las opciones de respuesta</th>
									    </tr>

									    <tr>
									      <th scope="row">14.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pertenecen al mismo tema o campo semántico.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">15.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tienen concordancia gramatical con la base. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">16.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tienen el mismo nivel de generalidad o especificidad.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">17.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Son distintas entre sí; omiten el uso de sinónimos o respuestas equivalentes.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="na" class="rubrica"></td>
									    </tr>
									    <tr>
									      <th scope="row">18.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Se evita que una opción destaque por su extensión con respecto al resto. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">19.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Se evita persentar alternativas como: “todas las anteriores”, “ninguna de las anteriores”, “las dos de arriba”, “A y C” o “no sé”. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="na" class="rubrica"></td>
									    </tr>
									    <tr>
									      <th scope="row">20.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Evitan la repetición de palabras o frases entre ellas, éstas deberán formar parte de la base. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="na" class="rubrica"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a la respuesta correcta</th>
									    </tr>

									    <tr>
									      <th scope="row">21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Existe y es única</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Resuelve completamente el planteamiento.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="na" class="rubrica"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a los distractores</th>
									    </tr>

									    <tr>
									      <th scope="row">23.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Son plausibles y son elegibles como posible respuesta de quien no sabe o de quien comete un error. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">24.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Representan los errores más comunes de aquellos que no poseen el conocimiento o la habilidad evaluada. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="na" class="rubrica"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a las imágenes y tablas</th>
									    </tr>

									    <tr>
									      <th scope="row">25.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Son indispensables para contestar el reactivo.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">26.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contienen los elementos necesarios para su identificación e interpretación.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="na" class="rubrica"></td>
									    </tr>

									    <tr>
									      <th scope="row">27.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Si el reactivo tiene más de una, todas deben tener un formato y tamaño similar.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="si" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="no" class="rubrica"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="na" class="rubrica"></td>
									    </tr>

									  </tbody>
									</table>
									<button class="btn btn-primary guardar" type="button" id="guardar_rubrica" onClick="guardarListaDeCotejo();">GUARDAR LISTA DE COTEJO</button>
			      				</div>
		      				</div>
						  </div>
						</div>

							<br>
							<div class="col-xs-12" id="upd_preguntas_puntos_clave_e">
							</div>
							<div class="col-xs-12">
								<div id="alert44"></div>
							</div>
						</div>

						
					</div>
					<div class="panel-footer">
							<div class="alert alert-success" id="registrado" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>¡Se editó correctamente!</strong> Su pregunta esta guardada.
							</div>
							<div class="alert alert-danger" id="registrado_mal" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Salió algo mal</strong> Su pregunta no fue guardada.
							</div>
	      			<button type="submit" class="btn btn-primary guardar" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
					  <button type="button" class="btn btn-success pull-right guardar" onclick="abrirAprobar();"><i class="glyphicon glyphicon-floppy-disk"></i> <b>APROBAR REACTIVO</b></button>
				</form>
				
	      		</div>
	      	
    	</div>
  	</div>
</div>

<script src="<?=base_url();?>AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url();?>AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>AdminLTE/dist/js/app.min.js"></script>
<script src="<?=base_url();?>AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>

<script type='text/javascript'>

	$(document).ready(function(){

		if($('#rol').val() == "medico"){
			$('.registrar').hide();
			$('.guardar').hide();
			//$('.medForm').hide();
			$('.medForm').prop('disabled', true);
			
		}
	});
	
</script>

<?php echo form_open('Conocimientos_generales/getTabla',array('id'=>'getTabla'));?>
	<input type="hidden" name="pagina_temas" id="pagina_temas" value="0">
	<input type="hidden" name="pagina_preguntas" id="pagina_preguntas" value="0">
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/addPC',array('id'=>'addPC'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/delPC',array('id'=>'delPC'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/updPreguntaPC',array('id'=>'updPreguntaPC'));?>
<?php echo form_close();?>

<div id="popover_content_wrapper" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico">	
</div>
<div id="popover_content_title" style="display:none;">
	<button class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico" onClick="verImagen(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<!-- Editar Pregunta -->
<?php echo form_open('Casos_clinicos/getCombo',array('id'=>'getCombox'));?>
<?php echo form_close();?>