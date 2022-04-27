<script type="text/javascript">
  $(document).ready(function(){


  });

  $("#casos_clinicos").submit(function(event){
    var alert = $("#alert1");
    var formData = new FormData(document.getElementById(this.id));
    $.ajax({
      url:$(this).attr("action"),
      type:$(this).attr("method"),
      dataType:"json",
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          setTimeout(function(){
            //window.location.reload();
          },500);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

  $("#conocimientos_generales").submit(function(event){
    var alert = $("#alert2");
    var formData = new FormData(document.getElementById(this.id));
    $.ajax({
      url:$(this).attr("action"),
      type:$(this).attr("method"),
      dataType:"json",
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          setTimeout(function(){
            //window.location.reload();
          },500);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

  $("#casos_clinicos_uso").submit(function(event){
    var alert = $("#alert3");
    var formData = new FormData(document.getElementById(this.id));
    $.ajax({
      url:$(this).attr("action"),
      type:$(this).attr("method"),
      dataType:"json",
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          setTimeout(function(){
            //window.location.reload();
          },500);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

  $("#conocimientos_generales_uso").submit(function(event){
    var alert = $("#alert4");
    var formData = new FormData(document.getElementById(this.id));
    $.ajax({
      url:$(this).attr("action"),
      type:$(this).attr("method"),
      dataType:"json",
      data:formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          setTimeout(function(){
            //window.location.reload();
          },500);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

</script>