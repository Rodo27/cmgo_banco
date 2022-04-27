<script type="text/javascript">
	var x = parseInt('<?=$pagina;?>');
	var table=$("#updContenedorPreguntas").DataTable({"aaSorting":[],
												"columnDefs":[{"targets":[7],
												"orderable":false}],
												"iDisplayLength":100,
												"columns":[null,null,{"width":"50px"},{"width":"50px"},null,null,null,null],
												"displayStart":x,
												"dom":'<"top"i>rf<"bottom"tlp><"clear">'});
</script>



<div class="table-responsive-md">

	<table class="table table-striped table-condensed " id="casos_clinicos_preg">
		<thead>
			<th style="width: 1%;">No. Preg.</th>
			<th style="width: 35%;text-align: center;">Pregunta</th>
			<th>estatus</th>

			<!--<th>Pregunta_s</th>-->
			<th>Acción</th>
			<!--<th>DIF</th>-->
			<th style="width: 1%;">Puntos Clave</th>
			<th>Fecha Modificación</th>
			<th style="width: 1%;">Opciones</th>
		</thead>
		<tbody>
			<?php
				
				foreach ($preguntas as $value){
					echo '
					<tr>
					<td style="text-align: center;">'.$value['id_pregunta'].'</td>
					<td>'.substr($value['pregunta'],0,40).'</td>
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
						'.(($this->session->rol=="admin" || $this->session->rol=="certificacion")?'<i class="glyphicon glyphicon-edit" style="cursor:pointer;" onClick="editarPregunta('.$value['id_caso'].','.$value['id_pregunta'].')";></i>':'<i class="glyphicon glyphicon-eye-open" style="cursor:pointer;" onClick="editarPregunta('.$value['id_caso'].','.$value['id_pregunta'].')";></i>').'
						'.(($this->session->rol=="admin")?'<i class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="eliminaPregunta('.$value['id_caso'].','.$value['id_pregunta'].')";></i>':null).'
						</td>					
					</tr>';
				}
			?>
		</tbody>
	</table>
</div>