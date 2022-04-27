<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b>CONOCIMIENTOS GENERALES <?=$especialidad;?></b></h4>
				<input type="hidden" id="rol" value="<?=$this->session->rol;?>">
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-sm btn-success pull-right registrar" data-toggle="modal" onclick="abrirModalRegistro();"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR PREGUNTA</b></button><br><br><br>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>División</b></span>
						  	<select class="form-control" id="tabla_id_division" onChange="getAreas_tabla(this.value);getTemas_tabla(null); getTabla();">
						  		
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Área</b></span>
						  	<select class="form-control" id="tabla_id_area" onChange="getTemas_tabla(this.value); getTabla();">
						  		
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Tema</b></span>
						  	<select class="form-control" id="tabla_id_tema" onChange="getTabla();">
						  		
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Estatus</b></span>
						  	<select class="form-control" id="tabla_id_estatus" onChange="getTabla();">
						  		
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Acción</b></span>
						  	<select class="form-control" id="tabla_id_accion" onChange="getTabla();">
						  		
						  	</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="preguntas_contenedor">	
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
	        	<div class="row">
	        		<div class="col-xs-4">
	        			<h4 class="modal-title">
	        				<b>AGREGAR PREGUNTA &mdash; CONOCIMIENTO GENERALES</b>
	        			</h4>
	        		</div>
	        	</div>
	      	</div>
	      	
			  <form id="registro_pregunta_form" method="get">
			  	
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-4">
  							<div class="input-group form-group">
							  
									<span class="input-group-addon"><b>División</b></span>
									<select class="form-control campo-division" id="id_division2" name="id_division" onChange="getAreas(this.value);" required>
									</select>

								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Área</b></span>
									<select class="form-control campo-area" id="id_area2" name="id_area" onChange="getTemas(this.value);" required></select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Tema</b></span>
									<select class="form-control campo-tema" id="id_tema2" name="id_tema" onChange="getPuntosClave_tabla(this.value);" required></select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
											<select class="form-control campo-complejidad-cognitiva" id="id_complejidad_cognitiva2" name="upd_preguntas_id_complejidad_cognitiva" required>
											</select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Periodo de la vida</b></span>
											<select class="form-control campo-periodo" id="id_periodo_vida2" name="upd_preguntas_id_periodo_vida" required>
											</select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Estatus</b></span>
											<select class="form-control campo-estatus" id="estatus_list" name="id_estatus">
											</select>
										</div>
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Acción</b></span>
											<select class="form-control campo-accion" id="accion_list" name="id_accion">
											</select>
										</div>
									</div>
									
								</div>	
							</div>
							<div class="col-md-6" id="tabla_puntos">
								<input type="hidden" id="puntos_clave_arreglo"  name="puntos_clave" class="puntos_clave_arreglo">
								<table class="table table-striped table-condensed tabla_pc" id="tabla_puntos_clave">
									<thead>
										<th>Numeración</th>
										<th>Punto Clave</th>
										<th>check</th>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="upd_preguntas_pregunta">Pregunta</label>
									<textarea class="form-control input-sm" id="pregunta2" name="upd_preguntas_pregunta" rows="1" required></textarea>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción A)</b></span>
											<input type="text" class="form-control" id="opcion_a2" name="upd_preguntas_opcion_a" required>
										</div>
									</div>
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción B)</b></span>
											<input type="text" class="form-control" id="opcion_b2" name="upd_preguntas_opcion_b" required>
										</div>
									</div>
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción C)</b></span>
											<input type="text" class="form-control" id="opcion_c2" name="upd_preguntas_opcion_c" required>
										</div>
									</div>
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción D)</b></span>
											<input type="text" class="form-control" id="opcion_d2" name="upd_preguntas_opcion_d" required>
										</div>
									</div>
									<div class="col-xs-8">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Opción E)</b></span>
											<input type="text" class="form-control" id="opcion_e2" name="upd_preguntas_opcion_e">
										</div>
									</div>
									<div class="col-xs-12"><hr></div>	
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Respuesta</b></span>
									<select class="form-control" id="respuesta2" name="upd_preguntas_respuesta" required>
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
									<select class="form-control campo-bibliografia" id="id_bibliografia2" name="upd_preguntas_id_bibliografia" required><?=$bibliografia;?></select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="input-group form-group">
									<span class="input-group-addon"><b>Capítulo</b></span>
									<input type="text" class="form-control" id="capitulo2" name="upd_preguntas_capitulo">
								</div>
							</div>
							<br>
							<div class="col-xs-12" id="upd_preguntas_puntos_clave">
							</div>
							<div class="col-xs-12">
								<div id="alert44"></div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
					
							<div class="alert alert-success" id="registrado1" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>¡Se registró correctamente!</strong> Su pregunta esta guardada.
							</div>
							<div class="alert alert-danger" id="registrado_mal1" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Salió algo mal</strong> Su pregunta no fue guardada.
							</div>
						
	      			<button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
				</form>
	      		</div>
	      	
    	</div>
  	</div>
</div>

<div class="modal fade " tabindex="-1" role="dialog" id="Modal2" >
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
								<button class="btn btn-primary collapsed " id="ocul_ver" value="0" onClick="verOcultarCalibracion(this.value);"  type="button" data-toggle="collapse" data-target="#dif-discri , #infit-outfit-dif-disc" aria-expanded="false" aria-controls="dif-discri , infit-outfit-dif-disc">
													 Calibración
								</button>
							</div>
						</div>


						<div class="row">
							<!-- Bloque para INFIT, OUTFIT, DIF, DISCR, Dificultad y Discriminación -->
							
								<div class="row" id="bloque">
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
									<button class="btn btn-primary" value="1" id="actual_examen" type="button" onClick="getContenidoActualPregunta();" data-toggle="collapse" data-target="#div_pregunta_examen" saria-controls="div_pregunta_examen">
										Ver contenido de la pregunta actual en el examen
									</button>
						  		</div>
							</div>
							<div class="collapse" id="div_pregunta_examen">
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

<div class="modal fade" tabindex="-1" role="dialog" id="login" style="display: none;">
  	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
							  	<input type="text" class="form-control" disabled="" value="Dra. Teresa Leis Márquez" id="director_verificacion">
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
	      				<button type="button" class="btn btn-success center" onclick="aprobarPreguntaCG();"><i class="glyphicon glyphicon-floppy-disk"></i> <b>APROBAR REACTIVO</b></button>
	      			</div>
	      		</div>
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
