<script type="text/javascript">
	var table=$("#bibliografias_tabla").DataTable({"aaSorting":[],"order":[[0,"asc"],[1,"asc"]],"columnDefs":[{"targets":[1],"orderable":false}],"iDisplayLength":100});
</script>
<table class="table table-striped table-condensed" id="bibliografias_tabla">
	<thead>
		<th>Bibliografía</th>
		<!-- <th>Capítulo</th> -->
		<th></th>
	</thead>
	<tbody>
		<?php
			foreach($bibliografias as $value){
				echo '
				<tr>
					<td>'.$value['bibliografia'].'</td>
				    
				    <td>
						'.(($this->session->rol=="admin" || $this->session->rol=="certificacion")?'<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="getRow(\''.$value['id_bibliografia'].'\')"></i>':'<i class="glyphicon glyphicon-eye-open" style="cursor:pointer;" onClick="getRow(\''.$value['id_bibliografia'].'\')"></i>').'
			    		'.(( $this->session->rol=="admin" )?'<i class="glyphicon glyphicon-trash registrar" style="cursor:pointer;" onclick="delRow(\''.$value['id_bibliografia'].'\')"></i>':'').'
				    </td>
				</tr>';
			}
		?>
	</tbody>
</table>

<script type='text/javascript'>

	$(document).ready(function(){

		if($('#rol').val() == "medico"){
			$('.registrar').hide();
			$('.guardar').hide();
		}
	});
	
</script>

