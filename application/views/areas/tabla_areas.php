<script type="text/javascript">
	var table=$("#tabla_divisiones").DataTable({"aaSorting":[],"columnDefs":[{"targets":[2],"orderable":false}],"iDisplayLength":100,"order":[[1,"DESC"]]});
</script>
<table class="table table-striped table-condensed" id="tabla_divisiones">
	<thead>
		<th>Área</th>
		<th>Fecha_Revisión</th>
		<th></th>
	</thead>
	<tbody>
		<?php
			foreach($areas as $value){
				echo '
				<tr>
					<td>'.$value["area"].'</td>
				    <td>'.$value['fecha_hora_modificacion'].'</td>
				    <td>
				    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onclick="getRow('.$value['id_area'].')"></i>
				    	<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_area'].');"></i>
				    </td>
				</tr>';
			}
		?>
	</tbody>
</table>