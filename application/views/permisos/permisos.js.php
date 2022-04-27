<script type="text/javascript">
  $(document).ready(function(){

    var table=$("#tabla_divisiones").DataTable({"aaSorting":[],"columnDefs":[{"targets":[3,4],"orderable":false}],"iDisplayLength":5});

    $("#addUser").submit(function(event){
      var alert = $("#alert1");
      $.ajax({
        url:$("#addUser").attr("action"),
        type:$("#addUser").attr("method"),
        dataType:"json",
        data:$("#addUser").serialize(),
        cache:false,
        beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
        success:function(result){
          if(result.estatus){
            alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
            setTimeout(function(){
            	location.reload();
            },500);
          }else{
            alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
            $("#"+result.input).focus();
          }
        }
      });
      event.preventDefault();
    });

    $("#updUser").submit(function(event){
      var alert = $("#alert2");
      $.ajax({
        url:$("#updUser").attr("action"),
        type:$("#updUser").attr("method"),
        dataType:"json",
        data:$("#updUser").serialize(),
        cache:false,
        beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
        success:function(result){
          if(result.estatus){
            alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
            setTimeout(function(){
            	location.reload();
            },500);
          }else{
            alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
            $("#"+result.input).focus();
          }
        }
      });
      event.preventDefault();
    });

  });

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

  function delRow(id){
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
        	location.reload();
        }else{
          $("#"+result.msg).focus();
        }
      }
    });
  }

</script>