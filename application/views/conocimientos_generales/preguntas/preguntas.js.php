<script src="<?=base_url();?>js/zoom.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    getCombos({'areas':['casos_id_area',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','NO'],'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']});
    $("#Modal3").on("hidden.bs.modal",function(e){ getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad') });
    $("#Modal44").on("hidden.bs.modal",function(e){ getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad') });
    $("#updPregunta").submit(function(event){
      request($(this),$("#alert3"),'preguntas');
      event.preventDefault();
    });
    var nfEstatus = $('#nfEstatus').val();
    $(".nf").addClass('oculto').removeClass('nfSelected');
    $(".nf"+nfEstatus).removeClass('oculto').addClass('nfSelected');

    $("#addPregunta").submit(function(event){
      var alert = $("#alert44");
      $.ajax({
        url:$(this).attr("action"),
        type:$(this).attr("method"),
        dataType:"json",
        data:$(this).serialize(),
        cache:false,
        beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
        success:function(result){
          if(result.estatus){
            var ok = tableP.page.info();
            $("#pagina_preguntas").val(ok.page);
            alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          }else{
            alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
            $("#"+result.input).focus();
          }
        }
      });

      event.preventDefault();
    });


  });

  $( "#guardar_rubrica" ).click(function() {
    
    if ($("input[name=rubrica1]").is(':checked')&&$("input[name=rubrica2]").is(':checked')&&
        $("input[name=rubrica3]").is(':checked')&&$("input[name=rubrica4]").is(':checked')&&
        $("input[name=rubrica5]").is(':checked')&&$("input[name=rubrica6]").is(':checked')&&
        $("input[name=rubrica7]").is(':checked')&&$("input[name=rubrica8]").is(':checked')&&
        $("input[name=rubrica9]").is(':checked')&&$("input[name=rubrica10]").is(':checked')&&
        $("input[name=rubrica11]").is(':checked')&&$("input[name=rubrica12]").is(':checked')&&
        $("input[name=rubrica13]").is(':checked')&&$("input[name=rubrica14]").is(':checked')&&
        $("input[name=rubrica15]").is(':checked')&&$("input[name=rubrica16]").is(':checked')&&
        $("input[name=rubrica17]").is(':checked')&&$("input[name=rubrica18]").is(':checked')&&
        $("input[name=rubrica19]").is(':checked')&&$("input[name=rubrica20]").is(':checked')&&
        $("input[name=rubrica21]").is(':checked')&&$("input[name=rubrica22]").is(':checked')&&
        $("input[name=rubrica23]").is(':checked')&&$("input[name=rubrica24]").is(':checked')&&
        $("input[name=rubrica25]").is(':checked')&&$("input[name=rubrica26]").is(':checked')&&
        $("input[name=rubrica27]").is(':checked')
      ){
      
      var id_pregunta= $("#head_id_pregunta").text();
      var rubrica1=$("input[name=rubrica1]:checked").val();
      var rubrica2=$("input[name=rubrica2]:checked").val();
      var rubrica3=$("input[name=rubrica3]:checked").val();
      var rubrica4=$("input[name=rubrica4]:checked").val();
      var rubrica5=$("input[name=rubrica5]:checked").val();
      var rubrica6=$("input[name=rubrica6]:checked").val();
      var rubrica7=$("input[name=rubrica7]:checked").val();
      var rubrica8=$("input[name=rubrica8]:checked").val();
      var rubrica9=$("input[name=rubrica9]:checked").val();
      var rubrica10=$("input[name=rubrica10]:checked").val();
      var rubrica11=$("input[name=rubrica11]:checked").val();
      var rubrica12=$("input[name=rubrica12]:checked").val();
      var rubrica13=$("input[name=rubrica13]:checked").val();
      var rubrica14=$("input[name=rubrica14]:checked").val();
      var rubrica15=$("input[name=rubrica15]:checked").val();
      var rubrica16=$("input[name=rubrica16]:checked").val();
      var rubrica17=$("input[name=rubrica17]:checked").val();
      var rubrica18=$("input[name=rubrica18]:checked").val();
      var rubrica19=$("input[name=rubrica19]:checked").val();
      var rubrica20=$("input[name=rubrica20]:checked").val();
      var rubrica21=$("input[name=rubrica21]:checked").val();
      var rubrica22=$("input[name=rubrica22]:checked").val();
      var rubrica23=$("input[name=rubrica23]:checked").val();
      var rubrica24=$("input[name=rubrica24]:checked").val();
      var rubrica25=$("input[name=rubrica25]:checked").val();
      var rubrica26=$("input[name=rubrica26]:checked").val();
      var rubrica27=$("input[name=rubrica27]:checked").val();
      var rubrica28=$("input[name=rubrica28]:checked").val();
      $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/guardar_rubrica')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{
            id_pregunta:id_pregunta,
            rubrica1:rubrica1,
            rubrica2:rubrica2,
            rubrica3:rubrica3,
            rubrica4:rubrica4,
            rubrica5:rubrica5,
            rubrica6:rubrica6,
            rubrica7:rubrica7,
            rubrica8:rubrica8,
            rubrica9:rubrica9,
            rubrica10:rubrica10,
            rubrica11:rubrica11,
            rubrica12:rubrica12,
            rubrica13:rubrica13,
            rubrica14:rubrica14,
            rubrica15:rubrica15,
            rubrica16:rubrica16,
            rubrica17:rubrica17,
            rubrica18:rubrica18,
            rubrica19:rubrica19,
            rubrica20:rubrica20,
            rubrica21:rubrica21,
            rubrica22:rubrica22,
            rubrica23:rubrica23,
            rubrica24:rubrica24,
            rubrica25:rubrica25,
            rubrica26:rubrica26,
            rubrica27:rubrica27,
            rubrica28:rubrica28
        },
        beforeSend:function(){},
        success:function(data){
          alert('DATOS GUARDADOS');
        }
      });

    }else{
      alert('HAY RUBROS VACIOS');
    }
    
    

  });

  function get_rubrica(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/get_rubrica')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{
            id_pregunta:id_pregunta,
        },
        beforeSend:function(){  $("input:radio").attr("checked", false);},
        success:function(data){

          var $rubrica1 = $('input:radio[name=rubrica1]');
          $rubrica1.filter('[value='+data.rubrica1+']').prop('checked', true);

          var $rubrica2 = $('input:radio[name=rubrica2]');
          $rubrica2.filter('[value='+data.rubrica2+']').prop('checked', true);

          var $rubrica3 = $('input:radio[name=rubrica3]');
          $rubrica3.filter('[value='+data.rubrica3+']').prop('checked', true);

          var $rubrica4 = $('input:radio[name=rubrica4]');
          $rubrica4.filter('[value='+data.rubrica4+']').prop('checked', true);

          var $rubrica5 = $('input:radio[name=rubrica5]');
          $rubrica5.filter('[value='+data.rubrica5+']').prop('checked', true);

          var $rubrica6 = $('input:radio[name=rubrica6]');
          $rubrica6.filter('[value='+data.rubrica6+']').prop('checked', true);

          var $rubrica7 = $('input:radio[name=rubrica7]');
          $rubrica7.filter('[value='+data.rubrica7+']').prop('checked', true);

          var $rubrica8 = $('input:radio[name=rubrica8]');
          $rubrica8.filter('[value='+data.rubrica8+']').prop('checked', true);

          var $rubrica9 = $('input:radio[name=rubrica9]');
          $rubrica9.filter('[value='+data.rubrica9+']').prop('checked', true);

          var $rubrica10 = $('input:radio[name=rubrica10]');
          $rubrica10.filter('[value='+data.rubrica10+']').prop('checked', true);

          var $rubrica11 = $('input:radio[name=rubrica11]');
          $rubrica11.filter('[value='+data.rubrica11+']').prop('checked', true);

          var $rubrica12 = $('input:radio[name=rubrica12]');
          $rubrica12.filter('[value='+data.rubrica12+']').prop('checked', true);

          var $rubrica13 = $('input:radio[name=rubrica13]');
          $rubrica13.filter('[value='+data.rubrica13+']').prop('checked', true);

          var $rubrica14 = $('input:radio[name=rubrica14]');
          $rubrica14.filter('[value='+data.rubrica14+']').prop('checked', true);

          var $rubrica15 = $('input:radio[name=rubrica15]');
          $rubrica15.filter('[value='+data.rubrica15+']').prop('checked', true);

          var $rubrica16 = $('input:radio[name=rubrica16]');
          $rubrica16.filter('[value='+data.rubrica16+']').prop('checked', true);

          var $rubrica17 = $('input:radio[name=rubrica17]');
          $rubrica17.filter('[value='+data.rubrica17+']').prop('checked', true);

          var $rubrica18 = $('input:radio[name=rubrica18]');
          $rubrica18.filter('[value='+data.rubrica18+']').prop('checked', true);

          var $rubrica19 = $('input:radio[name=rubrica19]');
          $rubrica19.filter('[value='+data.rubrica19+']').prop('checked', true);

          var $rubrica20 = $('input:radio[name=rubrica20]');
          $rubrica20.filter('[value='+data.rubrica20+']').prop('checked', true);

          var $rubrica21 = $('input:radio[name=rubrica21]');
          $rubrica21.filter('[value='+data.rubrica21+']').prop('checked', true);

          var $rubrica22 = $('input:radio[name=rubrica22]');
          $rubrica22.filter('[value='+data.rubrica22+']').prop('checked', true);

          var $rubrica23 = $('input:radio[name=rubrica23]');
          $rubrica23.filter('[value='+data.rubrica23+']').prop('checked', true);

          var $rubrica24 = $('input:radio[name=rubrica24]');
          $rubrica24.filter('[value='+data.rubrica24+']').prop('checked', true);

          var $rubrica25 = $('input:radio[name=rubrica25]');
          $rubrica25.filter('[value='+data.rubrica25+']').prop('checked', true);

          var $rubrica26 = $('input:radio[name=rubrica26]');
          $rubrica26.filter('[value='+data.rubrica26+']').prop('checked', true);

          var $rubrica27 = $('input:radio[name=rubrica27]');
          $rubrica27.filter('[value='+data.rubrica27+']').prop('checked', true);
        }
    });

  }

  function abrir_aprobar(){
    $("#password_aprobar").val('');
    $("#alertLogin").empty();
    $("#login").modal("show");
  }

  function aprobar_reactivo(){

    var id_pregunta=$("#head_id_pregunta").text();
    var password=$("#password_aprobar").val();
    var director=$("#director_verificacion").val();

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/aprobar_reactivo')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{
            id_pregunta:id_pregunta,
            password:password,
            director:director
        },
        beforeSend:function(){$("#alertLogin").empty()},
        success:function(data){
          if (data.estatus) {
            $("#alertLogin").append('<div class="alert alert-success" role="alert"><strong><span class="glyphicon glyphicon-ok-sign" style="margin-right:20px;"></span></strong><span>'+data.msg+'</span></div>');
          }else{
            $("#alertLogin").append('<div class="alert alert-danger" role="alert"><strong><span class="glyphicon glyphicon-remove-sign" style="margin-right:20px;"></span></strong><span>'+data.msg+'</span></div>');
          }
        }
    });
  }

  function getCombos(combos){
    $.each(combos,function(index,value){

      var idTema=0;
      var idArea=0;
      var idDivision=0;
      var idEspecialidad=0;

	  if(value[2]){ 
        idTema = $("#"+value[2]).val();
      }
      if(value[3]){ 
        idArea = $("#"+value[3]).val();
      }
      if(value[4]){
        idDivision= $("#"+value[4]).val();
      }
      if(value[5]){
        idEspecialidad= $("#"+value[5]).val();
      }

      if( index=="row" ){  $("#Modal2").modal("show");
        getRow(value,'casos'); 
      }else{
        getCombo(value[0],value[1],index,idTema,idArea,idDivision,idEspecialidad,value[6],value[7]);
      }

    });
  }

  function getCombo(idCombo,idComboUpd,tipo,idTema,idArea,idDivision,idEspecialidad,todas,tabla){
    $.ajax({
      url:$("#getCombo").attr("action"),
      type:$("#getCombo").attr("method"),
      dataType:"json",
      data:$("#getCombo").serialize()+"&tipo="+tipo+"&idArea="+idArea+"&idDivision="+idDivision+"&idEspecialidad="+idEspecialidad+"&todas="+todas,
      cache:false,
      async:false,
      success:function(result){
        $("#"+idCombo).html(result);
        if(idComboUpd){
          $("#"+idComboUpd).html(result);
        }
        if(tabla!="NO"){
          getTabla(tabla,tabla+'_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad');
        }
      }
    });
  }

  function getTabla(tipo,tabla,tema,area,division,especialidad){
  	var T = $('#'+tema).val();
    var A = $('#'+area).val();
    var D = $('#'+division).val();
    var E = $('#'+especialidad).val();
    $.ajax({
      url:$("#getTabla").attr("action"),
      type:$("#getTabla").attr("method"),
      dataType:"json",
      data:$("#getTabla").serialize()+"&tipo="+tipo+"&tema="+T+"&area="+A+"&division="+D+"&especialidad="+E+"&nfEstatus="+$("#nfEstatus").val()+"&nfAccion="+$("#nfEstatus_"+$("#nfEstatus").val()).val(),
      cache:false,
      beforeSend:function(){$('#'+tabla).html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
      success:function(result){
        $('#'+tabla).html(result);
      }
    });
  }

  /*::: EDITAR PREGUNTA :::*/

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

  function editarPregunta(id_pregunta){
    var data = ['id_complejidad_cognitiva','id_periodo_vida','examen_banco','pregunta','opcion_a','opcion_b','opcion_c','opcion_d','opcion_e','respuesta','id_bibliografia','capitulo','puntos_clave','alert3','dificultad','modificacion'];
    $(".updPreguntaHidden").val('');
    $.each(data,function(i,v){
      $("#preguntas_"+v).val('');
    })
    getDatosOperativos(id_pregunta,"pregunta");
    
    // var especialidad="<?php echo $this->session->cg?>";
    // if(especialidad==2){
    //   var num_reactivos=225;
    // }else if(especialidad==3){
    //   var num_reactivos=300;
    // }else if(especialidad==4){
    //   var num_reactivos=177;
    // }else{
    //   var num_reactivos=300;
    // }

    $(".examen_actual").val('');
    $('.collapse').collapse('hide');

    // if (id_pregunta<=num_reactivos) {
      // $("#div_pregunta_examen_boton").show();
      get_pregunta_examen_actual(id_pregunta);
      get_rubrica(id_pregunta);
    // }else{
    //   $("#div_pregunta_examen_boton").hide();
    // }   
    
  }

  function getDatosOperativos(id,tipo){
    $.ajax({
      url:$("#getRow").attr("action"),
      type:$("#getRow").attr("method"),
      dataType:"json",
      data:$("#getRow").serialize()+"&id="+id+"&tipo="+tipo,
      cache:false,
      success:function(result){
        $(".accion").addClass('oculto');
        $("#Modal3").modal("show");
        $.each(result,function(index,value){
          $("#upd_preguntas_"+index).val(value);
          if(index=="id_complejidad_cognitiva"||index=="id_periodo_vida"||index=="puntos_clave"||index=="id_bibliografia"||index=="examen_banco"||index=="id_division"||index=="id_area"||index=="id_tema"){
            $("#upd_preguntas_"+index).html(value);
            if( index=="id_division"||index=="id_area"||index=="id_tema" ){
              $("#"+index).html(value);
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
              }
            }
            if(index=="analisis_dis"){
              if( value <= 0.79 ){
                $("#dis").html('<i class="glyphicon glyphicon-record rojo"></i>');
              }else if( value > 0.79 && value <= 0.99 ){
                $("#dis").html('<i class="glyphicon glyphicon-record amarillo"></i>');
              }else if( value > 0.99 ){
                $("#dis").html('<i class="glyphicon glyphicon-record verdeFuerte"></i>');
              }
            }
            if(index=="uso_a"||index=="uso_b"||index=="uso_c"||index=="uso_d"||index=="uso_e"){
              $("#"+index).html(value+" %");
              $("#"+index).css("width",value+"%");
            }
            if(index=="id_pregunta"){
              $("#head_id_pregunta").html(value);
            }
            if( index=="examen_banco_st"){
              $(".sp").addClass("oculto");
              $("#ACCION_"+value).removeClass("oculto");
            }
            if( index=="accion" ){
              $("#upd_preguntas_accion_"+result.examen_banco_st).val(value);
            }
            if( index=="accion_comentario" ){
              $("#upd_preguntas_accion_comentario_"+result.examen_banco_st).val(value);
              $("."+result.accion).removeClass('oculto');
            }
            if(index=="tipo_examen"){
              $("#"+value).prop("checked",true);
            }

        }); 

        
      }
    });
  }

  function get_pregunta_examen_actual(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/get_pregunta_examen_actual_cg')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{id_pregunta:id_pregunta},
        beforeSend:function(){$('#grafica_cg').empty();},
        success:function(data){
          $("#pregunta_examen_actual").val(data.pregunta);
          $("#opcion_a_examen").val(data.respuesta_a);
          $("#opcion_b_examen").val(data.respuesta_b);
          $("#opcion_c_examen").val(data.respuesta_c);
          $("#opcion_d_examen").val(data.respuesta_d);
          $("#opcion_e_examen").val(data.respuesta_e);
          $("#respuesta_examen_actual").val(data.respuesta);
          $("#id_pregunta_reactivo").text(data.pregunta_cg_id);
          $('#grafica_cg').append('<img src="<?=base_url();?>img/graficas/2/GraficasCG/Grafico_'+data.pregunta_cg_id+'.jpeg" style="position: fixed;" width="250" height="250" class="img-thumbnail" data-action="zoom">');
          // console.log(data);
        }
      });

    

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
          var ok = tableP.page.info();
          $("#pagina_preguntas").val(ok.page);
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
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
          getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad')
        }else{
          alert(result.msg);
        }
      }
    });
  }

  function accion(e){
    $(".accion").addClass('oculto');
    $("."+e.value).removeClass('oculto');
  }

  //EditarPregunta
  function getCombosx(combos){
    $.each(combos,function(index,value){
      var filtro=0;
      var filtro2=0;
      if(value[2]){ 
        filtro = $("#"+value[2]).val();
      }
      if(value[3]){
        filtro2= $("#"+value[3]).val();
      }
      getComboEP(value[0],value[1],index,filtro,filtro2,value[4],value[5]);
    });
  }

  function getComboEP(idCombo,idComboUpd,tipo,filtro,filtro2,todas,tabla){
    $.ajax({
      url:$("#getCombox").attr("action"),
      type:$("#getCombox").attr("method"),
      dataType:"json",
      data:$("#getCombox").serialize()+"&tipo="+tipo+"&filtro="+filtro+"&filtro2="+filtro2+"&todas="+todas,
      cache:false,
      async:false,
      success:function(result){
        $("#"+idCombo).html(result);
        if(idComboUpd){
          $("#"+idComboUpd).html(result);
        }
      }
    });
  }

  /*Nuevos Filtros*/
  function getTableNewFilter(e){
    $(".nf").addClass('oculto').removeClass('nfSelected');
    $(".nf"+e.value).removeClass('oculto').addClass('nfSelected'); 
    getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad');
  }

  function getTableNewFilter2(e){
    getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad');
  }

  /*Add Preguntas*/
  function addPregunta(a,b){
    var data = ['id_complejidad_cognitiva2','id_periodo_vida2','examen_banco2','pregunta2','opcion_a2','opcion_b2','opcion_c2','opcion_d2','opcion_e2','respuesta2','id_bibliografia2','capitulo2'];
    $.each(data,function(i,v){
      $("#"+v).val('');
    })
    $("#alert44").html('')
    $("#Modal44").modal('show')
  }



</script>