<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><b>USUARIOS</b></h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<button class="btn btn-sm btn-success pull-right" data-toggle="modal" onclick="nuevoRegistro();"><i class="glyphicon glyphicon-plus-sign"></i> <b>Agregar Usuario</b></button><br><br><br>
					</div>					
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-12" id="usuarios">	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="registraUsuario">
  	<div class="modal-dialog modal-lg modalPequena" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<h4 class="modal-title">
	        				<b>USUARIOS &mdash; REGISTRAR NUEVO USUARIO</b>
	        			</h4>
	        		</div>
	        	</div>
	      	</div>
	      	
			  <form id="registro_usuario" method="get">
			  	
	      		<div class="modal-body">
	      			<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Usuario</b></span>
											<input type="text" class="form-control" id="usuario" name="usuario" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Correo</b></span>
											<input type="text" class="form-control" id="opcion_b2" name="correo" required>
										</div>
									</div>
									<div class="col-xs-10">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Contraseña</b></span>
											<input type="password" class="form-control" id="contrase" name="contrase" required>
										</div>
									</div>

									<div class="col-xs-2">
										<i class="glyphicon glyphicon-ok-sign validacion" id="bien2" style="width: 10px;display:none;color:green"></i>
										<i class="glyphicon glyphicon-remove-sign validacion" id="mal2" style="width: 10px;display:none;color:red"></i>
									</div>

									<div class="col-xs-10">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Confirmar Contraseña</b></span>
											<input type="password" class="form-control" id="contraV" name="contra" required>
										</div>
									</div>
									
									<div class="col-xs-2">
										<i class="glyphicon glyphicon-ok-sign validacion" id="bien1" style="width: 10px;display:none;color:green"></i>
										<i class="glyphicon glyphicon-remove-sign validacion" id="mal1" style="width: 10px;display:none;color:red"></i>
									</div>
									

									<input type="hidden" id="estatus" name="estatus" value="Activo">
									<input type="hidden" id="misma">
	
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Rol</b></span>
											<select class="form-control campo-especialidad" id="rol_e2" name="rol" required>
												<option value="">Seleccionar</option>
												<option value="admin">Administrador</option>
												<option value="medico">Medico</option>
												<option value="certificacion">Certificación</option>
											</select>
										</div>
									</div>

									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Especialidad</b></span>
											<select class="form-control campo-especialidad" id="id_especialidad" name="id_especialidad" required>
												<option value="">Seleccionar</option>
												<option value="2">GYO</option>
												<option value="3">BRH</option>
												<option value="4">MMF</option>
												<option value="7">URO</option>
											</select>
										</div>
									</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
					
							<div class="alert alert-success" id="usuario_registrado" style="display : none">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<p id="mensaje_r"><strong>¡Se registró correctamente!</strong></p>
							</div>
							
						
	      				<button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
					</div>
				</form>
	      	</div>
		</div>
	</div>
</div>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="editaUsuario" >
	<div class="modal-dialog modal-dialog-centered modalPequena" role="document">
   	 	<div class="modal-content">
	      	<div class="modal-header" style="background-color:#605ca8;color:#fff;">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<h4 class="modal-title">
	        				<b>USUARIOS &mdash; EDITAR USUARIO</b>
	        			</h4>
	        		</div>
	        	</div>
	      	</div>
	      	
			  <form id="edicion_usuario" method="get">
			  	
	      		<div class="modal-body">
	      			<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Usuario</b></span>
											<input type="text" class="form-control" id="usuario_e" name="usuario_e" disabled>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Correo</b></span>
											<input type="text" class="form-control" id="correo_e" name="correo_e" disabled>
										</div>
									</div>
									<div class="col-xs-10">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Nueva Contraseña</b></span>
											<input type="password" class="form-control" id="contrase_e" name="contrase"  required>
										</div>
									</div>

									<div class="col-xs-2">
											<i class="glyphicon glyphicon-ok-sign noti" id="bien_e" style="width: 10px;display:none;color:green;"></i>
											<i class="glyphicon glyphicon-remove-sign noti" id="mal_e" style="width: 10px;display:none;color:red;"></i>
									</div>

									<div class="col-xs-10">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Confirmar Contraseña</b></span>
											<input type="password" class="form-control" id="contraV_e" name="contra" required>
										</div>
									</div>
									<div class="col-xs-2">
											<i class="glyphicon glyphicon-ok-sign noti" id="bienI" style="width: 10px;display:none;color:green;"></i>
											<i class="glyphicon glyphicon-remove-sign noti" id="malI" style="width: 10px;display:none;color:red;"></i>
									</div>
									<input type="hidden" id="id_usuario_e" name="usuario">
									<input type="hidden" id="misma_e">
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Estatus</b></span>
											<select class="form-control" id="estatus_e" name="estatus" required>
   												<option value="Activo">Activo</option> 
												<option value="Inactivo">Inactivo</option> 
											</select>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="input-group form-group">
											<span class="input-group-addon"><b>Rol</b></span>
											<select class="form-control campo-especialidad" id="rol_e" name="rol" required>
												<option value="">Seleccionar</option>
												<option value="admin">Administrador</option>
												<option value="medico">Medico</option>
												<option value="certificacion">Certificación</option>
											</select>
										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="panel-footer">
					
							<div class="alert alert-success" id="usuario_editado" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>¡Se registró correctamente!</strong>
							</div>
							<div class="alert alert-danger" id="usuario_no_editado" style="display : none!important">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Salió algo mal</strong> El usuario no fue guardado.
							</div>
						
	      				<button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-floppy-disk"></i> <b>GUARDAR</b></button>
						</form>
	      			</div>
	      		</div>
    	</div>
  	</div>
</div>

<!-- Modal confirmación-->
<div class="modal fade " id="notificacion" role="dialog">
    <div class="modal-dialog modal-sm modalPequena">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#605ca8;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #ffffff;">Confirmar Acción</h4>
        </div>
        <div class="modal-body">
          <p>¿Esta seguro que desea eliminar a este usuario?</p>
		  <input type="hidden" id="id_usu">
        </div>
        <div class="modal-footer">
		<button class="btn btn-primary" id="aceptar" onclick="eliminarDefUsuario();"><b>Aceptar</b></button>
		  <button class="btn btn-secondary" id="cancelar" onclick="cancelar();"><b>Cancelar</b></button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal confirmación-->
<div class="modal fade " id="buenaOmala" role="dialog">
    <div class="modal-dialog modal-sm modalPequena">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#605ca8;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #ffffff;">Confirmar Acción</h4>
        </div>
        <div class="modal-body">
          
			<div class="alert alert-success" id="usuario_eliminado" style="display : none!important">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Se eliminó el usuario correctamente!</strong>
			</div>
			<div class="alert alert-danger" id="usuario_no_eliminado" style="display : none!important">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Salió algo mal</strong> El usuario no fue eliminado.
			</div>

        </div>
        <div class="modal-footer">
		  <button class="btn btn-primary" id="cancelar" onclick="cerrarNoti();"><b>Cerrar</b></button>
        </div>
      </div>
    </div>
  </div>

</div>


  <style>
   .modalPequena{
	width: 500px!important;
	height: 1200px!important;
	text-align: center;
   }
  </style>

