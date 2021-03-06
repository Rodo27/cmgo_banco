$(document).ready(function(){
	$("#formLogin").submit(function(event){
        $.ajax({
            url:$(this).attr("action"),type:$(this).attr("method"),dataType:"json",data:$(this).serialize(),cache:false,
            beforeSend:function(){$("#ajaxLoader").show();$('#alertDanger').hide();$("#btnEnviar").prop("disabled",true);},
            success:function(result){
                $("#ajaxLoader").fadeOut('slow',function(){
                    if(result.estatus){
                        window.location = result.msg;
                    }else{
                        $('#alertDanger').show();
                        $('#alertDangerText').text(result.msg);
                        $("#btnEnviar").prop("disabled",false);
                    }
                });
            }
        });
        event.preventDefault();
    });

    $("#formPassword").submit(function(event){
        $.ajax({
            url:$(this).attr("action"),type:$(this).attr("method"),dataType:"json",data:$(this).serialize(),cache:false,
            beforeSend:function(){$("#ajaxLoader2").show();$('#alertDanger2').hide();$('#alertSuccess2').hide();$("#btnEnviar2").prop("disabled",true);},
            success:function(result){
              $("#ajaxLoader2").fadeOut('slow',function(){
                if(result.estatus){
                  $('#alertSuccess2').show();
                  $('#alertSuccessText2').text(result.msg);
                  setTimeout(function(){$("#MyModal1").modal("hide");},3000);
                }else{
                  $('#alertDanger2').show();
                  $('#alertDangerText2').text(result.msg);
                  $("#btnEnviar2").prop("disabled",false);
                }
              });
            }
        });
        event.preventDefault();
    });

    $("#formRegistro").submit(function(event){
        $.ajax({
            url:$(this).attr("action"),type:$(this).attr("method"),dataType:"json",data:$(this).serialize(),cache:false,
            beforeSend:function(){$("#ajaxLoader3").show();$('#alertDanger3').hide();$('#alertSuccess3').hide();$("#btnEnviar3").prop("disabled",true);},
            success:function(result){
              $("#ajaxLoader3").fadeOut('slow',function(){
                if(result.estatus){
                  $('#alertSuccess3').show();
                  $('#alertSuccessText3').text(result.msg);
                  setTimeout(function(){$("#MyModal2").modal("hide");},3000);
                }else{
                  $('#alertDanger3').show();
                  $('#alertDangerText3').text(result.msg);
                  $("#btnEnviar3").prop("disabled",false);
                }
              });
            }
        });
        event.preventDefault();
    });
});