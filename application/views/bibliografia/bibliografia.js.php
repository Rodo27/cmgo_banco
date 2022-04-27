<script type="text/javascript">
  $(document).ready(function(){
    getTabla();
    $("#Modal1").on("hidden.bs.modal",function(e){
      clearForm(['add_bibliografia','add_capitulo']);
      $("#alert1").html('');
      getTabla();
    });
    $("#Modal2").on("hidden.bs.modal",function(e){
      clearForm(['upd_bibliografia','upd_capitulo','upd_id_bibliografia']);
      $("#alert2").html('');
      getTabla();
    });
  });

  function getTabla(){
    $.ajax({
      url:$("#getTabla").attr("action"),
      type:$("#getTabla").attr("method"),
      dataType:"json",
      data:$("#getTabla").serialize(),
      cache:false,
      beforeSend:function(){$('#bibliografia_contenedor').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
      success:function(result){
        $('#bibliografia_contenedor').html(result);
      }
    });
  }

  function getRow(id){
    $.ajax({
      url:$("#getRow").attr("action"),
      type:$("#getRow").attr("method"),
      dataType:"json",
      data:$("#getRow").serialize()+"&id="+id,
      cache:false,
      success:function(result){
        $("#Modal2").modal('show');
        $.each(result,function(index,value){
          $("#upd_"+index).val(value);
        });
      }
    });
  }

  $("#addBibliografia").submit(function(event){
    var alert = $("#alert1");
    $.ajax({
      url:$("#addBibliografia").attr("action"),
      type:$("#addBibliografia").attr("method"),
      dataType:"json",
      data:$("#addBibliografia").serialize(),
      cache:false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    });
    event.preventDefault();
  });

  $("#updBibliografia").submit(function(event){
    var alert = $("#alert2");
    $.ajax({
      url:$("#updBibliografia").attr("action"),
      type:$("#updBibliografia").attr("method"),
      dataType:"json",
      data:$("#updBibliografia").serialize(),
      cache:false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    });
    event.preventDefault();
  });

  function clearForm(data){$.each(data,function(i,v){$("#"+v).val('')})}

  function delRow(id,tipo,tabla){
    var cfr = confirm("¿Realmente deseas eliminar este registro?");
    if(!cfr){return;}
    $.ajax({
      url:$("#delRow").attr("action"),
      type:$("#delRow").attr("method"),
      dataType:"json",
      data:$("#delRow").serialize()+"&id="+id,
      cache:false,
      success:function(result){
        if(result.estatus){
          getTabla();
        }else{
          alert(result.msg);
        }
      }
    });
  }
</script>