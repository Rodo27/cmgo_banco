<script type="text/javascript">
	
	var table=$("#casos_clinicos").DataTable({"aaSorting":[],
		"columnDefs":[{"targets":[6],
		"orderable":false}],
		"iDisplayLength":10,
		"columns":[null,null,null,{"width":"auto"},null,null],
		"dom":'<"top"i>rf<"bottom"tlp><"clear">'});
</script>



<div class="table-responsive-md">
	<table class="table table-striped table-condensed " id="casos_clinicos">
		<thead>
			<th>Caso</th>
			<th>Estatus</th>
			<th>Acción</th>
			<th>Caso Clínico</th>
			<th>NOP</th>
			<th>Revisión</th>
			<th>Opciones</th>
		</thead>
		<tbody>
			
			<?php
				foreach($casos as $value){
					echo '
					<tr>
						<td>'.$value["id_caso_clinico"].'</td>
						<td>'.$value["catalogo_estatus"].'</td>
						<td>'.$value["catalogo_accion"].'</td>
						<td>'.$value["caso_clinico"].'</td>';

						if($value['conteo'] == 5){
							echo '<td style="text-align: center;"><i class="glyphicon glyphicon-ok-sign" style="color: green;"></i></td>';
						}
						else{
							echo '<td>'.$value['conteo'].'</td>';
						}
						echo'
						<td>'.$value['fecha_hora_modificacion'].'</td>
						<td>
							'.(($this->session->rol=="admin" || $this->session->rol=="certificacion")?'<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="editarCaso('.$value['id_caso_clinico'].')"></i>':'<i class="glyphicon glyphicon-eye-open" style="cursor:pointer;" onClick="editarCaso('.$value['id_caso'].')"></i>').'
							'.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_caso_clinico'].')"></i>':null).'
						</td>
					</tr>';
				}
			?>
		</tbody>
	</table>
</div>