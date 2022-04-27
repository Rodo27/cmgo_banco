<script type="text/javascript">
	var table=$("#tabla_especialidades").DataTable({"aaSorting":[],"columnDefs":[{"targets":[2],"orderable":false}],"iDisplayLength":5,"order":[[0,"ASC"]]});
</script>
<table class="table table-striped table-condensed" id="tabla_especialidades">
	<thead>
		<th>Especialidad</th>
		<th>Fecha_Revisión</th>
		<th></th>
	</thead>
	<tbody>
		<?php
			foreach($especialidades as $value){
				echo '
				<tr>
					<td>'.$value["especialidad"].'</td>
				    <td>'.$value['fecha_hora_modificacion'].'</td>
				    <td>
				    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onclick="getRow('.$value['id_especialidad'].')"></i>
				    	<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_especialidad'].');"></i>
				    </td>
				</tr>';
			}
		?>
	</tbody>
</table>