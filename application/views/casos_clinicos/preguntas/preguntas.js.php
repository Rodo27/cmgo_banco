<script src="<?=base_url();?>js/zoom.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    getCombosx({'areas':['casos_id_area',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','NO'],'temas':['casos_id_tema',false,'casos_id_tema','casos_id_area','casos_id_division','id_especialidad','SI','preguntas']});
    $("#Modal33").on("hidden.bs.modal",function(e){ getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad') });
    $("#Modal44").on("hidden.bs.modal",function(e){ getTabla('preguntas','preguntas_contenedor','casos_id_tema','casos_id_area','casos_id_division','id_especialidad') });
  
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

    $('[data-toggle=popover].tasks-menu2').popover({ 
        html : true, 
        title: function(){
          return $("#popover_content_title2").html()
        },
        content: function() {
          $("#imagen_caso_clinico2").attr("src", $(this).attr("src") );
          return $('#popover_content_wrapper2').html();
        }
    });

    var nfEstatus = $('#nfEstatus').val();
    $(".nf").addClass('oculto').removeClass('nfSelected');
    $(".nf"+nfEstatus).removeClass('oculto').addClass('nfSelected');

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
      
      var id_pregunta= $("#id_pregunta_caso").val();
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
        url:"<?php echo base_url('index.php/Casos_clinicos/guardar_rubrica')?>",
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

  function agregar_imagen_pregunta(id_pregunta){

    if($('#agregar_img_pregunta').get(0).files.length === 0){
        alert('Seleccione una imagen');
      }else{
        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('agregar_img_pregunta', $('#agregar_img_pregunta')[0].files[0]);
        paqueteDeDatos.append(_csrfName, _csrfValue);
        paqueteDeDatos.append('id_pregunta', id_pregunta);
            
        $.ajax({
            url:"<?php echo base_url('index.php/Casos/agregar_imagenes_pregunta')?>",
            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false, 
            beforeSend:function(){
              $("#cuerpo_autorizacion").empty(); 
              $("#Modal5").modal("show");
              $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
            },
            success: function(resultado){
              $('#cambiar_img_caso').val("");
              var res = JSON.parse(resultado);
              if(res.estatus){
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                cargar_imagenes_pregunta(id_pregunta);
              }else{
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
              }
            }
        });
      }
  }

  function eliminar_imagen_pregunta(especialidad, num_caso, n_pregunta, posicion, id_caso, id_pregunta_banco){

    var nombre_imagen= 'E'+especialidad+'_C'+num_caso+'_P'+n_pregunta+'_'+posicion+'_V01';
    
    var userselection = confirm("Desea borrar la imagen?");

    if (userselection == true){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos/eliminar_imagenes_pregunta')?>",
            type:'GET',
            dataType:"JSON",
            data:{
              nombre_imagen:nombre_imagen,
              especialidad:especialidad,
              id_caso:id_caso,
              posicion:posicion,
              n_pregunta:n_pregunta
            },
            cache:false,
            beforeSend:function(){},
            success:function(data){
              alert("imagen borrada");
              cargar_imagenes_pregunta(id_pregunta_banco);
            }
        });
      }
    else{
        alert("imagen no borrada");
    }    
  }
  
  function cambiar_imagen_pregunta(especialidad, num_caso, n_pregunta, posicion, id_caso){


    var nombre_imagen= 'E'+especialidad+'_C'+num_caso+'_P'+n_pregunta+'_'+posicion+'_V01';


    if($('#cambiar_img_pregunta'+posicion).get(0).files.length === 0){
        alert('Seleccione una imagen');
      }else{
        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('cambiar_img_pregunta', $('#cambiar_img_pregunta'+posicion)[0].files[0]);
        paqueteDeDatos.append(_csrfName, _csrfValue);
        paqueteDeDatos.append('nombre_imagen', nombre_imagen);
            
        $.ajax({
            url: "<?php echo base_url('index.php/Casos/cambiar_imagen_pregunta')?>",
            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false, 
            beforeSend:function(){
              $("#cuerpo_autorizacion").empty(); 
              $("#Modal5").modal("show");
              $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
            },
            success: function(resultado){
              $('#cambiar_img_caso').val("");
              var res = JSON.parse(resultado);
              if(res.estatus){
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                cargar_imagenes_caso(id_caso);
              }else{
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
              }
            }
        });
      }
  }

  function cargar_imagenes_pregunta(id_pregunta_banco){

      // alert(id_pregunta_banco);

      $.ajax({
          url:"<?php echo base_url('index.php/Casos/cargar_imagenes_pregunta')?>",
          type:'GET',
          dataType:"JSON",
          data:{id_pregunta_banco:id_pregunta_banco},
          cache:false,
          beforeSend:function(){
            $('#tabla_imagenes_pregunta tbody').empty();
            $('#footer_boton_imagenes_pregunta').empty();
          },
          success:function(data){
            // console.log(data);
            $.each(data, function(i, item) { 

              $('#tabla_imagenes_pregunta tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="40" height="40" class="img-thumbnail" data-action="zoom"></div></td><td style="text-align: right;"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_pregunta'+data[i].posicion+'" id="cambiar_img_pregunta'+data[i].posicion+'" onchange="cambiar_imagen_pregunta('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+data[i].id_caso+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagen_pregunta('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+data[i].id_caso+','+id_pregunta_banco+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
              
            });

           $('#footer_boton_imagenes_pregunta').append('<div class="input-group form-group" style="text-align: center"><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_pregunta" id="agregar_img_pregunta" onchange="agregar_imagen_pregunta('+id_pregunta_banco+');"></span></div>');
        }
      });
  }

  function cargar_imagenes_caso(){

      var id_caso=parseInt($('#header_caso').text());

      $.ajax({
          url:"<?php echo base_url('index.php/Casos/cargar_imagenes_caso')?>",
          type:'GET',
          dataType:"JSON",
          data:{id_caso:id_caso},
          cache:false,
          beforeSend:function(){
            $('#tabla_imagenes_caso tbody').empty();
            $('#footer_boton_imagenes_cc').empty();
          },
          success:function(data){
            $.each(data, function(i, item) { 

              $('#tabla_imagenes_caso tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="40" height="40" class="img-thumbnail" data-action="zoom"></div></td><td style="text-align: right;"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_caso" id="cambiar_img_caso" onchange="cambiar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
              
            });

           $('#footer_boton_imagenes_cc').append('<div class="input-group form-group" style="text-align: center"><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_caso" id="agregar_img_caso" onchange="agregar_imagen_cc('+id_caso+');"></span></div>');
        }
      });
  }

  function cambiar_imagen_caso(especialidad, num_caso, n_pregunta, posicion, id_caso){


    var nombre_imagen= 'E'+especialidad+'_C'+num_caso+'_P'+n_pregunta+'_'+posicion+'_V01';


    if($('#cambiar_img_caso').get(0).files.length === 0){
        alert('Seleccione una imagen');
      }else{
        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('cambiar_img_caso', $('#cambiar_img_caso')[0].files[0]);
        paqueteDeDatos.append(_csrfName, _csrfValue);
        paqueteDeDatos.append('nombre_imagen', nombre_imagen);
            
        $.ajax({
            url: "<?php echo base_url('index.php/Casos/cambiar_imagen_caso')?>",
            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false, 
            beforeSend:function(){
              $("#cuerpo_autorizacion").empty(); 
              $("#Modal5").modal("show");
              $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
            },
            success: function(resultado){
              $('#cambiar_img_caso').val("");
              var res = JSON.parse(resultado);
              if(res.estatus){
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                cargar_imagenes_caso(id_caso);
              }else{
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
              }
            }
        });
      }
  }

  function eliminar_imagen_caso(especialidad, num_caso, n_pregunta, posicion, id_caso){

    var nombre_imagen= 'E'+especialidad+'_C'+num_caso+'_P'+n_pregunta+'_'+posicion+'_V01';
    
    var userselection = confirm("Desea borrar la imagen?");

    if (userselection == true){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos/eliminar_imagenes_caso')?>",
            type:'GET',
            dataType:"JSON",
            data:{
              nombre_imagen:nombre_imagen,
              especialidad:especialidad,
              id_caso:id_caso,
              posicion:posicion
            },
            cache:false,
            beforeSend:function(){},
            success:function(data){
              alert("imagen borrada");
              cargar_imagenes_caso(id_caso);
            }
        });
      }
    else{
        alert("imagen no borrada");
    }    
  }

  function agregar_imagen_cc(id_caso){

    if($('#agregar_img_caso').get(0).files.length === 0){
        alert('Seleccione una imagen');
      }else{
        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('agregar_img_caso', $('#agregar_img_caso')[0].files[0]);
        paqueteDeDatos.append(_csrfName, _csrfValue);
        paqueteDeDatos.append('id_caso', id_caso);
            
        $.ajax({
            url:"<?php echo base_url('index.php/Casos/agregar_imagenes_caso')?>",
            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
            contentType: false,
            data: paqueteDeDatos,
            processData: false,
            cache: false, 
            beforeSend:function(){
              $("#cuerpo_autorizacion").empty(); 
              $("#Modal5").modal("show");
              $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
            },
            success: function(resultado){
              $('#cambiar_img_caso').val("");
              var res = JSON.parse(resultado);
              if(res.estatus){
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                cargar_imagenes_caso(id_caso);
              }else{
                $("#cuerpo_autorizacion").empty();
                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
              }
            }
        });
      }
  }




  function get_rubrica(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Casos_clinicos/get_rubrica')?>",
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

    var id_pregunta=$("#header_pregunta").text();
    var id_caso=$("#header_caso").text();
    var password=$("#password_aprobar").val();
    var director=$("#director_verificacion").val();

    $.ajax({
        url:"<?php echo base_url('index.php/Casos_clinicos/aprobar_reactivo')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{
            id_pregunta:id_pregunta,
            id_caso:id_caso,
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

  function getCombosx(combos){
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
      data:$("#getCombo").serialize()+"&tipo="+tipo+"&idTema="+idTema+"&idArea="+idArea+"&idDivision="+idDivision+"&idEspecialidad="+idEspecialidad+"&todas="+todas,
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
        if(tipo=="preguntas_caso"){
          $("#Modal3").modal("show");
          $.each(result,function(index,value){
            $("#upd_preguntas_caso_"+index).val(value);
            if(index=="imagen_url"){
              $("#upd_preguntas_caso_imagen_url").attr("src","<?=base_url();?>"+value);
            }
          });
        }
        if(tipo=="pregunta"){
          var num = result.numeracion;
          $.each(result,function(index,value){
            $("#"+num+"_preguntas_"+index).val(value);
            if(index=="id_caso"||index=="id_complejidad_cognitiva"||index=="id_periodo_vida"||index=="puntos_clave"||index=="id_bibliografia"||index=="examen_banco"){
              $("#"+num+"_preguntas_"+index).html(value);
            }
          });
        }
      }
    });
  }

  function get_pregunta_examen_actual(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Casos_clinicos/get_pregunta_examen_actual_cc')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{id_pregunta:id_pregunta},
        beforeSend:function(){$('#grafica_cc').empty();},
        success:function(data){
          $("#contenido_examen_actual").val(data.contenido);
          $("#pregunta_examen_actual").val(data.pregunta);
          $("#opcion_a_examen").val(data.respuesta_a);
          $("#opcion_b_examen").val(data.respuesta_b);
          $("#opcion_c_examen").val(data.respuesta_c);
          $("#opcion_d_examen").val(data.respuesta_d);
          $("#opcion_e_examen").val(data.respuesta_e);
          $("#respuesta_examen_actual").val(data.respuesta);
           $("#id_pregunta_reactivo").text(data.pregunta_cc_id);
          $('#grafica_cc').append('<img src="<?=base_url();?>img/graficas/2/GraficasCC/Grafico_'+data.pregunta_cc_id+'.jpeg" style="position: fixed;" width="250" height="250" class="img-thumbnail" data-action="zoom">');
          // console.log(data);
        }
      });
    // alert('entrando');
  }

  function get_imagen_pregunta_examen_actual(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Casos_clinicos/get_imagen_pregunta_examen_actual')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{id_pregunta:id_pregunta},
        beforeSend:function(){$("#imagenes_pregunta").empty();},
        success:function(data){
          
              $.each(data, function(i, item) {
                if (data[i].nombre_imagen!=null) {
                  $('#imagenes_pregunta ').append('<img src="<?=base_url();?>files/img_examencmgo/'+data[i].nombre_imagen+'" width="40" height="50" class="img-thumbnail" data-action="zoom">');
                }
              });
        }
      });
  }

  function get_imagen_caso_examen_actual(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Casos_clinicos/get_imagen_caso_examen_actual')?>",
        type:'GET',
        dataType:"JSON",
        cache:false,
        data:{id_pregunta:id_pregunta},
        beforeSend:function(){$("#imagenes_caso").empty();},
        success:function(data){
            $.each(data, function(i, item) {
              if (data[i].nombre_imagen!=null) {
                $('#imagenes_caso').append('<img src="<?=base_url();?>files/img_examencmgo/'+data[i].nombre_imagen+'" width="40" height="50" class="img-thumbnail" data-action="zoom">');
              }
            });
        }
      });
  }

  function getRow2(id,tipo){
    $("#id_pregunta_caso").val(id);
    $.ajax({
      url:$("#getRow2").attr("action"),
      type:$("#getRow2").attr("method"),
      dataType:"json",
      data:$("#getRow2").serialize()+"&id="+id+"&tipo="+tipo,
      cache:false,
      success:function(result){
        $("#Modal33").modal("show");
        $(".contenedor").addClass('oculto');
        $.each(result,function(index,value){
          $("#"+index).val(value);
          if(index=="id_caso"||index=="id_complejidad_cognitiva"||index=="id_periodo_vida"||index=="puntos_clave"||index=="id_bibliografia"||index=="examen_banco"||index=="id_division"||index=="id_area"||index=="id_tema"||index=="header_caso"||index=="header_pregunta"||index=="header_url"||index=="header_url2"){
            $("#"+index).html(value);
            if(index=="header_url"){
              $("#header_url").attr("src","<?=base_url();?>"+value);
            }
            if(index=="header_url2"){
              $("#header_url2").attr("src","<?=base_url();?>"+value);
            }
          }
          if(index=="imagen_url"){
              var d = new Date();
              $("#upd_pregunta_imagen").val(value);
              $("#upd_pregunta_imagen_url").attr("src", "<?=base_url();?>"+value+"?"+d.getTime());
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

        $(".examen_actual").val('');
        $('.collapse').collapse('hide');
        get_pregunta_examen_actual(id);
        get_imagen_caso_examen_actual(id);
        get_imagen_pregunta_examen_actual(id);
        get_rubrica(id);
        cargar_imagenes_caso();
        cargar_imagenes_pregunta(id);


      }
    });
  }

  $("#updPregunta").submit(function(event){
    var alert = $("#alert33");
    $.ajax({
      url:$("#updPregunta").attr("action"),
      type:$("#updPregunta").attr("method"),
      dataType:"json",
      data:$("#updPregunta").serialize(),
      cache:false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          var ok = tableP.page.info();
          $("#pagina_preguntas").val(ok.page);
          $("#Modal44").modal('hidden');
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    });
    event.preventDefault();
  });

  $("#updPregunta").submit(function(event){
    var alert = $("#alert33");
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
          var ok = tableP.page.info();
          $("#pagina_preguntas").val(ok.page);
          $("#Modal44").modal('hidden');
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

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

  function accion(e){
    $(".accion").addClass('oculto');
    $("."+e.value).removeClass('oculto');
  }

  function verImagen(e){ 
    var url = $("#imagen_caso_clinico").attr('src');
    var d = new Date();
    window.open( url+"?"+d.getTime(),'_blank');
  }

  /*Editar preguntas*/
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
      getComboEP(value[0],value[1],index,filtro,filtro2,value[4],value[5]);
    });
  }

  function getComboEP(idCombo,idComboUpd,tipo,filtro,filtro2,todas,tabla){
    $.ajax({
      url:$("#getComboEP").attr("action"),
      type:$("#getComboEP").attr("method"),
      dataType:"json",
      data:$("#getComboEP").serialize()+"&tipo="+tipo+"&filtro="+filtro+"&filtro2="+filtro2+"&todas="+todas,
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

  /*Add Pregunta*/
  function addPregunta(id,tipo){
    $.ajax({
      url:$("#getRow2").attr("action"),
      type:$("#getRow2").attr("method"),
      dataType:"json",
      data:$("#getRow2").serialize()+"&id="+$('#'+id).val()+"&tipo="+tipo,
      cache:false,
      success:function(result){
        $("#Modal44").modal("show");
        $.each(result,function(index,value){

          if(index=="id_complejidad_cognitiva2"||index=="id_periodo_vida2"||index=="puntos_clave2"||index=="id_bibliografia2"){
            $("#"+index).html(value);
          }

        });
      }
    });
  }

  /*$("#addPregunta").submit(function(event){
    var alert = $("#alert44");
    $.ajax({
      url:$("#addPregunta").attr("action"),
      type:$("#addPregunta").attr("method"),
      dataType:"json",
      data:$("#addPregunta").serialize(),
      cache:false,
      beforeSend:function(){alert.html('<div class="alert alert-info ajax alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-spin fa-refresh"></i> Procesando</div>')},
      success:function(result){
        if(result.estatus){
          alert.html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> '+result.msg+'</div>');
          var ok = tableP.page.info();
          $("#pagina_preguntas").val(ok.page);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    });
    event.preventDefault();
  });*/

  $("#addPregunta").submit(function(event){
    var alert = $("#alert44");
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
          var ok = tableP.page.info();
          $("#pagina_preguntas").val(ok.page);
        }else{
          alert.html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-exclamation-circle"></i> '+result.msg+'</div>');
          $("#"+result.input).focus();
        }
      }
    })
    event.preventDefault();
  });

</script>