<script type="text/javascript">
	// var tableP=$("#tabla_preguntas").DataTable({"aaSorting":[],"iDisplayLength":100,"order":[[0,"ASC"]]});
	var tableP=$("#tabla_preguntas").DataTable({initComplete: function() {$(this.api().table().container()).find('input').wrap('<form>')},"aaSorting":[],"iDisplayLength":100,"order":[[1,"asc"]],"columnDefs":[{"targets":[6],"orderable":false}]});
</script>

<div class="table-responsive">
	<table class="table table-striped table-condensed" id="tabla_preguntas">
		<thead>
			<th>No.</th>
			<th>Estatus</th>
			<th>Acción</th>
			<th>Pregunta</th>
			<th>Puntos_clave</th>
			<th>Revisión</th>
            <th>Opciones</th>
		</thead>
		<tbody>
			<?php
				foreach ($preguntas as $value){
					echo '
					<tr>
				    <td>'.$value['id_pregunta'].'</td>
					<td>'.$value['estatus'].'</td>
				    <td>'.$value['accion'].'</td>
				    <td>'.$value['pregunta'].'</td>
				    <td><input type="checkbox"></td>
                    <td>'.$value['fecha_hora_modificacion'].'</td>
				    <td>
				    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="editarPregunta('.$value['id_pregunta'].')"></i>
				    	
				    </td>					
				  </tr>';
				}
			?>
		</tbody>
	</table>
</div>
<!-- '.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_pregunta'].',\'preguntas\',\'updContenedorPreguntas\',0)"></i>':null).' -->