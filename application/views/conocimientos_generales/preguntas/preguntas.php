<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b><?=$especialidad;?></b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="alert" style="background-color:#605ca8;color:#fff;font-size:20px;"><b>PREGUNTAS</b></div>
					</div>
					<div class="col-sm-8">
						<button class="btn btn-success btn-lg pull-right" onClick="addPregunta('id_tema2','addPregunta')"><i class="glyphicon glyphicon-plus"></i> Agregar pregunta</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>División</b></span>
						  	<select class="form-control" id="casos_id_division" onChange="getCombos({'areas':['casos_id_area',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','NO'],'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']})">
						  		<?=$divisiones;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Área</b></span>
						  	<select class="form-control" id="casos_id_area" onChange="getCombos({'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']})"></select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Tema</b></span>
						  	<select class="form-control" id="casos_id_tema" onChange="getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad')"></select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Estatus</b></span>
						  	<select class="form-control" onChange="getTableNewFilter(this)" id="nfEstatus">
						  		<option value="TODAS">TODAS</option>
						  		<!-- <option value="EXAMEN">EXAMEN</option> -->
						  		<option value="EXAMEN_2019">EXAMEN_2019</option>
						  		<option value="EXAMEN_2020">EXAMEN_2020</option>
						  		<option value="BANCO">BANCO</option>
						  		<option value="PILOTO">PILOTO</option>
						  		<option value="PILOTO_2020">PILOTO_2020</option>
						  		<option value="RESERVA">RESERVA</option>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<!--BANCO-->
						<div class="input-group form-group nf nfTODAS">
						  	<span class="input-group-addon"><b>Acción</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_TODAS" id="nfEstatus_TODAS">
						  		<option value="TODAS">TODAS</option>
						  	</select>
						</div>
						<!--BANCO-->
						<div class="input-group form-group nf nfBANCO">
						  	<span class="input-group-addon"><b>Acción Banco</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_BANCO" id="nfEstatus_BANCO">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="BANCO_A_PILOTO">Subir a Piloto</option>
						    	<option value="BANCO_RESERVA_PILOTO">Reserva para Piloto</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						  	</select>
						</div>
						<!--EXAMEN-->
						<div class="input-group form-group nf nfEXAMEN">
						  	<span class="input-group-addon"><b>Acción Examen</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_EXAMEN" id="nfEstatus_EXAMEN">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="EXAMEN_FUNCIONA">Funciona</option>
						    	<option value="EXAMEN_MODIFICAR">Modificada</option>
						    	<option value="EXAMEN_ELIMINAR">Eliminar</option>
						    	<option value="EXAMEN_RESERVA">Reserva</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						  	</select>
						</div>
							<!--EXAMEN_2019-->
						<div class="input-group form-group nf nfEXAMEN_2019">
						  	<span class="input-group-addon"><b>Acción Examen</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_EXAMEN_2019" id="nfEstatus_EXAMEN_2019">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="LISTA_EXAMEN">Lista para examen</option>
						    	<option value="LISTA_PILOTO">Lista para piloto</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    	<!-- <option value="EXAMEN_MODIFICAR">Modificada</option>
						    	<option value="EXAMEN_ELIMINAR">Eliminar</option> -->
						    	<!-- <option value="EXAMEN_RESERVA">Reserva</option> -->
						  	</select>
						</div>
						<!--EXAMEN_2020-->
						<div class="input-group form-group nf nfEXAMEN_2020">
						  	<span class="input-group-addon"><b>Acción Examen</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_EXAMEN_2020" id="nfEstatus_EXAMEN_2020">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="LISTA_EXAMEN">Lista para examen</option>
						    	<option value="LISTA_PILOTO">Lista para piloto</option>
						    	<option value="REVISADA_COMITE">Revisada por comité</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    	<!-- <option value="EXAMEN_MODIFICAR">Modificada</option> -->
						    	<!-- <option value="EXAMEN_ELIMINAR">Eliminar</option> -->
						    	<!-- <option value="EXAMEN_RESERVA">Reserva</option> -->
						  	</select>
						</div>
						<!--PILOTO-->
						<div class="input-group form-group nf nfPILOTO">
						  	<span class="input-group-addon"><b>Acción Piloto</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_PILOTO" id="nfEstatus_PILOTO">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="LISTA_PILOTO">Lista para piloto</option>
						    	<option value="REVISADA_COMITE">Revisada por comité</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						  	</select>
						</div>
						<!--PILOTO_2020-->
						<div class="input-group form-group nf nfPILOTO_2020">
						  	<span class="input-group-addon"><b>Acción Piloto</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_PILOTO_2020" id="nfEstatus_PILOTO_2020">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="LISTA_PILOTO">Lista para piloto</option>
						    	<option value="REVISADA_COMITE">Revisada por comité</option>
						    	<option value="RT_APROBADO">RT aprobado</option>
						    	<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						  	</select>
						</div>
						<!--RESERVA-->
						<div class="input-group form-group nf nfRESERVA">
						  	<span class="input-group-addon"><b>Acción Reserva</b></span>
						  	<select class="form-control" onChange="getTableNewFilter2(this)" name="nfEstatus_RESERVA" id="nfEstatus_RESERVA">
						  		<option value="TODAS">TODAS</option>
						  		<option value="POR_REVISAR">Por revisar</option>
						    	<option value="EXAMEN1">Reserva para examen1</option>
						    	<option value="EXAMEN2">Reserva para examen2</option>
						  	</select>
						</div>
					</div>
					<!-- <div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Versión</b></span>
						  	<select class="form-control" onChange="getTableNewFilter(this)" id="nfVersion">
						  		<option value="TODAS">TODAS</option>
						  		<option value="1">1</option>
						  		<option value="2">2</option>
						  		<option value="3">3</option>
						  	</select>
						</div>
					</div> -->
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

