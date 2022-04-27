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
						<button class="btn btn-lg btn-success pull-right" onClick="addPregunta('id_tema2','addOperativos')"> <i class="glyphicon glyphicon-plus"></i> Nueva pregunta</button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>División</b></span>
						  	<select class="form-control" id="casos_id_division" onChange="getCombosx({'areas':['casos_id_area',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','NO'],'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']})">
						  		<?=$divisiones;?>
						  	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Área</b></span>
						  	<select class="form-control" id="casos_id_area" onChange="getCombosx({'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']})"></select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="input-group form-group">
						  	<span class="input-group-addon"><b>Tema</b></span>
						  	<select class="form-control" id="casos_id_tema" onChange="getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad')"></select>
						</div>
					</div>
					<div class="col-sm-12">
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
								    	<option value="REVISADA_COMITE">Revisada por comité</option>
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
								    	<option value="RT_APROBADO">RT aprobado</option>
						    			<option value="RT_AJUSTES_APROBAR">RT ajustes por aprobar</option>
								  	</select>
								</div>
							</div>
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


<div id="popover_content_wrapper" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico">	
</div>
<div id="popover_content_title" style="display:none;">
	<button type="button" class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico" onClick="verImagen(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<div id="popover_content_wrapper2" style="display:none;">
	<img src="#" class="img img-responsive" style="margin:0 auto;" id="imagen_caso_clinico2">	
</div>
<div id="popover_content_title2" style="display:none;">
	<button type="button" class="btn btn-primary btn-sm" id="btn_imagen_caso_clinico2" onClick="verImagen2(this)"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;&nbsp; Ver en tamaño completo</button>
</div>

<?=$editar_pregunta;?>
<?=$agregar_pregunta;?>

<!--AUX-->
<input type="hidden" id="id_especialidad" value="<?=$id_especialidad;?>">

<?php echo form_open('Casos/getCombo',array('id'=>'getCombo'));?>
<?php echo form_close();?>

<?php echo form_open('Casos/getTabla',array('id'=>'getTabla'));?>
	<input type="hidden" name="pagina_preguntas" id="pagina_preguntas" value="0">
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/getRow',array('id'=>'getRow2'));?>
<?php echo form_close();?>

<?php echo form_open('Casos/getPreguntas',array('id'=>'getPreguntas'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/updPreguntaPC',array('id'=>'updPreguntaPC'));?>
<?php echo form_close();?>

<?php echo form_open('Casos_clinicos/getCombo',array('id'=>'getComboEP'));?>
<?php echo form_close();?>