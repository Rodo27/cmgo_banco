<script type="text/javascript">

	$(document).ready(function(){
        
        getDivisiones_tabla();
        getEstatus_tabla();
        getAcciones_tabla();
        getTabla();

        $('#Modal2').on('hidden.bs.modal', function () {
            $('input[type=radio]').prop('checked',false);
        });

        $('#registro_pregunta_form').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Conocimientos_generales_nw/registroPreguntaCG')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#registro_pregunta_form').serialize(),
                cache:false,
                beforeSend:function(){
                   // $('#registro_pregunta_form')[0].reset(); //Limpia la modal de registro
                },
                success:function(data){
                    if(data){
                        //alert("¡Registro exitoso!");
                        $("#registrado1").show();
                        getTabla();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal1").show();
                    }
                }
            });
            e.preventDefault();
        });

        //Funcion para hacer un Update desde el formulario
        $('#editar_pregunta_form_e').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Conocimientos_generales_nw/actualizarPregunta')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#editar_pregunta_form_e').serialize(),
                cache:false,
                beforeSend:function(){
                    $(".alert").hide();
                },
                success:function(data){
                    if(data){
                       // alert("¡Actualización exitoso!");
                       $("#registrado").show();
                        getTabla();
                    }
                    else{
                        //alert("Fallo en la actualización.");
                        $("#registrado_mal").show();
                    }
                }
            });
            e.preventDefault();
        });
		
        //$("#Modal1").modal("hide");        
    });

	

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

    function getDivisiones_tabla(){
        

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getDivisiones')?>",
            type:'GET',
            dataType:"JSON",
            cache:false,
            beforeSend:function(){$('#tabla_id_division').empty();
                
                },
            success:function(data){
                $('#tabla_id_division').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('#tabla_id_division').append('<option value="'+data[i].id_division+'">'+data[i].division+'</option>');
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

    function getAreas_tabla(id_division){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAreas')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('#tabla_id_area').empty()},
            success:function(data){
                $('#tabla_id_area').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('#tabla_id_area').append('<option value="'+data[i].id_area+'">'+data[i].area+'</option>');
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

    function getTabla(){

        var id_division = $("#tabla_id_division  option:selected").val();
        var id_area = $("#tabla_id_area  option:selected").val();
        var id_tema = $("#tabla_id_tema  option:selected").val();
        var id_estatus = $("#tabla_id_estatus  option:selected").val();
        var id_accion = $("#tabla_id_accion  option:selected").val();

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTabla')?>/",
            type:'GET',
            dataType:"json",
            data: {id_division:id_division,
            id_area:id_area,
            id_tema:id_tema,
            id_estatus:id_estatus,
            id_accion:id_accion},
            cache:false,
            beforeSend:function(){$('#preguntas_contenedor').empty();
                                    $('#preguntas_contenedor').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto; height:100px; width:100px;">')},
            success:function(result){
            $('#preguntas_contenedor').html(result);
            }
        });
    }

    function getPuntosClave_tabla(id_tema){

        //var id_division = $("#tabla_id_division  option:selected").val();
        //var id_area = $("#tabla_id_area  option:selected").val();
        //var id_tema = $("#tabla_id_tema  option:selected").val();
        //var id_estatus = $("#tabla_id_estatus  option:selected").val();
        //var id_pregunta = $("#tabla_id_accion  option:selected").val();
        

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPuntosClave')?>/",
            type:'GET',
            dataType:"json",
            data: {id_tema:id_tema},
            cache:false,
            beforeSend:function(){
                $('.tabla_pc tbody').empty();
            },
            success:function(data){

                
                
                $.each(data, function(i,item){
                    
                    $('.tabla_pc tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+' medForm" name="pclaves" onClick="agregarPuntoClaveRegistro();"></td></tr>');
                });

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

    function agregarPuntoClaveRegistro(punto_clave){

        if(!$("#check_"+punto_clave+"").prop('checked')){
            
            eliminarPuntoClave(punto_clave);

        }
        
        $("#puntos_clave_arreglo").val("");

        var puntos_clave = 0;

        $('[name="pclaves"]:checked').each(function(){
        //cada elemento seleccionado
        
        puntos_clave += ","+$(this).val();

        });
         //alert("hola");

        $(".puntos_clave_arreglo").val(puntos_clave);
        

    }

    function deshabilitarPC(){
        if($('#rol').val() == "medico"){

			$('.medForm').prop('disabled', true);
            $('.rubrica').prop('disabled', true);
			
		}
    }

    function eliminarPuntoClave(punto_clave){
        var id_pregunta = $("#id_pregunta_e").val();


        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/eliminarPuntoClave')?>/",
            type:'GET',
            dataType:"json",
            data: {id_pregunta:id_pregunta, punto_clave:punto_clave},
            cache:false,
            beforeSend:function(){
                
            },
            success:function(data){

                if(data){
                    console.log("eliminado");
                }
                
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

    function getEstatus_tabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getEstatus')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('#tabla_id_estatus').empty()},
            success:function(data){
                $('#tabla_id_estatus').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('#tabla_id_estatus').append('<option value="'+data[i].id_estatus+'">'+data[i].catalogo_estatus+'</option>');
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

    function getAcciones_tabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAcciones')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('#tabla_id_accion').empty()},
            success:function(data){
                $('#tabla_id_accion').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('#tabla_id_accion').append('<option value="'+data[i].id_accion+'">'+data[i].catalogo_accion+'</option>');
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
                $("#Modal2").modal("show");
                
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

    function abrirModalRegistro(){
        $('#registro_pregunta_form')[0].reset(); //Limpia la modal de registro
        getDivisiones();
        getCognitivas();
        getPeriodos();
        getEstatus();
        getAcciones();
        getBiblios();
        $("#registrado1").hide();
        $("#registrado_mal1").hide();
        $('.tabla_pc tbody').empty();
        $("#Modal1").modal("show");
    }

    function getContenidoActualPregunta(){
        if($("#actual_examen").val() == 0){
            $('#actual_examen').text("Ver contenido de la pregunta actual en el examen");
            $("#actual_examen").val(1);
            $('#div_pregunta_examen').removeClass('collapse in').addClass('collapse');
        }
        else{
            $("#actual_examen").val(0);
            $('#actual_examen').text("Ocultar contenido de la pregunta actual en el examen");
            $('#div_pregunta_examen').removeClass('collapse').addClass('collapse in');
        }
    }

    function verOcultarCalibracion(estado){
        
        if(estado == 0){
            $('#ocul_ver').removeClass('btn btn-primary collapsed glyphicon glyphicon-eye-close').addClass('btn btn-primary collapsed glyphicon glyphicon-eye-open');
            $("#ocul_ver").val(1);
            $('#bloque').removeClass('collapse').addClass('collapse in');
        }
        else{
            $('#ocul_ver').removeClass('btn btn-primary collapsed glyphicon glyphicon-eye-open').addClass('btn btn-primary collapsed glyphicon glyphicon-eye-close');
            $("#ocul_ver").val(0);
            $('#bloque').removeClass('collapse in').addClass('collapse');
        }
        
    }

    function guardarListaDeCotejo(){

        var id_pregunta = $("#id_pregunta_e").val();
        
        let rubricas = [];

        for(var i=0; i<27; i++){

            rubricas[i] = $('input[name=rubrica'+(i+1)+']:checked').val(); 

        }

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/guardarListaDeCotejo')?>",
            type:'GET',
            dataType:"JSON",
            data:{'rubricas': rubricas,
            'id_pregunta':id_pregunta},
            cache:false,
            beforeSend:function(){
               
            },
            success:function(data){

                var mitad = $('#Modal2').height();
                mitad = mitad /2;
                mitad = mitad + 300;

                $('#Modal2, body').animate({scrollTop:mitad}, 1250);

                if(data){
                    //alert("¡Registro exitoso!");
                    $("#registrado_lc").show();
                    getTabla();
                }
                else{
                    //alert("Fallo en el registro.");
                    $("#registrado_mal_lc").show();
                }
                
                $('#div_rubrica_examen').attr("aria-expanded","false");
                $('#div_rubrica_examen').removeClass('collapse in').addClass('collapse');

                $('#lista_cotejo').text("Ver lista de cotejo");
            }
        });
    }

    function cambiarEstadoBotonListaCotejo(){
        if($("#lista_cotejo").text() == "Ocultar lista de cotejo"){
            $('#lista_cotejo').text("Ver lista de cotejo");
            $('#div_rubrica_examen').removeClass('collapse in').addClass('collapse');
        }
        else{
            $('#lista_cotejo').text("Ocultar lista de cotejo");
            $('#div_rubrica_examen').removeClass('collapse').addClass('collapse in');
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

    function abrirAprobar(){

        $("#password_aprobar").val('');
        $("#alertLogin").empty();
        $("#login").modal("show");
  }

  function aprobarPreguntaCG(){

      alert("aprobar reactivo función.");
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

</script>