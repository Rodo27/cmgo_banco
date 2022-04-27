

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$especialidad;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="alert" style="background-color:#605ca8;color:#fff;font-size:20px;"><b>CASOS CLÍNICOS</b></div>
					</div>
					<div class="col-sm-12">
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modal1"><i class="glyphicon glyphicon-plus-sign"></i> <b>AGREGAR CASO</b></button><br><br><br>
					</div>
					<div class="col-sm-3">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>División</b></span>
						  	<select class="form-control" id="casos_id_division" onChange="getCombosx({'areas':['casos_id_area',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','NO'],'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','casos']},0)">
						  		<?=$divisiones;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Área</b></span>
						  	<select class="form-control" id="casos_id_area" onChange="getCombosx({'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','casos']},0)"></select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Tema</b></span>
						  	<select class="form-control" id="casos_id_tema" onChange="getTabla('casos','casos_contenedor','casos_estatus','casos_id_tema','casos_id_area','casos_id_division','id_especialidad')"></select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Estatus</b></span>
						  	<select class="form-control" id="casos_estatus" onChange="getTabla('casos','casos_contenedor', 'casos_estatus','casos_id_tema','casos_id_area','casos_id_division','id_especialidad')">
						  		<option value="TODAS">Todos</option>
						  		<option value="BANCO">BANCO</option>
						  		<option value="EXAMEN_2019">EXAMEN 2019</option>
						  		<option value="EXAMEN_2020">EXAMEN 2020</option>
						  		<option value="PILOTO">PILOTO</option>
						  		<option value="PILOTO_2020">PILOTO_2020</option>
						  	</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="casos_contenedor">	
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
	        	<h4 class="modal-title"><b>AGREGAR CASO CLÍNICO</b></h4>
	      	</div>
	      	<?php echo form_open('Casos/addCaso',array('id'=>'addCaso'));?>
	      		<div class="modal-body">
	      			<div class="row">
		      			<div class="col-sm-6">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="add_casos_id_division" onChange="getCombosx({'areas':['add_casos_id_area',false,'add_casos_id_tema','add_casos_id_area','add_casos_id_division','id_especialidad','NO','NO'],'temas':['add_casos_id_tema',false,'add_casos_id_tema','add_casos_id_area','add_casos_id_division','id_especialidad','NO','NO']},0)" required>
							  		<?=$divisiones;?>
							  	</select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="add_casos_id_area" onChange="getCombosx({'temas':['add_casos_id_tema',false,'add_casos_id_tema','add_casos_id_area','add_casos_id_division','id_especialidad','NO','NO']},0)" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="add_casos_id_tema" name="add_casos_id_tema" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Estatus</b></span>
							  	<select class="form-control" id="add_casos_examen_banco" name="add_casos_examen_banco" required>
							  	</select>
							</div>
						</div>
						<div class="col-sm-6 text-center">
							<div class="panel panel-primary">
								<h4><b>Imagen</b></h4>
								<div class="panel-body">
									<img class="img img-responsive tasks-menu" src="<?=base_url();?>files/cc/pregunta.png" style="margin:0 auto;max-height:80px;cursor:pointer;" id="add_casos_img" data-toggle="popover" data-placement="left">
								</div>
								<div class="panel-footer" style="overflow:hidden;">
									<input type="file" accept="image/*" name="add_casos_file" id="add_casos_file">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
						    	<label for="add_casos_caso_clinico"><b>Caso clínico</b></label>
						    	<textarea class="form-control input-sm" id="add_casos_caso_clinico" name="add_casos_caso_clinico" rows="2" required></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="Modal2" >
  	<div class="modal-dialog modal-lg" role="document" style="overflow-y: initial !important">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>EDITAR CASO CLÍNICO</b></h4>
	      	</div>
	      	<?php echo form_open('Casos/updCaso',array('id'=>'updCaso'));?>
	      		<div class="modal-body">
	      			<div class="row">
		      			<div class="col-sm-8">
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="upd_casos_id_division" onChange="getCombosx({'areas':['upd_casos_id_area',false,'upd_casos_id_tema','upd_casos_id_area','upd_casos_id_division','id_especialidad','NO','NO'],'temas':['upd_casos_id_tema',false,'upd_casos_id_tema','upd_casos_id_area','upd_casos_id_division','id_especialidad','NO','NO']},0)" required>
							  		<?=$divisiones;?>
							  	</select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="upd_casos_id_area" onChange="getCombosx({'temas':['upd_casos_id_tema',false,'upd_casos_id_tema','upd_casos_id_area','upd_casos_id_division','id_especialidad','NO','NO']},0)" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="upd_casos_id_tema" name="upd_casos_id_tema" required></select>
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Estatus</b></span>
							  	<select class="form-control" id="upd_casos_examen_banco" name="upd_casos_examen_banco" required onchange="accion(this)">
							  	<!--
							  		<option></option>
							  		<option value="BANCO">Banco</option>
							  		<option value="BANCO_REVISION">Banco_revision</option>
									<option value="EXAMEN">Examen</option>
									<option value="EXAMEN_REVISION">Examen_revisión</option>
								-->
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
								    	<label>Caso Piloto a sustituir</label>
								    	<select class="form-control input-sm" id="accion_comentario_BANCO" name="accion_comentario_BANCO">
								    		<?php
								    			foreach ($cc_piloto as $casos) {
								    				echo '<option value="'.$casos['id_caso_clinico'].'">'.$casos['id_caso_clinico'].'_'.$casos['caso_clinico'].'</option>';
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
								    	<label>Caso Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="accion_comentario_EXAMEN" name="accion_comentario_EXAMEN">
								    		<?php
								    			foreach ($cc_piloto as $casos) {
								    				echo '<option value="'.$casos['id_caso_clinico'].'">'.$casos['id_caso_clinico'].'_'.$casos['caso_clinico'].'</option>';
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
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Caso de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="accion_comentario_PILOTO" name="accion_comentario_PILOTO">
								    		<?php
								    			foreach ($cc_examen as $casos) {
								    				echo '<option value="'.$casos['id_caso_clinico'].'">'.$casos['id_caso_clinico'].'_'.$casos['caso_clinico'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_PILOTO_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_piloto_2020" id="accion_PILOTO_2020">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="PILOTO_MODIFICADA">Modificada</option>
								    		<option value="PILOTO_RESERVA_EXAMEN2">Reserva para examen2</option>
								    		<option value="PILOTO_A_EXAMEN">Subir a Examen</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Caso de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="accion_comentario_PILOTO" name="accion_comentario_PILOTO">
								    		<?php
								    			foreach ($cc_examen as $casos) {
								    				echo '<option value="'.$casos['id_caso_clinico'].'">'.$casos['id_caso_clinico'].'_'.$casos['caso_clinico'].'</option>';
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
								    	<label>Caso de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="accion_comentario_RESERVA" name="accion_comentario_RESERVA">
								    		<?php
								    			foreach ($cc_examen as $casos) {
								    				echo '<option value="'.$casos['id_caso_clinico'].'">'.$casos['id_caso_clinico'].'_'.$casos['caso_clinico'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>

	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_BANCO_REVISION">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_banco_revision" id="accion_BANCO_REVISION">
								    		<option value="SUBIR_EXAMEN">Subir examen</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
								    		<option value="EXAMEN2">Reserva para examen2</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
	      						</div>

	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_EXAMEN_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_examen_2020" id="accion_EXAMEN_2020">
								    		<option value="SUBIR_EXAMEN">Subir examen</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
								    		<option value="EXAMEN2">Reserva para examen2</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
	      						</div>

	      						<div class="col-sm-12 oculto contenedor" id="CONTENEDOR_EXAMEN_2019">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="accion_examen_2019" id="accion_EXAMEN_2019">
								    		<option value="SUBIR_EXAMEN">Subir examen</option>
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
								    		<option value="EXAMEN2">Reserva para examen2</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
	      						</div>

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
								<div class="panel-footer" id="footer_boton_imagenes">
								</div>
							</div>

						</div>
						<div class="col-xs-12">
							<div class="form-group">
						    	<label for="upd_casos_caso_clinico"><b>Caso clínico</b></label>
						    	<textarea class="form-control input-sm" id="upd_casos_caso_clinico" name="upd_casos_caso_clinico" rows="2" required></textarea>
						  	</div>
						  	<div class="form-group">
						    	<label for="upd_casos_modificacion"><b>Modificación</b></label>
						    	<textarea class="form-control input-sm" id="upd_casos_modificacion" name="upd_casos_modificacion" rows="1" required></textarea>
						  	</div>
						</div>
						<div class="col-xs-12">
							<hr style="border-color:#605ca8;">
							<h4><strong>PREGUNTAS DE ESTE CASO</strong> <button class="btn btn-sm btn-success pull-right" type="button" onclick="agregarPregunta()"><i class="glyphicon glyphicon-plus-sign"></i> AGREGAR PREGUNTA</button></h4><br>

							<div id="updContenedorPreguntas">
								<!-- Tabla Preguntas -->
							</div>
						</div>
						<div class="col-xs-12">
							<div id="alert2"></div>
						</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" name="upd_casos_id_caso_clinico" id="upd_casos_id_caso_clinico" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<!--
<div class="modal fade" tabindex="-1" role="dialog" id="Modal3">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title"><b>EDITAR PREGUNTA</b></h4>
	      	</div>
	      	<?php echo form_open('Casos_clinicos/updPregunta',array('id'=>'updPregunta'));?>
	      		<div class="modal-body">
					<div class="row">
	      				<div class="col-sm-6">
	      					<div class="row">
	      						<div class="col-sm-6">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>División</b></span>
									  	<select class="form-control" id="preguntas_id_division" name="preguntas_id_division" onChange="getCombosx({'areas':['preguntas_id_area',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO'],
									  																											  'temas':['preguntas_id_tema',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO'],
									  																											  'casos':['preguntas_id_caso',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO']})" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Tema</b></span>
									  	<select class="form-control" id="preguntas_id_tema" name="preguntas_id_tema" onChange="getCombosx({'casos':['preguntas_id_caso',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO']})" required></select>
									</div>
									<hr>
	      						</div>
	      						<div class="col-sm-6">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Área</b></span>
									  	<select class="form-control" id="preguntas_id_area" name="preguntas_id_area" onChange="getCombosx({'temas':['preguntas_id_tema',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO'],
									  																									  'casos':['preguntas_id_caso',false,'preguntas_id_tema','preguntas_id_area','preguntas_id_division','id_especialidad','NO','NO']})" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Caso</b></span>
									  	<select class="form-control" id="preguntas_id_caso" name="preguntas_id_caso" required></select>
									</div>
									<hr>
	      						</div>
	      						<div class="col-sm-6">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
									  	<select class="form-control" id="preguntas_id_complejidad_cognitiva" name="preguntas_id_complejidad_cognitiva" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Estatus</b></span>
									  	<select class="form-control" id="preguntas_examen_banco" name="preguntas_examen_banco" required>
									  	</select>
									</div>
	      						</div>
	      						<div class="col-sm-6">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Periodo de la vida</b></span>
									  	<select class="form-control" id="preguntas_id_periodo_vida" name="preguntas_id_periodo_vida" required></select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Numeración</b></span>
									  	<select class="form-control" id="preguntas_numeracion" name="preguntas_numeracion" required>
									  		<option value="P1">P1</option>
									  		<option value="P2">P2</option>
									  		<option value="P3">P3</option>
									  		<option value="P4">P4</option>
									  		<option value="P5">P5</option>
									  	</select>
									</div>
	      						</div>
	      						<div class="col-sm-12 oculto sp" id="ACCION_BANCO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control" required onchange="accion(this)" name="preguntas_accion_banco" id="preguntas_accion_BANCO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="BANCO_A_PILOTO">Subir a Piloto</option>
								    		<option value="BANCO_RESERVA_PILOTO">Reserva para Piloto</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto BANCO_A_PILOTO">
								    	<label>Pregunta Piloto a sustituir</label>
								    	<select class="form-control input-sm" id="preguntas_accion_comentario_BANCO" name="preguntas_accion_comentario_BANCO">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto sp" id="ACCION_EXAMEN">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="preguntas_accion_examen" id="preguntas_accion_EXAMEN">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN_FUNCIONA">Funciona</option>
								    		<option value="EXAMEN_MODIFICAR">Modificar</option>
								    		<option value="EXAMEN_ELIMINAR">Eliminar</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN_ELIMINAR">
								    	<label>Pregunta Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="preguntas_accion_comentario_EXAMEN" name="preguntas_accion_comentario_EXAMEN">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto sp" id="ACCION_PILOTO">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="preguntas_accion_piloto" id="preguntas_accion_PILOTO">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="PILOTO_MODIFICADA">Modificada</option>
								    		<option value="PILOTO_RESERVA_EXAMEN2">Reserva para examen2</option>
								    		<option value="PILOTO_A_EXAMEN">Subir a Examen</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="preguntas_accion_comentario_PILOTO" name="preguntas_accion_comentario_PILOTO">
								    		<?php
								    			foreach ($examen as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>
	      						<div class="col-sm-12 oculto sp" id="ACCION_RESERVA">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="preguntas_accion_reserva" id="preguntas_accion_RESERVA">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="EXAMEN1">Reserva para examen1</option>
											<option value="EXAMEN2">Reserva para examen2</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN1">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="preguntas_accion_comentario_RESERVA" name="preguntas_accion_comentario_RESERVA">
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
								  	<input type="text" class="form-control" id="preguntas_analisis_infit" disabled>
								</div>
	      					</div>
	      					<div class="col-xs-6">
	      						<div class="input-group form-group">
								  	<span class="input-group-addon"><b>OUTFIT</b></span>
								  	<input type="text" class="form-control" id="preguntas_analisis_outfit" disabled>
								</div>
	      					</div>
	      					<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>Dificultad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
								  	<input type="text" class="form-control" id="preguntas_analisis_dif" disabled>
								  	<span class="input-group-addon"><b id="dif"> </b></span>
								</div>
								<hr>
								<b>Dificultad</b><br>
								<table class="table-condensed">
									<tbody>
										<tr><td style="background-color:#FF0000;"><b>Fácil</b></td><td><b>700 &mdash; 850</b></td></tr>
										<tr><td style="background-color:#FFD700;"><b>Regular</b></td><td><b>851 &mdash; 1000</b></td></tr>
										<tr><td style="background-color:#7CFC00;"><b>Difícil</b></td><td><b>1001 &mdash; 1150</b></td></tr>
										<tr><td style="background-color:#008000;"><b>Muy difícil</b></td><td><b>1151 &mdash; 1300</b></td></tr>
									</tbody>
								</table>
							</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>Discriminación</b></span>
								  	<input type="text" class="form-control" id="preguntas_analisis_dis" disabled>
								  	<span class="input-group-addon"><b id="dis"> </b></span>
								</div>
								<hr>
								<b>Discriminación</b>
								<table class="table-condensed">
									<tbody>
										<tr><td style="background-color:#008000;"><b>Esperada</b></td><td><b> 1 o más</b></td></tr>
										<tr><td style="background-color:#FFD700;"><b>Regular</b></td><td><b>0.80 &mdash; 0.99</b></td></tr>
										<tr><td style="background-color:#FF0000;"><b>Mala</b></td><td><b> 0.79 o menos</b></td></tr>
									</tbody>
								</table>
							</div>
	      				</div>
	      				<div class="col-xs-12">
	      					<div class="form-group">
						    	<label for="preguntas_pregunta">Pregunta</label>
						    	<textarea class="form-control input-sm" id="preguntas_pregunta" name="preguntas_pregunta" rows="1" required></textarea>
						  	</div>
	      				</div>
	      				<div class="col-xs-12">
							<div class="row">
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción A)</b></span>
									  	<input type="text" class="form-control" id="preguntas_opcion_a" name="preguntas_opcion_a" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="preguntas_opcion_b" name="preguntas_opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="preguntas_opcion_c" name="preguntas_opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="preguntas_opcion_d" name="preguntas_opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="preguntas_opcion_e" name="preguntas_opcion_e">
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
							  	<select class="form-control" id="preguntas_respuesta" name="preguntas_respuesta" required>
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
							  	<select class="form-control" id="preguntas_id_bibliografia" name="preguntas_id_bibliografia" required></select>
							</div>
	      				</div>
	      				<div class="col-sm-12">
	      					<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Capítulo</b></span>
							  	<input type="text" class="form-control" id="preguntas_capitulo" name="preguntas_capitulo">
							</div>
							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Modificación</b></span>
							  	<input type="text" class="form-control" id="preguntas_modificacion" name="preguntas_modificacion" required>
							</div>
	      				</div>
	      				<br>
	      				<div class="col-xs-12" id="preguntas_puntos_clave">
	      				</div>
	      				<div class="col-xs-12">
	      					<div id="alert3"></div>
	      				</div>
	      			</div>
	      		</div>
	      		<div class="panel-footer">
	      			<input type="hidden" id="preguntas_id_pregunta" name="id_pregunta" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>
-->

<?=$editar_pregunta;?>

<!--AUX-->
<input type="hidden" id="id_especialidad" value="<?=$id_especialidad;?>">

<?php echo form_open('Casos/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/getCombo',array('id'=>'getComboEP'));?>
<?php echo form_close();?>

<?php echo form_open('Casos/getTabla',array('id'=>'getTabla'));?>
	<input type="hidden" name="pagina_casos" id="pagina_casos" value="0">
<?php echo form_close();?>

<?php echo form_open('Casos/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<?php echo form_open('Casos/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/getRow',array('id'=>'getRow2'));?>
<?php echo form_close();?>

<?php echo form_open('Casos/getPreguntas',array('id'=>'getPreguntas'));?>
	<input type="hidden" name="pagina_preguntas" id="pagina_preguntas" value="0">
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/updPreguntaPC',array('id'=>'updPreguntaPC'));?>
<?php echo form_close();?>

<div id="popover_content_wrapper" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico">	
</div>
<div id="popover_content_title" style="display:none;">
	<button class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico" onClick="verImagen(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<div id="popover_content_wrapper2" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico2">	
</div>
<div id="popover_content_title2" style="display:none;">
	<button class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico2" onClick="verImagen2(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal25072019">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Casos_clinicos/addPregunta',array('id'=>'addPregunta'));?>
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	      		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:50px;line-height:50%;">
					<span aria-hidden="true">&times;</span>
				</button>
	      	</div>
      		<div class="modal-body">
					<div class="row">
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
							  		<option value="BANCO">BANCO</option>
							  		<option value="PILOTO">PILOTO</option>
							  		<option value="RESERVA">RESERVA</option>
							  	</select>
							</div>
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
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="opcion_b2" name="opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="opcion_c2" name="opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="opcion_d2" name="opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="opcion_e2" name="opcion_e">
									</div>
							  	</div>
							  	<div class="col-xs-4">
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
	      				</div>
	      				<br>
	      				<div class="col-xs-12">
	      					<div id="alert25072019"></div>
	      				</div>
	      			</div>
	      			<hr>
	      			<input type="hidden" name="id_caso" id="id_caso_all" value="0">
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
	      		
      		</div>
      		<?php echo form_close();?>
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



<?php echo form_open('Casos_clinicos/getRow',array('id'=>'getRow2'));?>
<?php echo form_close();?>