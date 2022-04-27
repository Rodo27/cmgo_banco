<div class="modal fade" tabindex="-1" role="dialog" id="Modal44">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Casos_clinicos/addPregunta',array('id'=>'addPregunta'));?>
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:50px;line-height:50%;">
					<span aria-hidden="true">&times;</span>
				</button>
			<!--
	        	<div class="row">
	        		<div class="col-xs-3">
	        			<h4 class="modal-title">
	        				<b>EDITAR PREGUNTA &mdash; CASOS CLÍNICOS</b>
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
	        		<div class="col-xs-4">
	        			<img src="" class="img img-responsive tasks-menu pull-right" style="margin-right:30px;max-height:30px;cursor:pointer;" id="header_url" data-toggle="popover" data-placement="left">
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">No PREGUNTA: <span id="header_pregunta"></span></span>
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">CASO: <span id="header_caso"></span></span>
	        		</div>
	        	</div>
	        -->
	      	</div>
      		<div class="modal-body">
					<div class="row">
						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="id_division2" name="id_division" onChange="getCombos({'areas':['id_area2',false,'id_division2','id_especialidad','NO','NO'],
							  																						  'temas':['id_tema2',false,'id_area2','id_especialidad','NO','NO'],
							  																						  'casos':['id_caso2',false,'id_tema2','id_especialidad','NO','NO']})" required>
							  		<?=$divisiones;?>
							  	</select>
							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="id_area2" name="id_area" onChange="getCombos({'temas':['id_tema2',false,'id_area2','id_especialidad','NO','NO'],
							  																				  'casos':['id_caso2',false,'id_tema2','id_especialidad','NO','NO']})" required></select>
							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="id_tema2" name="id_tema" onChange="getCombos({'casos':['id_caso2',false,'id_tema2','id_especialidad','NO','NO']})" required></select>
							</div>
  						</div>
  						<div class="col-xs-12">
  							<div class="form-group">
							  	<label for="id_caso"><b>Caso</b></label>
							  	<select class="form-control" id="id_caso2" name="id_caso" style="height:50px;" required></select>
							</div>
  						</div>
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
							  	<select class="form-control" id="id_complejidad_cognitiva2" name="id_complejidad_cognitiva" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Periodo de la vida</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
							  	<select class="form-control" id="id_periodo_vida2" name="id_periodo_vida" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Estatus</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
							  	<select class="form-control" id="examen_banco2" name="examen_banco" required>
							  		<option value="EXAMEN">EXAMEN</option>
							  		<option value="EXAMEN_2019">EXAMEN_2019</option>
							  		<option value="EXAMEN_2020">EXAMEN_2020</option>
							  		<option value="BANCO">BANCO</option>
							  		<option value="PILOTO">PILOTO</option>
							  		<option value="PILOTO_2020">PILOTO_2020</option>
							  		<option value="RESERVA">RESERVA</option>
							  	</select>
							</div>
						<!--
	      					<div class="row">
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_BANCO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control" required onchange="accion(this)" name="accion_banco" id="accion_BANCO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="BANCO_A_PILOTO">Subir a Piloto</option>
								    		<option value="BANCO_RESERVA_PILOTO">Reserva para Piloto</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto BANCO_A_PILOTO">
								    	<label>Pregunta Piloto a sustituir</label>
								    	<select class="form-control input-sm" id="accion_comentario_BANCO" name="accion_comentario_BANCO">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_EXAMEN">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_examen" id="accion_EXAMEN">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN_FUNCIONA">Funciona</option>
								    		<option value="EXAMEN_MODIFICAR">Modificada</option>
								    		<option value="EXAMEN_ELIMINAR">Eliminar</option>
								    		<option value="EXAMEN_RESERVA">Reserva</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN_ELIMINAR EXAMEN_RESERVA">
								    	<label>Pregunta Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="accion_comentario_EXAMEN" name="accion_comentario_EXAMEN">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_PILOTO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_piloto" id="accion_PILOTO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="PILOTO_MODIFICADA">Modificada</option>
								    		<option value="PILOTO_RESERVA_EXAMEN2">Reserva para examen2</option>
								    		<option value="PILOTO_A_EXAMEN">Subir a Examen</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="accion_comentario_PILOTO" name="accion_comentario_PILOTO">
								    		<?php
								    			foreach ($examen as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_RESERVA">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_reserva" id="accion_RESERVA">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
								    		<option value="EXAMEN2">Reserva para examen2</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN1">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="accion_comentario_RESERVA" name="accion_comentario_RESERVA">
								    		<?php
								    			foreach ($examen as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      					</div>
	      				-->
						</div>
						<div class="col-sm-6 text-center">
							<div class="panel panel-primary">
								<h4><b>Imagen</b></h4>
								<div class="panel-body">
									<img class="img img-responsive tasks-menu" src="<?=base_url();?>files/cc/pregunta.png" style="margin:0 auto;max-height:80px;cursor:pointer;" id="add_pregunta_imagen_url" data-toggle="popover" data-placement="left">
								</div>
								<div class="panel-footer" style="overflow:hidden;">
									<input type="file" accept="image/*" name="add_pregunta_file" id="add_pregunta_file">
									<input type="hidden" name="add_pregunta_imagen" id="add_pregunta_imagen" value="0">
								</div>
							</div>
						</div>
					<!--
	      				<div class="col-sm-6">
	      					<div class="col-xs-6">
	      						<div class="input-group form-group">
								  	<span class="input-group-addon"><b>INFIT</b></span>
								  	<input type="text" class="form-control" id="analisis_infit" disabled>
								</div>
	      					</div>
	      					<div class="col-xs-6">
	      						<div class="input-group form-group">
								  	<span class="input-group-addon"><b>OUTFIT</b></span>
								  	<input type="text" class="form-control" id="analisis_outfit" disabled>
								</div>
	      					</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>DIF &nbsp; &nbsp; </b></span>
								  	<input type="text" class="form-control" id="analisis_dif" disabled>
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
								  	<span class="input-group-addon"><b>DISCR  &nbsp; </b></span>
								  	<input type="text" class="form-control" id="analisis_dis" disabled>
								  	<span class="input-group-addon"><b id="dis"> </b></span>
								</div>
								<hr>
								<b>Discriminación</b><br>
								<h5 style="background-color:#008000;margin:0;padding:5px 5px;"><b>Esperada:</b><b class="pull-right">1 o más</b></h5>
								<h5 style="background-color:#FFD700;margin:0;padding:5px 5px;"><b>Regular:</b><b class="pull-right">0.80 &mdash; 0.99</b></h5>
								<h5 style="background-color:#FF0000;margin:0;padding:5px 5px;"><b>Mala:</b><b class="pull-right">0.79 o menos</b></h5>
							</div>
	      				</div>
	      			-->
	      				<div class="col-xs-12">
	      					<div class="form-group">
						    	<label for="pregunta">Pregunta</label>
						    	<textarea class="form-control input-sm" id="pregunta2" name="pregunta" rows="2" required></textarea>
						  	</div>
	      				</div>
	      				<div class="col-xs-12">
	      					<div class="row">
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción A)</b></span>
									  	<input type="text" class="form-control" id="opcion_a2" name="opcion_a" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="opcion_b2" name="opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="opcion_c2" name="opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="opcion_d2" name="opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="opcion_e2" name="opcion_e">
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_e"></div></div>-->
							  	</div>
							  	<div class="col-xs-12"><hr></div>	
		      				</div>
	      				</div>
	      				<div class="col-sm-4">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Respuesta</b></span>
							  	<select class="form-control" id="respuesta" name="respuesta" required>
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
							  	<select class="form-control" id="id_bibliografia2" name="id_bibliografia" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Capítulo</b></span>
							  	<input type="text" class="form-control" id="capitulo2" name="capitulo">
							</div>
						<!--
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Modificación</b></span>
							  	<input type="text" class="form-control" id="modificacion" name="modificacion" required>
							</div>
						-->
	      				</div>
	      				<br>
	      			<!--
	      				<div class="col-xs-12" id="puntos_clave2">
	      				</div>
	      			-->
	      				<div class="col-xs-12">
	      					<div id="alert44"></div>
	      				</div>
	      			</div>
	      			<hr>
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		
      		</div>
      		<?php echo form_close();?>
    	</div>
  	</div>
</div>