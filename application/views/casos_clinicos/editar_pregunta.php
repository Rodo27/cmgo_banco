<link rel="stylesheet" href="<?=base_url();?>css/zoom.css">
<div class="modal fade" tabindex="-1" role="dialog" id="Modal33" style="overflow-y: scroll;">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Casos_clinicos/updPregunta',array('id'=>'updPregunta'));?>
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:50px;line-height:50%;">
					<span aria-hidden="true">&times;</span>
				</button>
	        	<div class="row">
	        		<div class="col-xs-5">
	        			<h4 class="modal-title">
	        				<b>EDITAR PREGUNTA &mdash; CASOS CLÍNICOS</b>
	        			</h4>
	        		</div>
	        		<input type="hidden" id="id_pregunta_caso">
	        		<!-- <div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2017" value="examen_2017"> EXAMEN 2017<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_1_2" value="examen_2018_1_2"> EXAMEN 2018 1 y 2<br>
	        		</div>
	        		<div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2018_1" value="examen_2018_1"> EXAMEN 2018-1<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_2" value="examen_2018_2"> EXAMEN 2018-2<br>
	        		</div> -->
	        		<div class="col-xs-6">
	        			<!-- <img src="" class="img img-responsive tasks-menu pull-right" style="margin-right:30px;max-height:30px;cursor:pointer;" id="header_url2" data-toggle="popover" data-placement="left"> -->
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">No PREGUNTA: <span id="header_pregunta"></span></span>
	        			<!-- <img src="" class="img img-responsive tasks-menu pull-right" style="margin-right:30px;max-height:30px;cursor:pointer;" id="header_url" data-toggle="popover" data-placement="left"> -->
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">CASO: <span id="header_caso"></span></span>
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">ID REACTIVO: <span id="id_pregunta_reactivo"></span></span>
	        		</div>
	        	</div>
	      	</div>
      		<div class="modal-body">
					<div class="row">
						<div class="col-sm-8">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="id_division" name="id_division" onChange="getCombos({'areas':['id_area',false,'id_division','id_especialidad','NO','NO'],'temas':['id_tema',false,'id_area','id_especialidad','NO','NO'],'casos':['id_caso',false,'id_tema','id_especialidad','NO','NO']})" required></select>
							</div>
  						
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="id_area" name="id_area" onChange="getCombos({'temas':['id_tema',false,'id_area','id_especialidad','NO','NO'],'casos':['id_caso',false,'id_tema','id_especialidad','NO','NO']})" required></select>
							</div>
  					
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="id_tema" name="id_tema" onChange="getCombos({'casos':['id_caso',false,'id_tema', 'id_especialidad', 'NO','NO']})" required></select>
							</div>
  						</div>

  						<div class="col-sm-4 text-left">
							<div class="panel panel-primary">
								<div class="panel-body">

									<input type="hidden" id="hidCSRF" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

		 							<table class="table" id="tabla_imagenes_caso">
		 								<thead>
		 									<th colspan="3" style="text-align: center"><b>IMAGENES DEL CASO</b></th>
		 								</thead>
			    						<tbody >
				     						
		      								
	    								</tbody>
	  								</table>

								</div>
								<div class="panel-footer" id="footer_boton_imagenes_cc">
								</div>
							</div>

						</div>







  						<div class="col-xs-12">
  							<div class="form-group">
							  	<label for="id_caso"><b>Caso</b></label>
							  	<select class="form-control" id="id_caso" name="id_caso" style="height:50px;" required></select>
							</div>
  						</div>
	      				<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
							  	<select class="form-control" id="id_complejidad_cognitiva" name="id_complejidad_cognitiva" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Periodo de la vida</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
							  	<select class="form-control" id="id_periodo_vida" name="id_periodo_vida" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Estatus</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
							  	<select class="form-control" id="examen_banco" name="examen_banco" required>
							  	</select>
							</div>
	      					<div class="row">
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_BANCO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control" required onchange="accion(this)" name="accion_banco" id="accion_BANCO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="BANCO_A_PILOTO">Subir a Piloto</option>
								    		<option value="BANCO_RESERVA_PILOTO">Reserva para Piloto</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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

	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_EXAMEN_2019">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_examen_2019" id="accion_EXAMEN_2019">
								    		<option value="LISTA_EXAMEN">Lista para examen</option>
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    		<!-- <option value="EXAMEN_RESERVA">Reserva</option> -->
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_EXAMEN_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_examen_2020" id="accion_EXAMEN_2020">
								    		<option value="LISTA_EXAMEN">Lista para examen</option>
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    		<!-- <option value="EXAMEN_RESERVA">Reserva</option> -->
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_PILOTO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_piloto" id="accion_PILOTO">
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_PILOTO_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_piloto_2020" id="accion_PILOTO_2020">
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
						</div> 
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
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: solid solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;" ><b>Menor a -2 </b><b class="pull-right">Muy fácil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid;border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>-2 a -1 </b><b class="pull-right">Fácil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a -1 </b><b class="pull-right">Regular</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a 2 </b><b class="pull-right">Difícil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>Mayor a 2 </b><b class="pull-right">Muy difícil</b></h5>
							</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>DISCR  &nbsp; </b></span>
								  	<input type="text" class="form-control" id="analisis_dis" disabled>
								  	<span class="input-group-addon"><b id="dis"> </b></span>
								</div>
								<hr>
								<b>Discriminación</b><br>
								<h5 style="background-color:#2ba72b;margin:0;padding:5px 5px;"><b>0.40 o más</b><b class="pull-right">Muy buena</b></h5>
								<h5 style="background-color:#72d872;margin:0;padding:5px 5px;"><b>0.20 a 0.39</b><b class="pull-right">Buena</b></h5>
								<h5 style="background-color:#FFD700;margin:0;padding:5px 5px;"><b>0.15 a 0.19</b><b class="pull-right">Requiere revisión</b></h5>
								<h5 style="background-color:#FF0000;margin:0;padding:5px 5px;"><b>0.14 o menos</b><b class="pull-right">No discrimina</b></h5>
							</div>
	      				</div>
	      				<div class="col-xs-12">
	      					<div class="form-group">
						    	<label for="pregunta">Pregunta</label>
						    	<textarea class="form-control input-sm" id="pregunta" name="pregunta" rows="1" required></textarea>
						  	</div>
	      				</div>
	      				<div class="col-xs-12">
	      					<div class="row">
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción A)</b></span>
									  	<input type="text" class="form-control" id="opcion_a" name="opcion_a" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="opcion_b" name="opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="opcion_c" name="opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="opcion_d" name="opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="opcion_e" name="opcion_e">
									</div>
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

	      				<!-- inicio de pregunta examen -->

	      				<div class="col-xs-12" id="div_pregunta_examen_boton">
	      					<div class="form-group">
						    	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#div_pregunta_examen" aria-expanded="false" aria-controls="div_pregunta_examen">
							    	Ver contenido de la pregunta actual en el examen
							  	</button>
						  	</div>
						</div>
						<div class="collapse" id="div_pregunta_examen">
						  <div class="card card-body">

						  	<div class="col-xs-12">
		      					<div class="form-group">
							    	<label for="contenido_examen_actual">Caso Clínico</label>
							    	<textarea class="form-control input-sm examen_actual" id="contenido_examen_actual" rows="3" disabled></textarea>
							  	</div>
							</div>

							<div class="col-xs-12">
		      					<div class="col-xs-12" id="imagenes_caso">
							    </div>
							</div>

	    					<div class="col-xs-12">
		      					<div class="form-group">
							    	<label for="pregunta_examen_actual">Pregunta</label>
							    	<textarea class="form-control input-sm examen_actual" id="pregunta_examen_actual" rows="1" disabled></textarea>
							  	</div>
							</div>

							<div class="col-xs-12">
		      					<div class="form-group">
							    	<div class="col-xs-12" id="imagenes_pregunta">
							    	</div>
							  	</div>
							</div>

		      				<div class="col-xs-12">
								<div class="row">
								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción A)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_a_examen" disabled>
										</div>
								  	</div>

								  	<div class="col-xs-4">
								  		<div id="grafica_cc">
								  		</div>
								  	</div>
								  <!-- 	<div class="col-xs-4">
								  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>
								  	</div> -->
								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción B)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_b_examen" disabled>
										</div>
								  	</div>
								  <!-- 	<div class="col-xs-4">
								  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>
								  	</div> -->
								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción C)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_c_examen" disabled>
										</div>
								  	</div>
								  	<!-- <div class="col-xs-4">
								  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>
								  	</div> -->
								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción D)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_d_examen" disabled>
										</div>
								  	</div>
								  	<!-- <div class="col-xs-4">
								  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>
								  	</div> -->
								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción E)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_e_examen" disabled>
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
								  	<input type="text" class="form-control examen_actual" id="respuesta_examen_actual" disabled>
								</div>
		      				</div>
						  </div>
						</div>

						<!-- inicia rubrica-->
	      				<div class="col-xs-12" id="div_rubrica_examen_boton">
	      					<div class="form-group">
						    	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#div_rubrica_examen" aria-expanded="false" aria-controls="div_rubrica_examen">
							    	Ver lista de cotejo
							  	</button>
						  	</div>
						</div>
						<div class="collapse" id="div_rubrica_examen">
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
									      <th scope="row">1.      Corresponde con el árbol temático.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica1" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">2.      Corresponde con el contenido de la especificación.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica2" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">3.      Incluye situaciones comprensibles para todos los sustentantes.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica3" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">4.      Está planteado de manera que no se responde por lógica natural o por inferencia.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica4" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">5.      Es independiente de otros reactivos, en el sentido de que la información contenida en uno, no sugiera la solución ni sea requisito para contestar otro.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica5" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">6.      Emplea un vocabulario que es pertinente para la población objetivo y que favorece su comprensión.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica6" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">7.      Está libre de información que pueda beneficiar a algún grupo social.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica7" value="na"></td>
									    </tr>
									    <tr>
									      <th scope="row">8.      Evita emplear situaciones o vocabulario que puedan resultar ofensivos para algún grupo social.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica8" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">9.      Está libre de estereotipos: sociales, culturales o religiosos.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica9" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">10.      Está fundamentado en fuentes de información arbitradas y confiables.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica10" value="na"></td>
									    </tr>
									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a la base </th>
									    </tr>

									    <tr>
									      <th scope="row">11.       Está redactada de forma afirmativa.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica11" value="na"></td>
									    </tr>
									    <tr>
									      <th scope="row">12.      Especifica claramente la tarea cognitiva que se debe realizar.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica12" value="na"></td>
									    </tr>
									    <tr>
									      <th scope="row">13.      Incluye la referencia documental correspondiente cuando se emplee material de otro autor.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica13" value="na"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a las opciones de respuesta</th>
									    </tr>

									    <tr>
									      <th scope="row">14.      Pertenecen al mismo tema o campo semántico.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica14" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">15.      Tienen concordancia gramatical con la base. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica15" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">16.      Tienen el mismo nivel de generalidad o especificidad.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica16" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">17.      Son distintas entre sí; omiten el uso de sinónimos o respuestas equivalentes.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica17" value="na"></td>
									    </tr>
									    <tr>
									      <th scope="row">18.      Se evita que una opción destaque por su extensión con respecto al resto. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica18" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">19.      Se evita persentar alternativas como: “todas las anteriores”, “ninguna de las anteriores”, “las dos de arriba”, “A y C” o “no sé”. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica19" value="na"></td>
									    </tr>
									    <tr>
									      <th scope="row">20.      Evitan la repetición de palabras o frases entre ellas, éstas deberán formar parte de la base. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica20" value="na"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a la respuesta correcta</th>
									    </tr>

									    <tr>
									      <th scope="row">21.      Existe y es única</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica21" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">22.      Resuelve completamente el planteamiento.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica22" value="na"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a los distractores</th>
									    </tr>

									    <tr>
									      <th scope="row">23.      Son plausibles y son elegibles como posible respuesta de quien no sabe o de quien comete un error. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica23" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">24.      Representan los errores más comunes de aquellos que no poseen el conocimiento o la habilidad evaluada. </th>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica24" value="na"></td>
									    </tr>

									    <tr class="success">
									      <th scope="row" colspan="4">Con referencia a las imágenes y tablas</th>
									    </tr>

									    <tr>
									      <th scope="row">25.      Son indispensables para contestar el reactivo.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica25" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">26.      Contienen los elementos necesarios para su identificación e interpretación.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica26" value="na"></td>
									    </tr>

									    <tr>
									      <th scope="row">27.      Si el reactivo tiene más de una, todas deben tener un formato y tamaño similar.</th>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="si"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="no"></td>
									      <td style="text-align:center;"><input type="radio" name="rubrica27" value="na"></td>
									    </tr>

									  </tbody>
									</table>
									<button class="btn btn-primary" type="button" id="guardar_rubrica">GUARDAR LISTA DE COTEJO</button>
			      				</div>
		      				</div>
						  </div>
						</div>
	      				<!-- termina rubrica-->
	      				
						<div class="col-xs-12"><hr></div>
	      				<!-- fin de pregunta examen -->






	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Bibliografía</b></span>
							  	<select class="form-control" id="id_bibliografia" name="id_bibliografia" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Capítulo</b></span>
							  	<input type="text" class="form-control" id="capitulo" name="capitulo">
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Modificación</b></span>
							  	<input type="text" class="form-control" id="modificacion" name="modificacion" required>
							</div>

							<!-- <div class="panel panel-primary">
								<h4><b>Cambiar Imagen</b></h4>
								<div class="panel-body">
									<img class="img img-responsive tasks-menu2" src="<?=base_url();?>files/cc/pregunta.png" style="margin:0 auto;max-height:80px;cursor:pointer;" id="upd_pregunta_imagen_url" data-toggle="popover" data-placement="left">
								</div>
								<div class="panel-footer" style="overflow:hidden;">
									<input type="file" accept="image/*" name="upd_pregunta_file" id="upd_pregunta_file">
									<input type="hidden" name="upd_pregunta_imagen" id="upd_pregunta_imagen" value="0">
								</div>
							</div> -->
	      				</div>
	      				<div class="col-sm-4 col-sm-offset-4 text-center">
							<div class="panel panel-primary">
								<div class="panel-body">

		 							<table class="table table-bordered table-striped" id="tabla_imagenes_pregunta">
		 								<thead>
		 									<th colspan="3" style="text-align: center"><b>IMAGENES DE LA PREGUNTA</b></th>
		 								</thead>
			    						<tbody>
	    								</tbody>
	  								</table>

								</div>
								<div class="panel-footer" id="footer_boton_imagenes_pregunta">
								</div>
							</div>

						</div>
	      				<br>
	      				<div class="col-xs-12" id="puntos_clave">
	      				</div>
	      				<div class="col-xs-12">
	      					<div id="alert33"></div>
	      				</div>
	      			</div>
	      			<hr>
	      			<input type="hidden" id="id_pregunta" name="id_pregunta" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      			<button type="button" class="btn btn-success pull-right" onclick="abrir_aprobar();" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>APROBAR REACTIVO</b></button>
	      		
      		</div>
      		<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="login">
  	<div class="modal-dialog modal-sm" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-4"><h4 class="modal-title"> <b>APROBAR REACTIVO</b></h4></div>
	        	</div>
	      	</div>
      		<div class="modal-body">
      			<div class="row">
					<div class="row">
					  	<div class="col-xs-6 col-xs-offset-3">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>DIRECTOR DE CERTIFICACIÓN</b></span>
							  	<input type="text" class="form-control" disabled VALUE="Dra. Teresa Leis Márquez" id="director_verificacion">
							</div>
					  	</div>
					  	<div class="col-xs-6 col-xs-offset-3">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>PASSWORD</b></span>
							  	<input type="password" class="form-control" id="password_aprobar">
							</div>
					  	</div>
		      		</div>
      				<div class="col-xs-6 col-xs-offset-3">
      					<div id="alertLogin"></div>
      				</div>
      			</div>
      		</div>
      		<div class="panel-footer">
      			<div class="row">
	      			<div class="col-xs-4 col-xs-offset-4">
	      				<button type="button" class="btn btn-success center" onClick=aprobar_reactivo();><i class="glyphicon glyphicon-floppy-disk"></i> <b>APROBAR REACTIVO</b></button>
	      			</div>
	      		</div>
      		</div>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal5" >
    <div class="modal-dialog" role="document" style="width: 30%!important;">
      <div class="modal-content">
          <div class="modal-header" style="background-color:#605ca8;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div id="titulo_modal" name="titulo_modal"><h4><b>Alerta</b></h4></div>
          </div>
            <div class="modal-body text-center" id="cuerpo_autorizacion">
             
            </div>
            <div class="panel-footer">
              <h3> <button type="button" class="btn btn-primary btn-lg btn-block center-block" data-dismiss="modal">Aceptar</button></h3>
              
            </div>
      </div>
    </div>
 </div>
