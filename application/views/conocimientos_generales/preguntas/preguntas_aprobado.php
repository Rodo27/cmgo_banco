<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="box-title"><b>LISTADO DE REACTIVOS APROBADOS CG</b></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>ESPECIALIDAD</b></span>
						  	<select class="form-control" onChange="getTabla();" id="especialidad_tipo">
						  		<option value="">TODAS</option>
						  		<option value="2">GYO</option>
						  		<option value="3">BRH</option>
						  		<option value="4">MMF</option>
						  		<option value="7">URO</option>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>TIPO REACTIVO</b></span>
						  	<select class="form-control" onChange="getTabla();" id="tipo_reactivo">
						  		<option value="">TODOS</option>
						  		<option value="EXAMEN">EXAMEN</option>
						  		<option value="PILOTO">PILOTO</option>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>VERSIÓN</b></span>
						  	<select class="form-control" onChange="getTabla();" id="version_examen">
						  		<option value="">TODOS</option>
						  		<option value="1">1</option>
						  		<option value="2">2</option>
						  		<option value="3">3</option>
						  	</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="preguntas_contenedor_aprobado">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="preguntaContenido">
  	<div class="modal-dialog modal-sm" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-4"><h4 class="modal-title"> <b>CONTENIDO DE REACTIVO</b></h4></div>
	        	</div>
	      	</div>
      		<div class="modal-body">
      			<div class="row">
					<div class="row">
					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Numero de reactivo</b></span>
							  	<input type="text" class="form-control" disabled id="id_pregunta_banco_aprobado">
							</div>
					  	</div>
					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Pregunta</b></span>
							  	<input type="text" class="form-control" disabled id="pregunta_aprobado">
							</div>
					  	</div>
					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opcion A</b></span>
							  	<input type="text" class="form-control" disabled id="a_aprobado">
							</div>
					  	</div>
					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opcion B</b></span>
							  	<input type="text" class="form-control" disabled id="b_aprobado">
							</div>
					  	</div>

					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opcion C</b></span>
							  	<input type="text" class="form-control" disabled id="c_aprobado">
							</div>
					  	</div>

					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opcion D</b></span>
							  	<input type="text" class="form-control" disabled id="d_aprobado">
							</div>
					  	</div>

					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Opcion E</b></span>
							  	<input type="text" class="form-control" disabled id="e_aprobado">
							</div>
					  	</div>

					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>RESPUESTA</b></span>
							  	<input type="text" class="form-control" disabled id="respuesta_aprobado">
							</div>
					  	</div>

					  	<div class="col-xs-8 col-xs-offset-2">
					  		<div class="input-group form-group">
							  	<span class="input-group-addon"><b>Fecha Autorización</b></span>
							  	<input type="text" class="form-control" disabled id="fecha_aprobado">
							</div>
					  	</div>
					  	
		      		</div>
      			</div>
      		</div>
      		<div class="panel-footer">
      			<div class="row">
	      			<button type="button" class="btn btn-success pull-right" style="margin-right: 30px;" data-dismiss="modal">Cerrar</button>
	      		</div>
      		</div>
    	</div>
  	</div>
</div>