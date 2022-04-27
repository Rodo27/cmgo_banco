<table class="table table-bordered">
	<thead>
		<th class="success">DIVISIÓN</th>
		<th class="success">ÁREA</th>
		<th class="success">CC</th>
		<th class="success">CG</th>
		<th class="success">TOTAL</th>
		<th class="success" style="width:200px;"></th>
	</thead>
	<tbody>
		<?php
			$cc=0;
			$cg=0;
			$total=0;
			$ct=0;
			$class="progress-bar-success";
			/*Primer recorrido*/
			$divs=array();
			foreach($preguntas as $r){
				$divs[$r['division']]['ct']=(array_key_exists($r['division'],$divs)) ? $divs[$r['division']]['ct']+($r['cc']+$r['cg']):$divs[$r['division']]['ct']=($r['cc']+$r['cg']);
			}
			/*Segundo recorrido*/
			foreach($preguntas as $v){
				$cc+=$v['cc'];
				$cg+=$v['cg'];
				$total+=$v['cc']+$v['cg'];
				$ct=round(((($v['cc']+$v['cg'])*100)/$divs[$v['division']]['ct']),2,PHP_ROUND_HALF_UP);
				echo '
				<tr>
					<td>'.$v['division'].'</td>
					<td>'.$v['area'].'</td>
					<td>'.$v['cc'].'</td>
					<td>'.$v['cg'].'</td>
					<td>'.($v['cc']+$v['cg']).'</td>
					<td>
						<div class="progress"><div class="progress-bar '.$class.'" role="progressbar" aria-valuenow="'.$ct.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$ct.'%;color:#000;"><b>'.$ct.'%</b></div></div>
					</td>
				</tr>
				';	
			}
		?>
	</tbody>
	<tfoot>
		<th class="success"></th>
		<th class="success"></th>
		<th class="success"><?=$cc;?></th>
		<th class="success"><?=$cg;?></th>
		<th class="success"><?=$total;?></th>
		<th class="success"></th>
	</tfoot>
</table>