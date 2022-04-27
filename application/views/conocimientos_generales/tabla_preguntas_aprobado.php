<script type="text/javascript">
	var table=$("#tabla_preguntas_aprobado").DataTable({"aaSorting":[],"iDisplayLength":100,"order":[[0,"ASC"]]});
</script>
<table class="table table-striped table-condensed" id="tabla_preguntas_aprobado">
	<thead>
		<th>Número Banco</th>
		<th>Pregunta</th>
		<th>Tipo Reactivo</th>
		<th>Aprobado por</th>
		<th>Fecha autorización</th>
		<th>Especialidad</th>
		<th>Versión</th>
		<th>VER</th>
	</thead>
	<tbody>
		<?php
		
			foreach ($preguntas as $value){
				echo '
				<tr>
			    <td>'.$value['id_pregunta_banco'].'</td>
			    <td>'.$value['pregunta'].'</td>
			    <td>'.$value['tipo_reactivo'].'</td>
			    <td>'.$value['director'].'</td>
			    <td>'.$value['fecha_autorizacion'].'</td>';
			    if ($value['id_especialidad']==7) {
					echo '<td>URO</td>';
				}
				else if ($value['id_especialidad']==2) {
					echo '<td>GYO</td>';
				}

				else if ($value['id_especialidad']==3) {
					echo '<td>BRH</td>';
				}
				else if ($value['id_especialidad']==4) {
					echo '<td>MMF</td>';
				}

				echo '<td>'.$value['version'].'</td>';
			    echo '<td>
			    	<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="verPreguntaAprobado('.$value['id_pregunta_aprobado'].')"></i>
			    </td>
			  </tr>';
			}
		?> 
	</tbody>
</table>