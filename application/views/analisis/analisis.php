<div class="row">
<div class="col-sm-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><b>CALIBRAR CASOS CLÍNICOS</b></h4>
		</div>
		<div class="panel-body" style="overflow:hidden;">
			<?php echo form_open('Analisis/casos_clinicos',array('id'=>'casos_clinicos'));?>
				<h4><input type="radio" name="tipo" value="gyo"> GINECOLOGÍA Y OBSTETRICIA </h4>
				<h4><input type="radio" name="tipo" value="mmf"> MEDICINA MATERNO FETAL </h4>
				<h4><input type="radio" name="tipo" value="brh"> BIOLOGÍA DE LA REPRODUCCIÓN HUMANA </h4>
				<h4><input type="radio" name="tipo" value="uro"> UROLOGÍA </h4><br>
				<input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="cc" id="cc">
				<hr>
				<div id="alert1"></div>
				<button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-wrench"></i> PROCESAR</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
<div class="col-sm-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><b>CALIBRAR CONOCIMIENTOS GENERALES</b></h4>
		</div>
		<div class="panel-body" style="overflow:hidden;">
			<?php echo form_open('Analisis/conocimientos_generales',array('id'=>'conocimientos_generales'));?>
				<h4><input type="radio" name="tipo" value="gyo"> GINECOLOGÍA Y OBSTETRICIA </h4>
				<h4><input type="radio" name="tipo" value="mmf"> MEDICINA MATERNO FETAL </h4>
				<h4><input type="radio" name="tipo" value="brh"> BIOLOGÍA DE LA REPRODUCCIÓN HUMANA </h4>
				<h4><input type="radio" name="tipo" value="uro"> UROLOGÍA </h4><br>
				<input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="cg" id="cg">
				<hr>
				<div id="alert2"></div>
				<button class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-wrench"></i> PROCESAR</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
<div class="col-sm-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><b>ESTADÍSTICAS DE RESPUESTAS CC</b></h4>
		</div>
		<div class="panel-body" style="overflow:hidden;">
			<?php echo form_open('Analisis/casos_clinicos_uso',array('id'=>'casos_clinicos_uso'));?>
				<h4><input type="radio" name="tipo" value="gyo"> GINECOLOGÍA Y OBSTETRICIA </h4>
				<h4><input type="radio" name="tipo" value="mmf"> MEDICINA MATERNO FETAL </h4>
				<h4><input type="radio" name="tipo" value="brh"> BIOLOGÍA DE LA REPRODUCCIÓN HUMANA </h4>
				<h4><input type="radio" name="tipo" value="uro"> UROLOGÍA </h4><br>
				<input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="cc_uso" id="cc_uso">
				<hr>
				<div id="alert3"></div>
				<button class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-wrench"></i> PROCESAR</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
<div class="col-sm-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><b>ESTADÍSTICAS DE RESPUESTAS CG</b></h4>
		</div>
		<div class="panel-body" style="overflow:hidden;">
			<?php echo form_open('Analisis/conocimientos_generales_uso',array('id'=>'conocimientos_generales_uso'));?>
				<h4><input type="radio" name="tipo" value="gyo"> GINECOLOGÍA Y OBSTETRICIA </h4>
				<h4><input type="radio" name="tipo" value="mmf"> MEDICINA MATERNO FETAL </h4>
				<h4><input type="radio" name="tipo" value="brh"> BIOLOGÍA DE LA REPRODUCCIÓN HUMANA </h4>
				<h4><input type="radio" name="tipo" value="uro"> UROLOGÍA </h4><br>
				<input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="cg_uso" id="cg_uso">
				<hr>
				<div id="alert4"></div>
				<button class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-wrench"></i> PROCESAR</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
</div>