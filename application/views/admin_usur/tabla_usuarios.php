<script type="text/javascript">
	// var tableP=$("#tabla_preguntas").DataTable({"aaSorting":[],"iDisplayLength":100,"order":[[0,"ASC"]]});
	var tableP=$("#usuarios").DataTable({initComplete: function() {$(this.api().table().container()).find('input').wrap('<form>')},"aaSorting":[],"iDisplayLength":100,"order":[[0,"asc"]],"columnDefs":[{"targets":[6],"orderable":false}]});
</script>

<div class="table-responsive">
	<table class="table table-striped table-condensed" id="usuarios">
		<thead>
			<th>ID</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Estatus</th>
			<th>Rol</th>
			<th>Editar</th>
		</thead>
		<tbody>
			<?php
				foreach ($usuarios as $value){
					echo '
					<tr>
				    <td>'.$value['id_usuario'].'</td>
					<td>'.$value['usuario'].'</td>
				    <td>'.$value['correo'].'</td>
				    <td>'.$value['estatus'].'</td>
				    <td>'.$value['rol'].'</td>
				    <td>
				    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="editarUsuario('.$value['id_usuario'].');"></i>
						<i class="glyphicon glyphicon-trash elimina" style="cursor:pointer;" id="usu_'.$value['id_usuario'].'" onClick="eliminarUsuario('.$value['id_usuario'].');"></i>
				    </td>					
				  </tr>';
				  
				}
			?>
		</tbody>
	</table>

	

</div>
<!-- '.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_pregunta'].',\'preguntas\',\'updContenedorPreguntas\',0)"></i>':null).' -->