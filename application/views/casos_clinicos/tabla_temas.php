<script type="text/javascript">
	var x = parseInt('<?=$pagina;?>');
	var search = $("#BUSCADOR_DATA_TABLES").val();
	var tableT=$("#tabla_temas").DataTable({"search":{"search":search},"aaSorting":[],"columnDefs":[{"targets":[3],"orderable":false}],"displayStart":x,"iDisplayLength":10,"order":[[0,"asc"]],"deferRender":true,"dom":'<"top"i>rf<"bottom"tlp><"clear">'});
	$('#tabla_temas').on('search.dt', function() {
    	var value = $('.dataTables_filter input').val();
    	$("#BUSCADOR_DATA_TABLES").val(value);
	});
</script>
<table class="table table-striped table-condensed" id="tabla_temas">
	<thead>
		<th>Núm.</th>
		<th>Tema</th>
		<th>Fecha_Revisión</th>
		<th></th>
	</thead>
	<tbody>
		<?php
			foreach($temas as $value){
				echo '
				<tr>
					<td>'.$value['id_tema'].'</td>
				    <td>'.$value["tema"].'</td>
				    <td>'.$value['fecha_hora_modificacion'].'</td>
				    <td>
				    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onclick="getRow('.$value['id_tema'].',\'temas\')"></i>'.( ($this->session->rol=="admin") ? '<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delRow('.$value['id_tema'].',\'temas\',\'tablaTemas\',0);"></i>' : '').'
				    </td>
				</tr>';
			}
		?>
	</tbody>