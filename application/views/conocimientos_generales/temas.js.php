<script type="text/javascript">
  $(document).ready(function(){

    

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
      request($(this),$("#alert1"),'temas');
      event.preventDefault();
    });

    $("#updTema").submit(function(event){
      request($(this),$("#alert2"),'temas');
      event.preventDefault();
    });

    $('#Modal3').on('hidden.bs.modal',function (e){
      $("#Modal2").addClass("scroll");
      getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
    });

    $('#Modal4').on('hidden.bs.modal',function (e){
      $("#Modal2").addClass("scroll");
      getTabla('preguntas','updContenedorPreguntas','upd_input_temas_id_area','upd_input_temas_id_division','id_especialidad');
      clearForm(['input_preguntas_pregunta','input_preguntas_opcion_a','input_preguntas_opcion_b','input_preguntas_opcion_c','input_preguntas_opcion_d','input_preguntas_opcion_e','input_preguntas_capitulo','alert4','input_preguntas_dificultad']);
    });

    $("#updPregunta").submit(function(event){
      request($(this),$("#alert3"),'preguntas');
      event.preventDefault();
    });

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
        if($('#rol').val() == "medico"){
          $(".glyphicon-edit").addClass("glyphicon-eye-open");
		      $(".glyphicon-edit").removeClass("glyphicon-edit");
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
            $("#Modal2").modal("hide");
            var ok = tableT.page.info();
            $("#pagina_temas").val(ok.page);
            getTabla('temas','contenedor_tabla','input_temas_id_area','input_temas_id_division','id_especialidad');
          }
          if(tipo=="preguntas"){
            var ok = tableP.page.info();
            $("#pagina_preguntas").val(ok.page);
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

  function getTablaPreg(id_tema){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTablaPregunta')?>/",
        type:'GET',
        dataType:"json",
        data: {id_tema:id_tema},
        cache:false,
        beforeSend:function(){$('#preguntas_contenedor').empty();
                                $('#preguntas_contenedor').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto; height:100px; width:100px;">')},
        success:function(result){
        $('#preguntas_contenedor').html(result);
        }
    });
  }

  function getDivisiones(){


    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getDivisiones')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-division').empty();
            $('.tabla_pc tbody').empty();},
        success:function(data){
            $.each(data, function(i, item) { 
                    $('.campo-division').append('<option value="'+data[i].id_division+'">'+data[i].division+'</option>');
            });
        }
    });
  }

  function getAreas(id_division){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAreas')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.tabla_pc tbody').empty();},
        success:function(data){
            $('.campo-area').empty();
            $.each(data, function(i, item) { 
                    $('.campo-area').append('<option value="'+data[i].id_area+'">'+data[i].area+'</option>');
            });
        }
    });
  }

  function getTemas(id_area){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTemas')?>",
        type:'GET',
        dataType:"JSON",
        data: {id_area:id_area},
        cache:false,
        beforeSend:function(){$('.tabla_pc tbody').empty();},
        success:function(data){
            $('.campo-tema').empty();
            $.each(data, function(i, item) { 
                    $('.campo-tema').append('<option value="'+data[i].id_tema+'">'+data[i].tema+'</option>');
            });
        }
    });
  }

  function getTemas_tabla(id_area){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTemas')?>",
        type:'GET',
        dataType:"JSON",
        data: {id_area:id_area},
        cache:false,
        beforeSend:function(){$('#tabla_id_tema').empty()},
        success:function(data){
            $('#tabla_id_tema').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('#tabla_id_tema').append('<option value="'+data[i].id_tema+'">'+data[i].tema+'</option>');
            });
        }
    });
  }

  function getCognitivas(){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getCognitivas')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-complejidad-cognitiva').empty()},
        success:function(data){
            $('.campo-complejidad-cognitiva').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('.campo-complejidad-cognitiva').append('<option value="'+data[i].id_complejidad_cognitiva+'">'+data[i].complejidad_cognitiva+'</option>');
            });
        }
    });
  }

  function getPeriodos(){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPeriodos')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-periodo').empty()},
        success:function(data){
            $('.campo-periodo').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('.campo-periodo').append('<option value="'+data[i].id_periodo_vida+'">'+data[i].periodo_vida+'</option>');
            });
        }
    });
  }

  function getEstatus(){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getEstatus')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-estatus').empty()},
        success:function(data){
            $('.campo-estatus').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('.campo-estatus').append('<option value="'+data[i].id_estatus+'">'+data[i].catalogo_estatus+'</option>');
            });
        }
    });
  }

  function getAcciones(){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAcciones')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-accion').empty()},
        success:function(data){
            $('.campo-accion').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('.campo-accion').append('<option value="'+data[i].id_accion+'">'+data[i].catalogo_accion+'</option>');
            });
        }
    });
  }

  function getBiblios(){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getBiblios')?>",
        type:'GET',
        dataType:"JSON",
        //data: {especialidad_tema:especialidad_tema},
        cache:false,
        beforeSend:function(){$('.campo-bibliografia').empty()},
        success:function(data){
            $('.campo-bibliografia').append('<option value="">Seleccione</option>');
            $.each(data, function(i, item) { 
                    $('.campo-bibliografia').append('<option value="'+data[i].id_bibliografia+'">'+data[i].bibliografia+'</option>');
            });
        }
    });
  }

  function getPreguntaAprobada(id_pregunta){
    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPreguntaAprobada')?>",
        type:'GET',
        dataType:"JSON",
        data:{id_pregunta:id_pregunta},
        cache:false,
        beforeSend:function(){                
        },
        success:function(data){
            
            $('#pregunta_examen_actual').val(data.pregunta);
            $('#opcion_a_examen').val(data.a);
            $('#opcion_b_examen').val(data.b);
            $('#opcion_c_examen').val(data.c);
            $('#opcion_d_examen').val(data.d);
            $('#opcion_e_examen').val(data.e);
            $('#respuesta_examen_actual').val(data.respuesta);
            
        }
    });

  }

  function getPuntosClave_tabla_editar(id_tema){

    //var id_division = $("#tabla_id_division  option:selected").val();
    //var id_area = $("#tabla_id_area  option:selected").val();
    //var id_tema = $("#tabla_id_tema  option:selected").val();
    //var id_estatus = $("#tabla_id_estatus  option:selected").val();
    var id_pregunta = $("#id_pregunta_e").val();


    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPuntosClave')?>/",
        type:'GET',
        dataType:"json",
        data: {id_tema:id_tema},
        cache:false,
        beforeSend:function(){
            $('#tabla_puntos_clave_e tbody').empty();
        },
        success:function(data){

            
            $.each(data, function(i,item){
                
                $('#tabla_puntos_clave_e tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+' medForm" name="pclaves" onClick="agregarPuntoClaveRegistro(this.value);"></td></tr>');
            });

            getChecked(id_pregunta, data.id_tema);
            
        }
    });


  }

  function getChecked(id_pregunta, id_tema){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPuntosChecked')?>/",
        type:'GET',
        dataType:"json",
        data: {id_pregunta:id_pregunta},
        cache:false,
        beforeSend:function(){
            //$('.tabla_pc tbody').empty();
        },
        success:function(data){

            var arreglo_pc = 0;
            $.each(data, function(i,item){

                arreglo_pc += ","+data[i].id_punto_clave;

                $(".pc_"+data[i].id_punto_clave+"").attr("checked", true);

            });

            $("#puntos_clave_arreglo_e").val(arreglo_pc);
            
        }
    });

    deshabilitarPC();

  }

  function deshabilitarPC(){
    if($('#rol').val() == "medico"){

		  $('.medForm').prop('disabled', true);
      $('.rubrica').prop('disabled', true);
			
		}
  }

  function llenarListaCotejo(id_pregunta){

    // var id_pregunta = $('#id_pregunta_e').val();


    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getCotejoChecked')?>/",
        type:'GET',
        dataType:"json",
        data: {id_pregunta:id_pregunta},
        cache:false,
        beforeSend:function(){},
        success:function(data){

            var arreglo_pc = 0;
            $.each(data, function(i,item){

                $('input[name=rubrica'+(data[i].n_rubrica)+'][value='+data[i].criterio+']').attr("checked", true);

            });

            
        }
    });

  }

  function cambiarEstadoBotonListaCotejo(){
    if($("#lista_cotejo").text() == "Ocultar lista de cotejo"){
        $('#lista_cotejo').text("Ver lista de cotejo");
    }
    else{
        $('#lista_cotejo').text("Ocultar lista de cotejo");
    }

  }

  function getContenidoPreguntaCG(id_pregunta){
    $('.rubrica').removeProp('checked');
    getDivisiones();
    getCognitivas();
    getPeriodos();
    getEstatus();
    getAcciones();
    getBiblios();
    getPreguntaAprobada(id_pregunta);
      

    $.ajax({
      url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getIdPreguntaCG')?>",
      type:'GET',
      dataType:"JSON",
      data:{id_pregunta:id_pregunta},
      cache:false,
      beforeSend:function(){
          $('#editar_pregunta_form_e')[0].reset();
          $('.porcentaje_barra').text("");
          $('.alert').hide();
          //$('input[type=radio]').prop('checked',false);
          //$('.rubrica').prop('checked', false);
          //$('.rubrica').checkboxradio("refresh");
          
      },
      success:function(data){
          

          $('#id_pregunta_e').val(id_pregunta);
          $('#pregunta2_e').val(data.pregunta);
          $('#opcion_a2_e').val(data.opcion_a);
          $('#opcion_b2_e').val(data.opcion_b);
          $('#opcion_c2_e').val(data.opcion_c);
          $('#opcion_d2_e').val(data.opcion_d);
          $('#opcion_e2_e').val(data.opcion_e);
          $('#capitulo2_e').val(data.capitulo);
          $('#id_division2_e option[value='+data.id_division+']').attr('selected','selected');
          getAreas(data.id_division);
          getTemas(data.id_area);
          getPuntosClave_tabla_editar(data.id_tema);
          llenarCombos(id_pregunta);
          $('#analisis_infit').val(data.analisis_infit);
          $('#analisis_outfit').val(data.analisis_outfit);
          $('#analisis_dif').val(data.analisis_dif);
          $('#analisis_dis').val(data.analisis_dis);
          $('#barra_a').css('width', data.uso_a + '%');
          $('#barra_b').css('width', data.uso_b + '%');
          $('#barra_c').css('width', data.uso_c + '%');
          $('#barra_d').css('width', data.uso_d + '%');
          $('#barra_e').css('width', data.uso_e + '%');
          $('.porcentaje_barra_a').text(data.uso_a + "%");
          $('.porcentaje_barra_b').text(data.uso_b + "%");
          $('.porcentaje_barra_c').text(data.uso_c + "%");
          $('.porcentaje_barra_d').text(data.uso_d + "%");
          $('.porcentaje_barra_e').text(data.uso_e + "%");
          llenarListaCotejo(id_pregunta);
          $("#registrado").hide();
          $("#registrado_mal").hide();
          $("#ModalPreg").modal("show");
          
      }
    });
        

  }

  function llenarCombos(id_pregunta){
      $.ajax({
          url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getIdPreguntaCG')?>",
          type:'GET',
          dataType:"JSON",
          data:{id_pregunta:id_pregunta},
          cache:false,
          beforeSend:function(){},
          success:function(data){
              $('#id_area2_e option[value='+data.id_area+']').attr('selected','selected');
              $('#id_tema2_e option[value='+data.id_tema+']').attr('selected','selected');
              $('#id_complejidad_cognitiva2_e option[value='+data.id_complejidad_cognitiva+']').attr('selected','selected');
              $('#id_periodo_vida2_e option[value='+data.id_periodo_vida+']').attr('selected','selected');
              $('#estatus_list_e option[value='+data.id_estatus+']').attr('selected','selected');
              $('#accion_list_e option[value='+data.id_accion+']').attr('selected','selected');
              $('#respuesta2_e option[value='+data.respuesta+']').attr('selected','selected');
              $('#id_bibliografia2_e option[value='+data.id_bibliografia+']').attr('selected','selected');
              
          }
      });
  }

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

            if($('#rol').val() == "medico"){
              
              $('.pull-right').remove();		
            }
          }
        });
        getTablaPreg(id);
      }
    });

  }

  function editarPregunta(id_pregunta){
    var data = ['id_complejidad_cognitiva','id_periodo_vida','examen_banco','pregunta','opcion_a','opcion_b','opcion_c','opcion_d','opcion_e','respuesta','id_bibliografia','capitulo','puntos_clave','alert3','dificultad','modificacion'];
    $(".updPreguntaHidden").val('');
    $.each(data,function(i,v){
      $("#preguntas_"+v).val('');
    })
    getDatosOperativos(id_pregunta,"pregunta");
  }

  function agregarPregunta(){
    var id = $("#upd_input_temas_id_tema").val()
    $("#input_preguntas_id_tema").val(id);
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
        }
        if(tipo=="pregunta"){
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

</script>