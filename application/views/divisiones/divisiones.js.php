<script type="text/javascript">
  $(document).ready(function(){

    getTabla();

    $("#addDivision").submit(function(event){
      var alert = $("#alert1");
      $.ajax({
        url:$("#addDivision").attr("action"),
        type:$("#addDivision").attr("method"),
        dataType:"json",
        data:$("#addDivision").serialize(),
        cache:false,
        beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
        success:function(result){
          if(result.estatus){
            alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
            setTimeout(function(){
              $("#Modal1").modal('hide');
              $("#id_especialidad").val( $("#add_id_especialidad").val() );
              getTabla();
            },500);
          }else{
            alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
            $("#"+result.input).focus();
          }
        }
      });
      event.preventDefault();
    });

    $("#Modal1").on("show.bs.modal",function(e){
      clearValues(['add_division']);
      clearHtml(['alert1']);
    });

    $("#Modal2").on("show.bs.modal",function(e){
      clearValues(['upd_division']);
      clearHtml(['alert2']);
    });

  });

  function getTabla(){
    var E = $('#id_especialidad').val();
    $.ajax({
      url:$("#getTabla").attr("action"),
      type:$("#getTabla").attr("method"),
      dataType:"json",
      data:$("#getTabla").serialize()+"&especialidad="+E,
      cache:false,
      beforeSend:function(){$('#contenedor_tabla').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
      success:function(result){
        $('#contenedor_tabla').html(result);
      }
    });
  }

  function clearValues(data){ $.each( data,function(i,v){ $("#"+v).val('') } ) }
  function clearHtml(data){ $.each( data,function(i,v){ $("#"+v).html('') } ) }

  function getRow(id){
    $.ajax({
      url:$("#getRow").attr("action"),
      type:$("#getRow").attr("method"),
      dataType:"json",
      data:$("#getRow").serialize()+"&id="+id,
      cache:false,
      success:function(result){
        $("#Modal2").modal("show");
        $.each(result,function(index,value){
          $("#upd_"+index).val(value);
        });
      }
    });
  }

  $("#updDivision").submit(function(event){
      var alert = $("#alert2");
      $.ajax({
        url:$("#updDivision").attr("action"),
        type:$("#updDivision").attr("method"),
        dataType:"json",
        data:$("#updDivision").serialize(),
        cache:false,
        beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
        success:function(result){
          if(result.estatus){
            alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
            setTimeout(function(){
              $("#Modal2").modal('hide');
              $("#id_especialidad").val( $("#upd_id_especialidad").val() );
              getTabla();
            },500);
          }else{
            alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
            $("#"+result.input).focus();
          }
        }
      });
      event.preventDefault();
    });

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