<script type="text/javascript">
	// var tableP=$("#tabla_preguntas").DataTable({"aaSorting":[],"iDisplayLength":100,"order":[[0,"ASC"]]});
	var tableP=$("#tabla_preguntas").DataTable({initComplete: function() {$(this.api().table().container()).find('input').wrap('<form>')},"aaSorting":[],"iDisplayLength":100,"order":[[0,"asc"]],"columnDefs":[{"targets":[6],"orderable":false}]});
</script>

<div class="table-responsive">
	<table class="table table-striped table-condensed" id="tabla_preguntas">
		<thead>
			<th>No.</th>
			<th>Estatus</th>
			<th>Acción</th>
			<th>Pregunta</th>
			<th>Puntos_clave</th>
			<th>Fecha de Modificación</th>
            <th>Opciones</th>
		</thead>
		<tbody>
			<?php
				foreach ($preguntas as $value){
					echo '
					<tr>
				    <td>'.$value['id_pregunta'].'</td>
					<td>'.$value['catalogo_estatus'].'</td>
				    <td>'.$value['catalogo_accion'].'</td>
				    <td>'.$value['pregunta'].'</td>';
					if($value['id_punto_clave'] === null){
						echo '<td><i class="glyphicon glyphicon-ok-sign" style="cursor:pointer;"></i></td>';
					}
					else{
						echo '<td><i class="glyphicon glyphicon-ok-sign" style="cursor:pointer;color:green"></i></td>';
					}
				    
                    echo '<td>'.$value['fecha_hora_modificacion'].'</td>
				    <td>				    	
						'.(($this->session->rol=="admin" || $this->session->rol=="certificacion")?'<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="getContenidoPreguntaCG('.$value['id_pregunta'].')"></i>':'<i class="glyphicon glyphicon-eye-open" style="cursor:pointer;" onClick="getContenidoPreguntaCG('.$value['id_pregunta'].')"></i>').'
						'.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_pregunta'].',\'preguntas\',\'updContenedorPreguntas\',0)"></i>':null).'
				    </td>					
				  </tr>';
				}
			?>
		</tbody>
	</table>
</div>
<!-- '.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_pregunta'].',\'preguntas\',\'updContenedorPreguntas\',0)"></i>':null).' -->