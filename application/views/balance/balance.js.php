<script type="text/javascript">
  $(document).ready(function(){
    getTabla();
  });

  function getTabla(){
    var especialidad = $('#especialidad').val();
    var tipo_examen = $('#tipo_examen').val();
    $.ajax({
      url:$("#getTabla").attr("action"),
      type:$("#getTabla").attr("method"),
      dataType:"json",
      data:$("#getTabla").serialize()+"&especialidad="+especialidad+"&tipo_examen="+tipo_examen,
      cache:false,
      beforeSend:function(){$('#tabla').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
      success:function(result){
        $('#tabla').html(result);
      }
    });
  }
</script>