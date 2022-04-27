<script type="text/javascript">
	var tableP=$("#tabla_PC").DataTable({initComplete: function() {$(this.api().table().container()).find('input').wrap('<form>')},"aaSorting":[],"iDisplayLength":10,"order":[[0,"asc"]],"columnDefs":[{"targets":[2],"orderable":false}]});
</script>

<div class="table-responsive">
	<table class="table table-striped table-condensed" id="tabla_PC">
		<thead>
			<th>Numeración</th>
			<th>Punto Clave</th>
			<th>check</th>
		</thead>
		<tbody>
			<?php
				foreach ($puntos_clave as $value){
					echo '
					<tr>
						<td>'.$value['numeracion'].'</td>
						<td>'.$value['punto_clave'].'</td>
						<td><input type="checkbox" id="'.$value['id_punto_clave'].'"></td>
				  </tr>';
				}
			?>
		</tbody>
	</table>
</div>
											
<!-- '.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_pregunta'].',\'preguntas\',\'updContenedorPreguntas\',0)"></i>':null).' -->