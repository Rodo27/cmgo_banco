<script type="text/javascript">
  $(document).ready(function(){

    if($('#rol').val() == "medico"){
			alert('hola');
			$('.registrar').hide();
			$('.guardar').hide();
			//$('.medForm').hide();
			$('.medForm').prop('disabled', true);
			
		}

    getCombos({'areas':['input_temas_id_area',false,'input_temas_id_division','id_especialidad','SI','temas']});

    $(".btnAddPuntoClave").click(function(){
      var num = parseInt($("#"+this.id+"Contador").val());
      var valor = $("#"+this.id+"Valor").val();
      if(valor.length < 1){$("#"+this.id+"Valor").focus();return;}
      var hidden = '<input type="hidden" name="PC[]" value="'+num+'_'+valor+'">';
      var btn = '<button type="button" class="btn btn-danger btn-sm pull-right" onClick="delPC(\''+this.id+'Row'+num+'\',\''+this.id+'\',0)"><i class="glyphicon glyphicon-minus-sign"></i></button>';
      
      if(this.id=="upd"){
        $.ajax({
          url:$("#addPC").attr("action"),
          type:$("#addPC").attr("method"),
          dataType:"json",
          data:$("#addPC").serialize()+"&id_tema="+$("#updIdTema").val()+"&numeracion=PC"+num+"&punto_clave="+valor,
          cache:false,
          success:function(result){
            if(result.estatus){
              $("#updTable tbody").append(result.msg);
              $("#updContador").val(num+1);
              getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
            }else{
              alert(result.msg);
            }
          }
        });
      }else{
        $("#"+this.id+"Table").append('<tr id="'+this.id+'Row'+num+'">'+hidden+'<td>PC'+num+'</td><td>'+valor+'</td><td>'+btn+'</td></tr>');
        $("#"+this.id+"Contador").val(num+1);
      }
    });

    $("#Modal1").on("show.bs.modal",function(e){
      clearForm(['add_input_temas_tema','add_input_temas_objetivo','addValor']);
      $("#alert1").html('');
      $("#addTable").html('').append('<input type="hidden" id="addContador" value="1">');
      getCombos({'areas':['add_input_temas_id_area',false,'add_input_temas_id_division','id_especialidad','SI','NO']})
    });

    $("#Modal1").on("hide.bs.modal",function(e){
      getCombos({'areas':['input_temas_id_area',false,'input_temas_id_division','id_especialidad','SI','temas']});
    });

    $("#addTema").submit(function(event){
      $("#pagina_tema").val(0);
      request($(this),$("#alert1"),'temas');
      event.preventDefault();
    });

    $("#updTema").submit(function(event){
      request($(this),$("#alert2"),'temas');
      event.preventDefault();
    });

    $('#Modal33').on('hidden.bs.modal',function (e){
      $("#Modal2").addClass("scroll");
      getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
    });

    $('#Modal4').on('hidden.bs.modal',function (e){
      $("#Modal2").addClass("scroll");
      getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
      clearForm(['input_preguntas_pregunta','input_preguntas_opcion_a','input_preguntas_opcion_b','input_preguntas_opcion_c','input_preguntas_opcion_d','input_preguntas_opcion_e','input_preguntas_capitulo','alert4','input_preguntas_dificultad']);
    });

    /*
    $("#updPregunta1").submit(function(event){
      request($(this),$("#P1alert3"),'preguntas');
      event.preventDefault();
    });

    $("#updPregunta2").submit(function(event){
      request($(this),$("#P2alert3"),'preguntas');
      event.preventDefault();
    });
    */

    $("#updPregunta").submit(function(event){
      request($(this),$("#alert33"),'preguntas');
      event.preventDefault();
    });

    /*
    $("#updPregunta4").submit(function(event){
      request($(this),$("#P4alert3"),'preguntas');
      event.preventDefault();
    });

    $("#updPregunta5").submit(function(event){
      request($(this),$("#P5alert3"),'preguntas');
      event.preventDefault();
    });
    */

    $('[data-toggle=popover].tasks-menu').popover({ 
        html : true, 
        title: function(){
          return $("#popover_content_title").html()
        },
        content: function() {
          $("#imagen_caso_clinico").attr("src", $(this).attr("src") );
          return $('#popover_content_wrapper').html();
        }
    });

  });

    $(document).on('submit','#addPregunta',function(event){
      request($(this),$("#alert4"),'preguntas');
      event.preventDefault();
    });


  function getCombos(combos){
    $.each(combos,function(index,value){
      var filtro=0;
      var filtro2=0;
      if(value[2]){ 
        filtro = $("#"+value[2]).val();
      }
      if(value[3]){
        filtro2= $("#"+value[3]).val();
      }
      getCombo(value[0],value[1],index,filtro,filtro2,value[4],value[5]);
    });
  }

  function getCombo(idCombo,idComboUpd,tipo,filtro,filtro2,todas,tabla){
    $.ajax({
      url:$("#getCombo").attr("action"),
      type:$("#getCombo").attr("method"),
      dataType:"json",
      data:$("#getCombo").serialize()+"&tipo="+tipo+"&filtro="+filtro+"&filtro2="+filtro2+"&todas="+todas,
      cache:false,
      async:false,
      success:function(result){
        $("#"+idCombo).html(result);
        if(idComboUpd){
          $("#"+idComboUpd).html(result);
        }
        if(tabla!="NO"){
          if(tabla=="temas"){
            getTabla('temas','contenedor_tabla','input_temas_id_area','input_temas_id_division','id_especialidad');
          }
        }
      }
    });
  }

  function getTabla(tipo,tabla,area,division,especialidad){
    var T = $('#upd_input_temas_id_tema').val();
    var A = $('#'+area).val();
    var D = $('#'+division).val();
    var E = $('#'+especialidad).val();
    $.ajax({
      url:$("#getTabla").attr("action"),
      type:$("#getTabla").attr("method"),
      dataType:"json",
      data:$("#getTabla").serialize()+"&tipo="+tipo+"&tema="+T+"&area="+A+"&division="+D+"&especialidad="+E,
      cache:false,
      beforeSend:function(){$('#'+tabla).html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
      success:function(result){
        $('#'+tabla).html(result);
      }
    });
  }

  function delRow(id,tipo,tabla,pc){
    var cfr = confirm("¿Realmente deseas eliminar este registro?");
    if(!cfr){return;}
    $.ajax({
      url:$("#delRow").attr("action"),
      type:$("#delRow").attr("method"),
      dataType:"json",
      data:$("#delRow").serialize()+"&tipo="+tipo+"&id="+id,
      cache:false,
      success:function(result){
        if(result.estatus){
          if(tipo=="temas"){
            getTabla('temas','contenedor_tabla','input_temas_id_area','input_temas_id_division','id_especialidad');
          }
          if(tipo=="puntos_clave"){
            $("#"+pc).remove();
            if( parseInt($("#updTable tr").length) < 1 ){
              $("#updContador").val(1)
            }
            getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
          }
          if(tipo=="preguntas"){
            getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
          }
        }else{
          alert(result.msg);
        }
      }
    });
  }

  function delPC(id,table,idPC){
    if(table=="upd"){
      delRow(idPC,"puntos_clave",false,id);
    }else{
      $("#"+id).remove();
      if( parseInt($("#addTable tr").length) < 1 ){
        $("#addContador").val(1)
      }
    }  
  }

  function request(form,alert,tipo){
    $.ajax({
      url:form.attr("action"),
      type:form.attr("method"),
      dataType:"json",
      data:form.serialize(),
      cache:false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          if(tipo == "temas"){
            var ok = tableT.page.info();
            $("#pagina_tema").val(ok.page);
            getTabla('temas','contenedor_tabla','input_temas_id_area','input_temas_id_division','id_especialidad');
            $("#Modal2").modal("hide");
          }
          if(tipo=="preguntas"){
            var ok = tableP.page.info();
            $("#pagina_pregunta").val(ok.page);
            $("#Modal4").modal("hide");
            $("#Modal3").modal("hide");
          }
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    });
  }

  function clearForm(data){$.each(data,function(i,v){$("#"+v).val('')})}

  function getRow(id,contenedor){
    $.ajax({
      url:$("#getRow").attr("action"),
      type:$("#getRow").attr("method"),
      dataType:"json",
      data:$("#getRow").serialize()+"&id="+id+"&tipo="+contenedor,
      cache:false,
      success:function(result){
        $("#Modal2").modal("show"); 
        $.each(result,function(index,value){
          $("#upd_input_"+contenedor+"_"+index).val(value);
          if(index=="id_division"){
            $("#upd_input_"+contenedor+"_id_division").html(value);
          }
          if(index=="id_area"){
            $("#upd_input_"+contenedor+"_id_area").html(value);
          }
          if(index=="puntos_clave"){
            $("#updContenedor").html(value);
          }
        });
        getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
      }
    });
  }

/*
  function editarPregunta(id_pregunta,id_caso,numeracion){
    $("#P1").removeClass("active");
    $("#P2").removeClass("active");
    $("#P3").removeClass("active");
    $("#P4").removeClass("active");
    $("#P5").removeClass("active");
    $('#myTabs a[href="#PREGUNTA'+numeracion+'"]').tab('show');
    var data = ['id_caso','id_complejidad_cognitiva','id_periodo_vida','numeracion','examen_banco','pregunta','opcion_a','opcion_b','opcion_c','opcion_d','opcion_e','respuesta','id_bibliografia','capitulo','puntos_clave','alert3','dificultad','modificacion'];
    $(".updPreguntaHidden").val('');
    $.each(data,function(i,v){
      $("#P1_preguntas_"+v).val('');
      $("#P2_preguntas_"+v).val('');
      $("#P3_preguntas_"+v).val('');
      $("#P4_preguntas_"+v).val('');
      $("#P5_preguntas_"+v).val('');
    })
    getDatosOperativos(id_caso,"preguntas_caso");
    getDatosOperativos(id_pregunta,"pregunta");
  }
*/

  function agregarPregunta(){
    var id = $("#upd_input_temas_id_tema").val()
    getDatosOperativos(id,"addOperativos");
  }

  function changeCHK(id_pregunta,id_punto_clave,e){
    var tipo
    if(e.checked){
      tipo="SI"
    }else{
      tipo="NO"
    }
    updPreguntaPC(id_pregunta,id_punto_clave,tipo);    
  }

  function updPreguntaPC(id_pregunta,id_punto_clave,tipo){
    $.ajax({
      url:$("#updPreguntaPC").attr("action"),
      type:$("#updPreguntaPC").attr("method"),
      dataType:"json",
      data:$("#updPreguntaPC").serialize()+"&idp="+id_pregunta+"&idpc="+id_punto_clave+"&tipo="+tipo,
      cache:false,
      success:function(result){}
    });
  }

  function getDatosOperativos(id,tipo){
    $.ajax({
      url:$("#getRow").attr("action"),
      type:$("#getRow").attr("method"),
      dataType:"json",
      data:$("#getRow").serialize()+"&id="+id+"&tipo="+tipo,
      cache:false,
      success:function(result){
        if(tipo=="addOperativos"){
          $("#Modal4").modal("show"); 
          $.each(result,function(index,value){
            $("#input_preguntas_"+index).html(value);
          });
        }/*
        if(tipo=="preguntas_caso"){
          
          $.each(result,function(index,value){
            $("#upd_preguntas_caso_"+index).val(value);
            if(index=="imagen_url"){
              $("#upd_preguntas_caso_imagen_url").attr("src","<?=base_url();?>"+value);
            }
            if(index=="numeracion"){
              $("#CX").html(value);
            }
          });
        }*/
        if(tipo=="pregunta"){
          $("#Modal33").modal("show");
          $(".contenedor").addClass('oculto');
          $.each(result,function(index,value){
            $("#"+index).val(value);
            if(index=="id_caso"||index=="id_complejidad_cognitiva"||index=="id_periodo_vida"||index=="puntos_clave"||index=="id_bibliografia"||index=="examen_banco"||index=="id_division"||index=="id_area"||index=="id_tema"||index=="header_caso"||index=="header_pregunta"||index=="header_url"){
              $("#"+index).html(value);
              if(index=="header_url"){
                $("#header_url").attr("src","<?=base_url();?>"+value);
              }
            }
            if(index=="analisis_dif"){
              if( value >= 700 && value <= 850  ){
                $("#dif").html('<i class="glyphicon glyphicon-record rojo"></i>');
              }else if( value > 850 && value <= 1000 ){
                $("#dif").html('<i class="glyphicon glyphicon-record amarillo"></i>');
              }else if( value > 1000 && value <= 1150 ){
                $("#dif").html('<i class="glyphicon glyphicon-record verde"></i>');
              }else if( value > 1150 && value <= 1300 ){
                $("#dif").html('<i class="glyphicon glyphicon-record verdeFuerte"></i>');
              }else{
                $("#dif").html('<i class="glyphicon glyphicon-record"></i>');
              }
            }
            if(index=="analisis_dis"){
              if( value <= 0.79 ){
                $("#dis").html('<i class="glyphicon glyphicon-record rojo"></i>');
              }else if( value > 0.79 && value <= 0.99 ){
                $("#dis").html('<i class="glyphicon glyphicon-record amarillo"></i>');
              }else if( value > 0.99 ){
                $("#dis").html('<i class="glyphicon glyphicon-record verdeFuerte"></i>');
              }else{
                $("#dis").html('<i class="glyphicon glyphicon-record"></i>');
              }
            }
            if(index=="uso_a"||index=="uso_b"||index=="uso_c"||index=="uso_d"||index=="uso_e"){
              $("#"+index).html(value+" %");
              $("#"+index).css("width",value+"%");
            }
            if( index=="examen_banco_st"){
              $("#CONTENEDOR_"+value).removeClass("oculto");
            }
            if( index=="accion" ){
              $("#accion_"+result.examen_banco_st).val(value);
            }
            if( index=="accion_comentario" ){
              $("#accion_comentario_"+result.examen_banco_st).val(value);
              $("."+result.accion).removeClass('oculto');
            }
            if(index=="tipo_examen"){
              $("#"+value).prop("checked",true);
            }
          });
        }
      }
    });
  }

  function loadView(num,tab){
    $('#myTabs a[href="#PREGUNTA'+tab+'"]').tab('show');
    var idp = $("#upd_preguntas_caso_"+num).val();
    var id_caso = $("#upd_preguntas_caso_id_caso_clinico").val();
    editarPregunta(idp,id_caso,num);
  }

  function verImagen(e){ 
    var url = $("#imagen_caso_clinico").attr('src');
    var d = new Date();
    window.open( url+"?"+d.getTime(),'_blank');
  }

  function accion(e){
    $(".accion").addClass('oculto');
    $("."+e.value).removeClass('oculto');
  }


  /*Nuevo*/
  function editarPregunta(id_pregunta,id_caso,numeracion){

    /*
      Limpiar campos.
    */

    /* EN PROCESO
    var valu =  ['id_caso','id_complejidad_cognitiva','id_periodo_vida','numeracion','examen_banco','pregunta','opcion_a','opcion_b','opcion_c','opcion_d','opcion_e','respuesta','id_bibliografia','capitulo','puntos_clave','alert3','dificultad','modificacion'];
    var html = 
    

    $.each(data,function(i,v){
      $("#P1_preguntas_"+v).val('');
    })*/
    getDatosOperativos(id_pregunta,"pregunta");
  }
</script>