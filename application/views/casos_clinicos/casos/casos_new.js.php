<script src="<?=base_url();?>js/zoom.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
            
        getDivisiones_tabla();
        getEstatus_tabla();
        getAcciones_tabla();
        getTabla();

        //registro de pregunta de caso clinico
        $('#registro_caso_clinico').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Casos_clinicos_nw/registroPreguntaCC')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#registro_caso_clinico').serialize(),
                cache:false,
                beforeSend:function(){
                // $('#registro_pregunta_form')[0].reset(); //Limpia la modal de registro
                },
                success:function(data){
                    if(data){
                        $("#registrado").show();
                        getTabla();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal").show();
                    }
                }
            });
            e.preventDefault();
        });

        $('#editar_pregunta_form').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Casos_clinicos_nw/editarPreguntaCC')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#editar_pregunta_form').serialize(),
                cache:false,
                beforeSend:function(){
                // $('#registro_pregunta_form')[0].reset(); //Limpia la modal de registro
                },
                success:function(data){
                    if(data){
                        //alert("¡Registro exitoso!");
                        $("#registrado_editar").show();
                        getTabla();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal_editar").show();
                    }
                }
            });
            e.preventDefault();
        });

    });


    function getTabla(){

        var id_division = $("#tabla_id_division  option:selected").val();
        var id_area = $("#tabla_id_area  option:selected").val();
        var id_tema = $("#tabla_id_tema  option:selected").val();
        var id_estatus = $("#tabla_id_estatus  option:selected").val();
        var id_accion = $("#tabla_id_accion  option:selected").val();

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getTabla')?>/",
            type:'GET',
            dataType:"json",
            data: {id_division:id_division,
            id_area:id_area,
            id_tema:id_tema,
            id_estatus:id_estatus,
            id_accion:id_accion},
            cache:false,
            beforeSend:function(){$('#preguntas_contenedor_cc').empty();
                                    $('#preguntas_contenedor_cc').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto; height:100px; width:100px;">')},
            success:function(result){
            $('#preguntas_contenedor_cc').html(result);
            }
        });
    }



    function getDivisiones_tabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getDivisiones')?>",
            type:'GET',
            dataType:"JSON",
            cache:false,
            beforeSend:function(){$('#tabla_id_division').empty()},
            success:function(data){
                
                $('#tabla_id_division').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('#tabla_id_division').append('<option value="'+data[i].id_division+'">'+data[i].division+'</option>');
                });
            }
        });
    }

    function getEstatus_tabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getEstatus')?>",
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

    function getAcciones_tabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getAcciones')?>",
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
                $('.campo-division').append('<option value="">Seleccione</option>');
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
                $('.campo-area').append('<option value="">Seleccione</option>');
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
            beforeSend:function(){$('.tabla_pc tbody').empty();
                $('.campo-tema').empty();
                $('#id_caso').empty();},
            success:function(data){
                $('.campo-tema').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-tema').append('<option value="'+data[i].id_tema+'">'+data[i].tema+'</option>');
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

    function getPuntosClave_tabla_editar(id_tema){

        //var id_division = $("#tabla_id_division  option:selected").val();
        //var id_area = $("#tabla_id_area  option:selected").val();
        //var id_tema = $("#tabla_id_tema  option:selected").val();
        //var id_estatus = $("#tabla_id_estatus  option:selected").val();
        var id_caso = $("#id_caso").val();
        var id_pregunta = $('#id_pregunta').val();


        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getPuntosClave')?>/",
            type:'GET',
            dataType:"json",
            data: {id_tema:id_tema,
            id_caso:id_caso,
            id_pregunta:id_pregunta},
            cache:false,
            beforeSend:function(){
                $('#tabla_puntos_clave_e tbody').empty();
            },
            success:function(data){

                
                $.each(data, function(i,item){
                    
                    $('#tabla_puntos_clave_e tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+' medForm" name="pclaves" onClick="agregarPuntoClaveRegistro(this.value);"></td></tr>');
                });

                getChecked(id_caso, id_pregunta);
                
            }
        });
    }

    function getChecked(id_caso, id_pregunta){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getPuntosChecked')?>/",
            type:'GET',
            dataType:"json",
            data: {id_pregunta:id_pregunta,
            id_caso:id_caso},
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

    function getCasoAprobado(id_caso){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getCasoClinicoAprobado')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso},
            cache:false,
            beforeSend:function(){                
            },
            success:function(data){
                
                $('#caso_clinico_examen_actual').val(data.contenido);
                
            }
        });

    }

    function getCasoClinico(id_caso,id_pregunta){
        $('.rubrica').removeProp('checked');
        $('.tabla_imagenes tbody').empty();
        $('#editar_pregunta_form')[0].reset();
        getDivisiones();
        getCognitivas();
        getPeriodos();
        getEstatus();
        getAcciones();
        getBiblios();
        
        

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getCasoClinico')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso,
            id_pregunta:id_pregunta},
            cache:false,
            beforeSend:function(){
                $('.campo-tema').empty();
                
                $('.porcentaje_barra').text("");
                $('.alert').hide();
                //$('input[type=radio]').prop('checked',false);
                //$('.rubrica').prop('checked', false);
                //$('.rubrica').checkboxradio("refresh");
                
            },
            success:function(data){
                
                getPreguntaAprobada(data.id_pregunta);
                getCasoAprobado(id_caso);
                $('#id_caso').val(id_caso);
                //$('#id_caso').val(id_caso);
                getImages(id_caso);
                $("#id_pregunta").val(data.id_pregunta);
                cargar_imagenes_pregunta(data.id_pregunta);
                $('#pregunta2').val(data.pregunta);
                $('#opcion_a2').val(data.opcion_a);
                $('#opcion_b2').val(data.opcion_b);
                $('#opcion_c2').val(data.opcion_c);
                $('#opcion_d2').val(data.opcion_d);
                $('#opcion_e2').val(data.opcion_e);
                $('#capitulo2').val(data.capitulo);
                $('#id_division2 option[value='+data.id_division+']').attr('selected','selected');
                getAreas(data.id_division);
                getTemas(data.id_area);
                getPuntosClave_tabla_editar(data.id_tema);
                getCasos(data.id_tema);
                $('#id_caso option[value='+id_caso+']').attr('selected','selected');
                llenarCombos(id_caso,id_pregunta);
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
                llenarListaCotejo(data.id_pregunta);
                $("#registrado").hide();
                $("#registrado_mal").hide();
                $("#Modal_editar").modal("show");
                
            }
        });
    }

    function llenarCombos(id_caso,id_pregunta){
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getCasoClinico')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso,
            id_pregunta:id_pregunta},
            cache:false,
            beforeSend:function(){},
            success:function(data){
                $('#id_area2 option[value='+data.id_area+']').attr('selected','selected');
                $('#id_temas option[value='+data.id_tema+']').attr('selected','selected');
                $('#id_temaIn').val(data.id_tema);
                $('#id_complejidad_cognitiva2 option[value='+data.id_complejidad_cognitiva+']').attr('selected','selected');
                $('#id_periodo_vida2 option[value='+data.id_periodo_vida+']').attr('selected','selected');
                $('#estatus_list option[value='+data.id_estatus+']').attr('selected','selected');
                $('#accion_list option[value='+data.id_accion+']').attr('selected','selected');
                $('#respuesta2 option[value='+data.respuesta+']').attr('selected','selected');
                $('#id_bibliografia2 option[value='+data.id_bibliografia+']').attr('selected','selected');
                $('#id_caso_e option[value='+id_caso+']').attr('selected','selected');
            }
        });
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

    function getCasos(id_tema){
        
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getCasos')?>",
            type:'GET',
            dataType:"JSON",
            data: {id_tema:id_tema},
            cache:false,
            beforeSend:function(){$('.list-casos').empty()},
            success:function(data){
                $('.list-casos').append('<option value="">Seleccione</option>');
                
                $.each(data, function(i, item) { 
                        $('.list-casos').append('<option value="'+data[i].id_caso_clinico+'">'+data[i].caso_clinico+'</option>');
                });
            }
        });

    }

    function getImages(id_caso){
        
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getImages')?>/",
            type:'GET',
            dataType:"json",
            data: {id_caso:id_caso},
            cache:false,
            beforeSend:function(){
                $('.tabla_imagenes tbody').empty();
                $('#footer_boton_imagenes').empty();
                $('.img').removeAttr('src');
            },
            success:function(data){

                $.each(data, function(i, item) { 

                    $('#tabla_imagenes_caso tbody').append('<tr><td style="text-align: center;"><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg" style="cursor:pointer;"  width="40" height="40" class="img" data-action="zoom"></div></td></tr>');
                });
                $('#footer_boton_imagenes').append('<div class="input-group form-group" style="text-align: center"><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_caso" id="agregar_img_caso" onchange="agregar_imagen_cc('+id_caso+');"></span></div>');
            }
        });
        
    }

    function getImagesCasoEspecifico(id_caso){
        
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getImages')?>/",
            type:'GET',
            dataType:"json",
            data: {id_caso:id_caso},
            cache:false,
            beforeSend:function(){
                $('.tabla_imagenes tbody').empty();
                $('#footer_boton_imagenes').empty();
                $('.img').removeAttr('src');
            },
            success:function(data){

                $.each(data, function(i, item) { 

                    $('#tabla_imagenes_caso tbody').append('<tr><td style="text-align: center;"><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg" style="cursor:pointer;"  width="40" height="40" class="img" data-action="zoom"></div></td></tr>');
                });
                $('#footer_boton_imagenes').append('<div class="input-group form-group" style="text-align: center; "><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_caso" id="agregar_img_caso" onchange="agregar_imagen_cc('+id_caso+');"></span></div>');
            }
        });
        
    }

    function cambiar_imagen_caso(especialidad, num_caso, n_pregunta, posicion, id_caso){


        var nombre_imagen= 'E'+especialidad+'_C'+num_caso+'_P'+n_pregunta+'_'+posicion+'_V01';

        if($('#cambiar_img_caso'+posicion).get(0).files.length === 0){
            alert('Seleccione una imagen');
        }else{
            var _csrfName = $('input#hidCSRF').attr('name');
            var _csrfValue = $('input#hidCSRF').val();
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('cambiar_img_caso', $('#cambiar_img_caso'+posicion)[0].files[0]);
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
                    
                    getImages(id_caso);
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
                    getImages(id_caso);
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
                    getImages(id_caso);
                }else{
                    $("#cuerpo_autorizacion").empty();
                    $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                }
                }
            });
        }
    }

    function cargar_imagenes_pregunta_temp(arraycontador, especialidad){

        $('#tabla_imagenes_pregunta_e tbody').empty();
        $('.miniImg').attr('src',"");

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/obtenerUnico')?>/",
            type:'GET',
            dataType:"json",
            cache:false,
            beforeSend:function(){
                
            },
            success:function(unico){  

                $.each(arraycontador, function(i, item) { 

                    if(i != 0){
                        
                        $('#tabla_imagenes_pregunta_e tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+especialidad+'/'+unico+item+'.jpg"  style="cursor: pointer;" width="40" height="40" class="img" data-action="zoom"></div></td><td style="text-align: right;"><div><span class="btn btn-primary btn-file btn-sm">CAMBIAR<i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_pregunta" id="cambiar_img_pregunta'+item+'" onchange="cambiar_imagen_Pregunta_temp('+item+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagenes_pregunta_temp('+item+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
                    }

                });

            }
        });

    }

    function eliminar_imagenes_pregunta_temp(posicion){

        var id_caso = parseInt($('select[id=id_caso]').val());

        var imgPos = $('#arrayContador').val();
        

        var arrayPos = imgPos.split(',').map(Number);

        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('pos', posicion);
        paqueteDeDatos.append(_csrfName, _csrfValue);
        

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/obtenerUnico')?>/",
            type:'GET',
            dataType:"json",
            cache:false,
            beforeSend:function(){
                
            },
            success:function(unico){  

                $.each(arrayPos, function(i, item) { 

                    if(item == posicion){
                        
                        $.ajax({
                            url:"<?php echo base_url('index.php/Casos_clinicos_nw/eliminar_imagenes_pregunta_temporal')?>",
                            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
                            contentType: false,
                            data: paqueteDeDatos,
                            processData: false,
                            cache: false, 
                            beforeSend:function(){
                            $("#cuerpo_autorizacion").empty(); 
                            $("#Modal5").modal("show");
                            $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Eliminando...</h3>');
                            $('#tabla_imagenes_pregunta_e tbody').empty();
                            },
                            success: function(resultado){
                                    $('#cambiar_img_pregunta').val("");
                                    var res = JSON.parse(resultado);
                                    if(res.estatus){
                                        $("#cuerpo_autorizacion").empty();
                                        $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Se eliminó exitosamente</h3>');
                                        //console.log(n);
                                        var indice = arrayPos.indexOf(posicion); // obtenemos el indice
                                        arrayPos.splice(indice, 1);
                                        $('#arrayContador').val(arrayPos);
                                        cargar_imagenes_pregunta_temp(arrayPos, res.especialidad);
                                    }else{
                                        $("#cuerpo_autorizacion").empty();
                                        $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló: no se pudo eliminar</h3>');
                                    }
                            }
                        });
                        
                    }
                });

            }
        });
        

    }

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

    function agregar_imagen_pregunta_nuevo(){

        var contador = parseInt($('#contador').val());
        var id_caso = parseInt($('select[id=id_caso]').val());

        if($('#contador').val() == "1"){
            $('#arrayContador').val(0);
        }
        var arrayContador = $('#arrayContador').val();

        var n = arrayContador.split(',').map(Number);



        if($('#agregar_img_pregunta').get(0).files.length === 0){
            alert('Seleccione una imagen');
        }else{
            var _csrfName = $('input#hidCSRF').attr('name');
            var _csrfValue = $('input#hidCSRF').val();
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('agregar_img_pregunta', $('#agregar_img_pregunta')[0].files[0]);
            paqueteDeDatos.append(_csrfName, _csrfValue);
            paqueteDeDatos.append('contador', contador);
            paqueteDeDatos.append('caso', id_caso);
                
            $.ajax({
                url:"<?php echo base_url('index.php/Casos_clinicos_nw/agregar_imagenes_pregunta_temporal')?>",
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
                    n.push(contador);
                    //console.log(n);
                    $('#contador').val(contador+1);
                    $('#arrayContador').val(n);
                    cargar_imagenes_pregunta_temp(n, res.especialidad);
                }else{
                    $("#cuerpo_autorizacion").empty();
                    $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                }
                }
            });
        }
    }

    function cambiar_imagen_Pregunta_temp(posicion){


        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/obtenerUnico')?>/",
            type:'GET',
            dataType:"json",
            cache:false,
            beforeSend:function(){
                
            },
            success:function(unico){  

                var nombreImg = unico+posicion;

                var arrayContador = $('#arrayContador').val();

                var n = arrayContador.split(',').map(Number);



                if($('#cambiar_img_pregunta'+posicion).get(0).files.length === 0){
                    alert('Seleccione una imagen');
                }else{
                    var _csrfName = $('input#hidCSRF').attr('name');
                    var _csrfValue = $('input#hidCSRF').val();
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('cambiar_img_pregunta'+posicion, $('#cambiar_img_pregunta'+posicion)[0].files[0]);
                    paqueteDeDatos.append(_csrfName, _csrfValue);
                    paqueteDeDatos.append('nombre_imagen', nombreImg);
                    paqueteDeDatos.append('pos', posicion);
                        
                    $.ajax({
                            url: "<?php echo base_url('index.php/Casos_clinicos_nw/cambiar_imagenes_pregunta_temporal')?>",
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
                            $('#cambiar_img_pregunta'+posicion).val("");
                            var res = JSON.parse(resultado);
                            if(res.estatus){
                                $("#cuerpo_autorizacion").empty();
                                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                                cargar_imagenes_pregunta_temp(n, res.especialidad);
                            }else{
                                $("#cuerpo_autorizacion").empty();
                                $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                            }
                        }
                    });
                }

            }
        });

        
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
                $('#cambiar_img_pregunta').val("");
                var res = JSON.parse(resultado);
                if(res.estatus){
                    $("#cuerpo_autorizacion").empty();
                    $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                    cargar_imagenes_pregunta(n_pregunta);
                }else{
                    $("#cuerpo_autorizacion").empty();
                    $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                }
                }
            });
        }
    }

    function cargar_imagenes_pregunta(id_pregunta_banco){


        $.ajax({
            url:"<?php echo base_url('index.php/Casos/cargar_imagenes_pregunta')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_pregunta_banco:id_pregunta_banco},
            cache:false,
            beforeSend:function(){
                $('#tabla_imagenes_pregunta tbody').empty();
                $('#footer_boton_imagenes_pregunta').empty();
                $('.img-thumbnail').attr('src','');
            },
            success:function(data){
                // console.log(data);
                $.each(data, function(i, item) { 
                
                    if($('#rol').val() == "medico"){
                        $('#tabla_imagenes_pregunta tbody').append('<tr><td style="text-align: center;"><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="60" height="60" class="img-thumbnail" data-action="zoom"></div></td></tr>');
		            }
                    else{
                    $('#tabla_imagenes_pregunta tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="40" height="40" class="img-thumbnail" data-action="zoom"></div></td><td style="text-align: right;"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_pregunta'+data[i].posicion+'" id="cambiar_img_pregunta'+data[i].posicion+'" onchange="cambiar_imagen_pregunta('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+data[i].id_caso+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagen_pregunta('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+data[i].id_caso+','+id_pregunta_banco+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
                    }
                
                
                });

                if(data.length == 0){
                    $('#tabla_imagenes_pregunta tbody').append("No hay imagenes");
                }

                if($('#rol').val() != "medico"){
                    $('#footer_boton_imagenes_pregunta').append('<div class="input-group form-group" style="text-align: center"><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_pregunta" id="agregar_img_pregunta" onchange="agregar_imagen_pregunta('+id_pregunta_banco+');"></span></div>');
                }
            }
        });
    }

    function iniciarTempImg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/iniciarTempImg')?>/",
            type:'GET',
            dataType:"json",
            cache:false,
            beforeSend:function(){
                //Funcion para limpiar imagenes temporales.
            },
            success:function(data){                
            }
        });

    }
    
    function abrirModal(){
        iniciarTempImg();
        getDivisiones();
        getCognitivas();
        getPeriodos();
        getEstatus();
        getAcciones();
        getBiblios();
        $('.tabla_imagenes tbody').empty();
        $('.alert').hide();
        $('.puntos_clave_arreglo').val("");
        $("#contador").val("1");
        $("#arrayContador").val("");
        $("#Modal_registrar").modal("show");
        $('#registro_caso_clinico')[0].reset();
    }

    function getPuntosClave_tabla(id_tema){


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
                    
                    $('#tabla_puntos_clave tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+'"  id="check_'+data[i].id_punto_clave+'" name="pclaves" onClick="agregarPuntoClaveRegistro();"></td></tr>');
                });

            }
        });
    }

    function agregarPuntoClaveRegistro(punto_clave){


        $("#puntos_clave_arreglo").val("");

        var puntos_clave = 0;

        $('[name="pclaves"]').not(':checked').each(function(){
        //cada elemento seleccionado

            eliminarPuntoClave($(this).val());

        });

        $('[name="pclaves"]:checked').each(function(){
        //cada elemento seleccionado

        puntos_clave += ","+$(this).val();

        });
        //alert("hola");

        $(".puntos_clave_arreglo").val(puntos_clave);



    }

    function eliminarPuntoClave(punto_clave){
        var id_pregunta = $("#id_pregunta").val();


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

    function eliminarCasoClinico(id_caso, id_pregunta){

        var confirmacion = confirm("¿Desea borrar la pregunta no. "+id_pregunta+"?");

        if (confirmacion == true) {
            $.ajax({
                url:"<?php echo base_url('index.php/Casos_clinicos_nw/eliminarCasoClinico')?>/",
                type:'GET',
                dataType:"json",
                data: {id_caso:id_caso,
                id_pregunta:id_pregunta},
                cache:false,
                beforeSend:function(){
                    
                },
                success:function(data){

                    if(data){
                        alert("Eliminado con exito");
                        getTabla();
                    }
                    else{
                        alert("No se pudo Eliminar");
                    }
                    
                }
            });

        }
        else{
            alert("No se eliminó elemento.");
        }

    }

</script>