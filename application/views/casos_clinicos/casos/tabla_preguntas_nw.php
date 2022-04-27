<script type="text/javascript">


	var table=$("#preguntas_contenedor").DataTable({
		"aaSorting":[],
		"columnDefs":[{"targets":[7],
		"orderable":false}],
		"iDisplayLength":10,
		"dom":'<"top"i>rf<"bottom"tlp><"clear">'
	})
</script>
<table class="table table-striped table-condensed" id="preguntas_contenedor">
	<thead>
		<th style="width: 3%;">No. Caso Clínico</th>
		<th style="width: 1%;">No. Preg.</th>
		<th style="width: 35%;text-align: center;">Caso Clinico</th>
		<th style="width: 35%;text-align: center;">Pregunta</th>
		<th style="width: 1%;">estatus</th>
		<th style="width: 1%;">Acción</th>
		<th style="width: 1%;">Puntos Clave</th>
		<th>Fecha Modificación</th>
		<th style="width: 1%;">Opciones</th>
	</thead>
	<tbody>
		<?php
			
			foreach ($preguntas as $value){
				
				echo '
				<tr>
				<td style="text-align: center;">'.$value['id_caso'].'</td>
			    <td style="text-align: center;">'.$value['id_pregunta'].'</td>
				<td>'.$value['caso_clinico'].'</td>
				<td>'.$value['pregunta'].'</td>
				
			    <td>'.$value['catalogo_estatus'].'</td>
			    <td>'.$value['catalogo_accion'].'</td>';

			    if($value['id_punto_clave'] === null){
					echo '<td style="text-align: center;"><i class="glyphicon glyphicon-ok-sign"></i></td>';
				}
				else{
					echo '<td style="text-align: center;"><i class="glyphicon glyphicon-ok-sign" style="color:green;"></i></td>';
				}
			    echo '<td>'.$value['fecha_hora_modificacion'].'</td>
			    <td style="text-align: center;">
					'.(($this->session->rol=="admin" || $this->session->rol=="certificacion")?'<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="getCasoClinico('.$value['id_caso'].','.$value['id_pregunta'].')"></i>':'<i class="glyphicon glyphicon-eye-open" style="cursor:pointer;" onClick="getCasoClinico('.$value['id_caso'].','.$value['id_pregunta'].')"></i>').'
					'.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="eliminarCasoClinico('.$value['id_caso'].', '.$value['id_pregunta'].')"></i>':null).'
				    </td>					
				  </tr>';
				
			}
		?>
	</tbody>
</table>