<div class="modal fade" tabindex="-1" role="dialog" id="Modal3" style="overflow-y: scroll;">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Conocimientos_generales/updPregunta',array('id'=>'updPregunta'));?>
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-7">
	        			<h4 class="modal-title">
	        				<b>EDITAR PREGUNTA &mdash; CONOCIMIENTOS GENERALES</b>
	        			</h4>
	        		</div>
	        		<!-- <div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2017" value="examen_2017"> EXAMEN 2017<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_1_2" value="examen_2018_1_2"> EXAMEN 2018 1 y 2<br>
	        		</div>
	        		<div class="col-xs-2" style="padding:0;">
	        			<input type="radio" name="tipo_examen" id="examen_2018_1" value="examen_2018_1"> EXAMEN 2018-1<br>
	        			<input type="radio" name="tipo_examen" id="examen_2018_2" value="examen_2018_2"> EXAMEN 2018-2<br>
	        		</div> -->
	        		<div class="col-xs-2">
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">No PREGUNTA: <span id="head_id_pregunta"></span></span>        			
	        		</div>

	        		<div class="col-xs-2">
	        			<span class="label label-success pull-right" style="margin-right:30px;font-size:18px;">ID REACTIVO: <span id="id_pregunta_reactivo"></span></span>        			
	        		</div>

	        	</div>
	      	</div>
	      	
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="id_division" name="id_division" onChange="getCombosx({'areas':['id_area',false,'id_division','id_especialidad','NO','NO'],					  'temas':['id_tema',false,'id_area','id_especialidad','NO','NO']})" required></select>
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
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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

	      						<!-- EXAMEN_2020 -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_EXAMEN_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_examen_2020" id="upd_preguntas_accion_EXAMEN_2020">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="LISTA_EXAMEN">Lista para examen</option>
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    		<!-- <option value="EXAMEN_MODIFICAR">Modificada</option>
								    		<option value="EXAMEN_ELIMINAR">Eliminar</option>
								    		<option value="EXAMEN_RESERVA">Reserva</option> -->
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN_ELIMINAR EXAMEN_RESERVA">
								    	<label>Pregunta Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_EXAMEN_2020" name="upd_preguntas_accion_comentario_EXAMEN_2020">
								    		<?php
								    			foreach ($piloto as $pregunta) {
								    				echo '<option value="'.$pregunta['id_pregunta'].'">'.$pregunta['id_pregunta'].'_'.$pregunta['pregunta'].'</option>';
								    			}
								    		?>
								    	</select>
								  	</div>
	      						</div>

	      						<!-- EXAMEN_2019 -->
	      						<div class="col-sm-12 oculto sp" id="ACCION_EXAMEN_2019">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_examen_2019" id="upd_preguntas_accion_EXAMEN_2019">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="LISTA_EXAMEN">Lista para examen</option>
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    		<!-- <option value="EXAMEN_MODIFICAR">Modificada</option>
								    		<option value="EXAMEN_ELIMINAR">Eliminar</option>
								    		<option value="EXAMEN_RESERVA">Reserva</option> -->
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto EXAMEN_ELIMINAR EXAMEN_RESERVA">
								    	<label>Pregunta Piloto a incorporar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_EXAMEN_2019" name="upd_preguntas_accion_comentario_EXAMEN_2019">
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
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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

	      						<!-- PILOTO 2020-->
	      						<div class="col-sm-12 oculto sp" id="ACCION_PILOTO_2020">
	      							<div class="form-group input-group">
								    	<label class="input-group-addon"><b>Acción</b></label>
								    	<select class="form-control input-sm" required onchange="accion(this)" name="upd_preguntas_accion_piloto_2020" id="upd_preguntas_accion_PILOTO_2020">
								    		<option value="POR_REVISAR">Por revisar</option>
								    		<option value="LISTA_PILOTO">Lista para piloto</option>
								    		<option value="REVISADA_COMITE">Revisada por comité</option>
								    		<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
								    	</select>
								  	</div>
								  	<div class="form-group accion oculto PILOTO_A_EXAMEN">
								    	<label>Pregunta de Examen a reemplazar</label>
								    	<select class="form-control input-sm" id="upd_preguntas_accion_comentario_PILOTO_2020" name="upd_preguntas_accion_comentario_PILOTO_2020">
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
											<option value="RT_APROBADO">RT aprobado</option>
						    				<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
						    				<option value="REVISADA_2021">Revisada 2021</option>
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
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: solid solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;" ><b>Menor a -2 </b><b class="pull-right">Muy fácil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid;border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>-2 a -1 </b><b class="pull-right">Fácil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a -1 </b><b class="pull-right">Regular</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>1 a 2 </b><b class="pull-right">Difícil</b></h5>
								<h5 style="background-color:white;margin:0;padding:5px 5px; border: solid 0.1em; border-style: none solid solid solid; border-radius: 0; box-shadow: none; border-color: #d2d6de;"><b>Mayor a 2 </b><b class="pull-right">Muy difícil</b></h5>
							</div>
							<div class="col-xs-6">
								<div class="input-group form-group">
								  	<span class="input-group-addon"><b>Discriminación</b></span>
								  	<input type="text" class="form-control" id="upd_preguntas_analisis_dis" disabled>
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
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_b" name="upd_preguntas_opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_c" name="upd_preguntas_opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_d" name="upd_preguntas_opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="upd_preguntas_opcion_e" name="upd_preguntas_opcion_e">
									</div>
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
							    	<label for="pregunta_examen_actual">Pregunta</label>
							    	<textarea class="form-control input-sm examen_actual" id="pregunta_examen_actual" rows="1" disabled></textarea>
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
								  	
								  	<div class="col-xs-4" style="z-index: 10">
								  		<div id="grafica_cg">
								  		</div>
								  	</div>

								  	<div class="col-xs-8">
								  		<div class="input-group form-group">
										  	<span class="input-group-addon"><b>Opción B)</b></span>
										  	<input type="text" class="form-control examen_actual" id="opcion_b_examen" disabled>
										</div>
								  	</div>
								  	<!-- <div class="col-xs-4">
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
	      				<!-- fin de pregunta examen -->

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
	      				<div class="col-sm-12">
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

	      			<button type="button" class="btn btn-success pull-right" onclick="abrir_aprobar();" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>APROBAR REACTIVO</b></button>

	      		</div>
	      	<?php echo form_close();?>
    	</div>
  	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="Modal44">
  	<div class="modal-dialog modal-lg" role="document">
   	 	<div class="modal-content">
   	 		<?php echo form_open('Conocimientos_generales/addPregunta',array('id'=>'addPregunta'));?>
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
	      	
	      		<div class="modal-body">
	      			<div class="row">
	      				<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>División</b></span>
							  	<select class="form-control" id="id_division2" name="id_division" onChange="getCombosx({'areas':['id_area2',false,'id_division2','id_especialidad','NO','NO'],
							  																						  'temas':['id_tema2',false,'id_area2','id_especialidad','NO','NO']})" required>
							  		<option value="181206"></option>
							  		<?=$divisiones2;?>																		  	
							  	</select>

							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Área</b></span>
							  	<select class="form-control" id="id_area2" name="id_area" onChange="getCombosx({'temas':['id_tema2',false,'id_area2','id_especialidad','NO','NO']})" required></select>
							</div>
  						</div>
  						<div class="col-sm-4">
  							<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Tema</b></span>
							  	<select class="form-control" id="id_tema2" name="upd_preguntas_id_tema" required></select>
							</div>
  						</div>
	      				<div class="col-sm-6">
	      					<div class="row">
	      						<div class="col-sm-12">
	      							<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Complejidad cognitiva</b></span>
									  	<select class="form-control" id="id_complejidad_cognitiva2" name="upd_preguntas_id_complejidad_cognitiva" required>
									  		<?=$complejidad_cognitiva;?>
									  	</select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Periodo de la vida</b></span>
									  	<select class="form-control" id="id_periodo_vida2" name="upd_preguntas_id_periodo_vida" required>
									  		<?=$periodo_vida;?>
									  	</select>
									</div>
									<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Estatus</b></span>
									  	<select class="form-control" id="examen_banco2" name="upd_preguntas_examen_banco" required>
									  		<option value="EXAMEN">EXAMEN</option>
									  		<option value="EXAMEN_2019">EXAMEN_2019</option>
									  		<option value="EXAMEN_2020">EXAMEN_2020</option>
									  		<option value="EXAMEN">EXAMEN</option>
									  		<option value="BANCO">BANCO</option>
									  		<option value="PILOTO">PILOTO</option>
									  		<option value="PILOTO_2020">PILOTO_2020</option>
									  		<option value="RESERVA">RESERVA</option>
									  	</select>
									</div>
	      						</div>
	      					</div>	
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
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_a"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción B)</b></span>
									  	<input type="text" class="form-control" id="opcion_b2" name="upd_preguntas_opcion_b" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_b"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción C)</b></span>
									  	<input type="text" class="form-control" id="opcion_c2" name="upd_preguntas_opcion_c" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_c"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción D)</b></span>
									  	<input type="text" class="form-control" id="opcion_d2" name="upd_preguntas_opcion_d" required>
									</div>
							  	</div>
							  	<div class="col-xs-4">
							  		<!--<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="uso_d"></div></div>-->
							  	</div>

							  	<div class="col-xs-8">
							  		<div class="input-group form-group">
									  	<span class="input-group-addon"><b>Opción E)</b></span>
									  	<input type="text" class="form-control" id="opcion_e2" name="upd_preguntas_opcion_e">
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
							  	<select class="form-control" id="id_bibliografia2" name="upd_preguntas_id_bibliografia" required><?=$bibliografia;?></select>
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
	      			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
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

<!--AUX-->
<input type="hidden" id="id_especialidad" value="<?=$id_especialidad;?>">

<?php echo form_open('Casos/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/getTabla',array('id'=>'getTabla'));?>
	<input type="hidden" name="pagina_preguntas" id="pagina_preguntas" value="0">
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/updPreguntaPC',array('id'=>'updPreguntaPC'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/getRow',array('id'=>'getRow'));?>
<?php echo form_close();?>

<?php echo form_open('Conocimientos_generales/delRow',array('id'=>'delRow'));?>
<?php echo form_close();?>

<!-- Editar Pregunta -->
<?php echo form_open('Casos_clinicos/getCombo',array('id'=>'getCombox'));?>
<?php echo form_close();?>

