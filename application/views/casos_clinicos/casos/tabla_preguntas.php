<script type="text/javascript">
	var x = parseInt('<?=$pagina;?>');
	var table=$("#tabla_preguntas").DataTable({"aaSorting":[],"columnDefs":[{"targets":[9],"orderable":false}],"iDisplayLength":100,"columns":[{"width":"50px"},null,null,null,null,null,null,null],"displayStart":x,"dom":'<"top"i>rf<"bottom"tlp><"clear">'});
</script>
<table class="table table-striped table-condensed" id="tabla_preguntas">
	<thead>
		<th>Caso</th>
		<th>Caso_s</th>
		<th>No. NUEVO</th>
		<th>No.</th>
		<th>Pregunta_s</th>
		<th>Acción</th>
		<th>Pregunta</th>
		<th>DIF</th>
		<th>DIS</th>
		<th>Revisión</th>
		<th></th>
	</thead>
	<tbody>
		<?php
			$dif = '';
			$dis = '';
			foreach ($preguntas as $value){

				$dif = $value['analisis_dif'];
				$dis = $value['analisis_dis'];
				if( $dif >= 700 && $dif <= 850 ){
					$dif='rojo';
				}elseif( $dif > 850 && $dif <= 1000 ){
					$dif='amarillo';
				}elseif( $dif > 1000 && $dif <= 1150 ){
					$dif='verde';
				}elseif( $dif > 1150 && $dif <= 1300 ){
					$dif='verdeFuerte';
				}

				if( $dis <= 0.79 ){
					$dis='rojo';
				}elseif( $dis > 0.79 && $dis <= 0.99 ){
					$dis='amarillo';
				}elseif( $dis > 0.99 ){
					$dis='verdeFuerte';
				}

				$createDate = new DateTime( $value['fecha_hora_modificacion'] );
				echo '
				<tr>
			    <td>'.$value['id_caso'].'</td>
			    <td>'.$value['st'].'</td>
			    <td>'.$value['n_pregunta_indicativo_banco'].'</td>
			    <td>'.$value['numeracion'].'</td>
			    <td>'.$value['examen_banco'].'</td>
			    <td>'.$value['accion'].'</td>
			    <td>'.$value['pregunta'].'</td>
			    <td> <i class="glyphicon glyphicon-record '.$dif.'"></i> </td>
			    <td> <i class="glyphicon glyphicon-record '.$dis.'"></i> </td>
			    <td>'.$createDate->format('Y-m-d').'</td>
			    <td>
			    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="getRow2('.$value['id_pregunta'].',\'pregunta\')"></i>
			    </td>
			  </tr>';
			}
		?>
	</tbody>
</table>