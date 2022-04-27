<script type="text/javascript">

    $(document).ready(function(){
            
        getDivisiones_tabla();
        getEstatus_tabla();
        getAcciones_tabla();
        getTablaCasosClinicos();

        //Registrar nuevo clínco 
        $('#registrar_caso').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/registroCaso')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#registrar_caso').serialize(),
                cache:false,
                beforeSend:function(){
                    
                },
                success:function(data){
                    if(data){
                        //alert("¡Registro exitoso!");
                        $("#registrado").show();
                        getTablaCasosClinicos();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal").show();
                    }
                }
            });
            e.preventDefault();
        });

        //edicion de caso clínico 
        $('#editar_caso').submit(function(e) {

            $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/editarCaso')?>",
                type:'GET',
                dataType:"JSON",
                data: $('#editar_caso').serialize(),
                cache:false,
                beforeSend:function(){
                    
                },
                success:function(data){
                    if(data){
                        //alert("¡Registro exitoso!");
                        $("#editado").show();
                        getTablaCasosClinicos();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#editado_mal").show();
                    }
                }
            });
            e.preventDefault();
        });

        //editar pregunta de caso especifico submenu
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
                    if(data.estatus){
                        //alert("¡Registro exitoso!");
                        $("#registrado_editar").show();
                        tabla_preguntas(data.id_caso);
                        getTablaCasosClinicos();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal_editar").show();
                    }
                }
            });
            e.preventDefault();
        });

        //registro de pregunta de caso especifico submenu
        $('#registro_caso_clinico').submit(function(e) {

            var id_caso = $("#id_caso_p").val();

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
                        $("#registrado_preg").show();
                        tabla_preguntas(id_caso);
                        getTablaCasosClinicos();
                    }
                    else{
                        //alert("Fallo en el registro.");
                        $("#registrado_mal_preg").show();
                    }
                }
            });
            e.preventDefault();
        });


    });

    function getTablaCasosClinicos(){
        var id_division = $("#tabla_id_division  option:selected").val();
        var id_area = $("#tabla_id_area  option:selected").val();
        var id_tema = $("#tabla_id_tema  option:selected").val();
        var id_estatus = $("#tabla_id_estatus  option:selected").val();
        var id_accion = $("#tabla_id_accion  option:selected").val();

        $.ajax({
        url:"<?php echo base_url('index.php/Casos_c_new/getTabla')?>/",
        type:'GET',
        dataType:"json",
        data:{id_division:id_division,
                id_area:id_area,
                id_tema:id_tema,
                id_estatus:id_estatus,
                id_accion:id_accion},
        cache:false,
        beforeSend:function(){$('#casos_clinicos_div').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
        success:function(result){
            $('#casos_clinicos_div').html(result);
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

    function abrirModal(){
        $('#registrar_caso')[0].reset(); //Limpia la modal de registro
        $('.alert').hide();
        $('#tabla_imagenes_caso tbody').empty();
        iniciarTempImg();
        $('#RegistrarModal').modal('show');
        getDivisiones();
       
        getEstatus();
        getAcciones();
        $('.campo-division').append('<option value="">Seleccione</option>');
        $('.campo-complejidad-cognitiva').append('<option value="">Seleccione</option>');
        $('.campo-periodo').append('<option value="">Seleccione</option>');
        $('.campo-estatus').append('<option value="">Seleccione</option>');
        $('.campo-accion').append('<option value="">Seleccione</option>');
        $('#contador').val("1");
        $('#arrayContador').val("");
    }

    function editarCaso(id_caso){
        //$('#editar_caso')[0].reset(); //Limpia la modal de registro
        $('#tabla_imagenes_caso tbody').empty();
        //alert("...");
        getDivisiones();
        getEstatus();
        getAcciones(); 
        editarCasoLlenar(id_caso); 
        //$("#EditarModal").modal("show");
        
    }    
        
    function editarCasoLlenar(id_caso){

        $.ajax({
            url:"<?php echo base_url('index.php/Casos_c_new/getCaso')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso},
            cache:false,
            beforeSend:function(){
                //$('#editar_caso')[0].reset();
                $('.alert').hide();
                
                //$('input[type=radio]').prop('checked',false);
                //$('.rubrica').prop('checked', false);
                //$('.rubrica').checkboxradio("refresh");
                
            },
            success:function(data){
                
                //console.log(data);
                //alert(data[0].id_division);
                
                $('#caso_clinico').val(data[0].caso_clinico);
                $('#e_id_caso_clinico').val(id_caso);
                $('#id_division2_e option[value='+data[0].id_division+']').attr('selected','selected');
                $('#upd_casos_modificacion').val(data[0].modificacion);
                getAreas(data.id_division,data[0].id_area);
                getTemas(data[0].id_area,data[0].id_tema);
                //llenarCombos(id_caso);
                getPuntosClave_tabla_editar(data[0].id_tema);
                setValuesCombox(data);
                tabla_preguntas(id_caso);
                cargar_imagenes_caso(id_caso);
                $("#registrado1").hide();
                $("#registrado_mal1").hide();

            }
        });
        
          
    }

    function llenarCombos(id_caso){
        
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_c_new/getCaso')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso},
            cache:false,
            beforeSend:function(){},
            success:function(data){
                
                $('#id_area2_e option[value='+data[0].id_area+']').attr('selected','selected');
                $('#id_tema2_e option[value='+data[0].id_tema+']').attr('selected','selected');
                getPuntosClave_tabla_editar(data[0].id_tema);
                $('#estatus_list_e option[value='+data[0].id_estatus+']').attr('selected','selected');
                $('#accion_list_e option[value='+data[0].id_accion+']').attr('selected','selected');

                tabla_preguntas(id_caso);
            }
        });
        
    }

    function setValuesCombox(data){
        //alert("items")
        console.log("items");
        console.log(data);

        $('#id_area2_e option[value='+data[0].id_area+']').attr('selected','selected');
        $('#id_tema2_e option[value='+data[0].id_tema+']').attr('selected','selected');
        //getPuntosClave_tabla_editar(data[0].id_tema);
        //$('#estatus_list_e option[value='+data[0].id_estatus+']').attr('selected','selected');
        //$('#accion_list_e option[value='+data[0].id_accion+']').attr('selected','selected');
        $("#EditarModal").modal("show");

    }

    function tabla_preguntas(id_caso){
        //Tabla preguntas
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_c_new/preguntasCaso')?>/",
            type:'GET',
            dataType:"json",
            data:{id_caso:id_caso},
            cache:false,
            beforeSend:function(){$('#updContenedorPreguntas').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto;">')},
            success:function(result){
                $('#updContenedorPreguntas').html(result);
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

    function getAreas(id_division,id_area){

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

                //Settear el valor
                $('#id_area2_e option[value='+id_area+']').attr('selected','selected');
            }
        });
    }

    function getTemas(id_area, id_tema){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTemas')?>",
            type:'GET',
            dataType:"JSON",
            data: {id_area:id_area},
            cache:false,
            beforeSend:function(){$('.tabla_pc tbody').empty();},
            success:function(data){
                $('.campo-tema').empty();
                $('.campo-tema').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-tema').append('<option value="'+data[i].id_tema+'">'+data[i].tema+'</option>');
                });

                //Settear el valor
                $('#id_tema2_e option[value='+id_tema+']').attr('selected','selected');
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
                $.each(data, function(i, item) { 
                        $('.campo-accion').append('<option value="'+data[i].id_accion+'">'+data[i].catalogo_accion+'</option>');
                });
            }
        });
    }

    function getBiblios_preg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getBiblios')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-bibliografia-preg').empty()},
            success:function(data){
                $('.campo-bibliografia-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-bibliografia-preg').append('<option value="'+data[i].id_bibliografia+'">'+data[i].bibliografia+'</option>');
                });
            }
        });
    }

    function getDivisiones_preg(){


        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getDivisiones')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-division-preg').empty();
                $('.tabla_pc-preg tbody').empty();},
            success:function(data){
                $('.campo-division-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-division-preg').append('<option value="'+data[i].id_division+'">'+data[i].division+'</option>');
                });
            }
        });
    }

    function getAreas_preg(id_division){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAreas')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.tabla_pc-preg tbody').empty();},
            success:function(data){
                $('.campo-area-preg').empty();
                $.each(data, function(i, item) { 
                        $('.campo-area-preg').append('<option value="'+data[i].id_area+'">'+data[i].area+'</option>');
                });
            }
        });
    }

    function getTemas_preg(id_area){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getTemas')?>",
            type:'GET',
            dataType:"JSON",
            data: {id_area:id_area},
            cache:false,
            beforeSend:function(){$('.tabla_pc-preg tbody').empty();},
            success:function(data){
                $('.campo-tema-preg').empty();
                $('.campo-tema-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-tema-preg').append('<option value="'+data[i].id_tema+'">'+data[i].tema+'</option>');
                });

                // set value
                //#$('#id_tema2_preg option[value='+data.id_tema+']').attr('selected','selected');
            }
        });
    }

    function getCognitivas_preg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getCognitivas')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-complejidad-cognitiva-preg').empty()},
            success:function(data){
                $('.campo-complejidad-cognitiva-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-complejidad-cognitiva-preg').append('<option value="'+data[i].id_complejidad_cognitiva+'">'+data[i].complejidad_cognitiva+'</option>');
                });
            }
        });
    }

    function getPeriodos_preg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getPeriodos')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-periodo-preg').empty()},
            success:function(data){
                $('.campo-periodo-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-periodo-preg').append('<option value="'+data[i].id_periodo_vida+'">'+data[i].periodo_vida+'</option>');
                });
            }
        });
    }

    function getEstatus_preg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getEstatus')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-estatus-preg').empty()},
            success:function(data){
                $('.campo-estatus-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-estatus-preg').append('<option value="'+data[i].id_estatus+'">'+data[i].catalogo_estatus+'</option>');
                });
            }
        });
    }

    function getAcciones_preg(){

        $.ajax({
            url:"<?php echo base_url('index.php/Conocimientos_generales_nw/getAcciones')?>",
            type:'GET',
            dataType:"JSON",
            //data: {especialidad_tema:especialidad_tema},
            cache:false,
            beforeSend:function(){$('.campo-accion-preg').empty()},
            success:function(data){
                $('.campo-accion-preg').append('<option value="">Seleccione</option>');
                $.each(data, function(i, item) { 
                        $('.campo-accion-preg').append('<option value="'+data[i].id_accion+'">'+data[i].catalogo_accion+'</option>');
                });
            }
        });
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
                    
                    $('.tabla_pc tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td></tr>');
                });

            }
        });
    }

    function agregarPuntoClaveRegistro(punto_clave){

        if(!$("#check_"+punto_clave+"").prop('checked')){
            
            //eliminarPuntoClave(punto_clave);

        }

        $("#puntos_clave_arreglo_preg").val("");

        var puntos_clave = 0;

        $('[name="pclaves"]:checked').each(function(){
        //cada elemento seleccionado

        puntos_clave += ","+$(this).val();

        });
        //alert("hola");

        $(".puntos_clave_arreglo_preg").val(puntos_clave);

    } 

    function eliminarPuntoClave(punto_clave){
        var id_caso = $("#id_pregunta_e").val();


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

    function delRow(id_caso) {
        
        var confirmacion = confirm("¿Desea borrar el Caso Clínico no. "+id_caso+"?");

        if (confirmacion == true) {
            $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/eliminarCasoClinico')?>/",
                type:'GET',
                dataType:"json",
                data:{id_caso:id_caso},
                cache:false,
                beforeSend:function(){},
                success:function(result){
                    alert("Borrado");
                    getTablaCasosClinicos();
                }
            });

        }
        else{
            alert("No Borrado");
        }


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

                    //$('#tabla_puntos_clave_e tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td></tr>');
                    $('#tabla_puntos_clave_e tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+' medForm" name="pclaves" ></td></tr>');
                });

                //getChecked(id_pregunta, data.id_tema);

            }
        });
    }

    function getPuntosClave_tabla_editar_preg(id_tema){

        var id_caso = $("#id_caso").val();
        var id_pregunta = $('#id_pregunta').val();
        $('#id_temaIn').val($('#id_tema2_preg').val());


        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getPuntosClave')?>/",
            type:'GET',
            dataType:"json",
            data: {id_tema:id_tema,
            id_caso:id_caso,
            id_pregunta:id_pregunta},
            cache:false,
            beforeSend:function(){
                $('#tabla_puntos_clave_e_preg tbody').empty();
            },
            success:function(data){
                
                $.each(data, function(i,item){
                    
                    $('#tabla_puntos_clave_e_preg tbody').append('<tr><td>'+data[i].numeracion+'</td><td>'+data[i].punto_clave+'</td><td><input type="checkbox" value="'+data[i].id_punto_clave+'" class="pc_'+data[i].id_punto_clave+' medForm" name="pclaves" onClick="agregarPuntoClaveRegistro(this.value);"></td></tr>');
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

                $("#puntos_clave_arreglo_preg").val(arreglo_pc);
                
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

    function cargar_imagenes_caso(id_caso){

        var id_caso=parseInt(id_caso);

        $.ajax({
            url:"<?php echo base_url('index.php/Casos/cargar_imagenes_caso')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso},
            cache:false,
            beforeSend:function(){
            $('#tabla_imagenes_caso_e tbody').empty();
            $('#footer_boton_imagenes').empty();
            },
            success:function(data){
            $.each(data, function(i, item) { 

                if($('#rol').val() == "medico"){
                    $('#tabla_imagenes_caso_e tbody').append('<tr class="text-center"><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="60" height="60" class="img" data-action="zoom"></div></tr></td>');
                }
                else{
                    $('#tabla_imagenes_caso_e tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="20" height="20" class="img" data-action="zoom"></div></td><td style="text-align: right;" class="guardar"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_caso'+data[i].posicion+'" id="cambiar_img_caso'+data[i].posicion+'" onchange="cambiar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');"></span></div></td><td style="text-align: left" class="guardar"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
                }
            });

            if(data.length == 0){
                    $('#tabla_imagenes_pregunta tbody').append("No hay imagenes");
            }

            if($('#rol').val() != "medico"){
                $('#footer_boton_imagenes').append('<div class="input-group form-group guardar" style="text-align: center"><span class="btn btn-success btn-file btn-sm guardar">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_caso" id="agregar_img_caso" onchange="agregar_imagen_cc('+id_caso+');"></span></div>');
            }
        }
        });

        
    }


    function cargar_imagenes_caso_temp(arraycontador, especialidad){

        $('#tabla_imagenes_caso tbody').empty();
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
    
                        $('#tabla_imagenes_caso tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+especialidad+'/'+unico+item+'.jpg"  width="40" height="40" class="img-thumbnail miniImg" data-action="zoom"></div></td><td style="text-align: right;"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_caso" id="cambiar_img_caso'+item+'" onchange="cambiar_imagen_cc_temp('+item+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagenes_caso_temp('+item+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');
                        
                    }

                });

            }
        });

        //$('#tabla_imagenes_caso tbody').append('<tr><td><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg"  width="40" height="40" class="img-thumbnail" data-action="zoom"></div></td><td style="text-align: right;"><div class="input-group form-group"><span class="btn btn-primary btn-file btn-sm">CAMBIAR IMAGEN <i class="glyphicon glyphicon-refresh" style="margin-left:5px;"></i><input type="file" accept=".jpg" name="cambiar_img_caso'+data[i].posicion+'" id="cambiar_img_caso'+data[i].posicion+'" onchange="cambiar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');"></span></div></td><td style="text-align: left"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_imagen_caso('+data[i].especialidad+', '+"'"+data[i].num_caso+"'"+','+data[i].n_pregunta+','+data[i].posicion+','+id_caso+');">ELIMINAR<i class="glyphicon glyphicon-trash" style="margin-left:5px;"></i></button></td></tr>');



    }

    function eliminar_imagenes_caso_temp(posicion){

        var imgPos = $('#arrayContador').val();
        
        var arrayPos = imgPos.split(',').map(Number);

        var _csrfName = $('input#hidCSRF').attr('name');
        var _csrfValue = $('input#hidCSRF').val();
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('pos', posicion);
        paqueteDeDatos.append(_csrfName, _csrfValue);

        

        $.each(arrayPos, function(i, item) { 

            if(item == posicion){
                
                $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/eliminar_imagenes_caso_temporal')?>",
                type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
                contentType: false,
                data: paqueteDeDatos,
                processData: false,
                cache: false, 
                beforeSend:function(){
                $("#cuerpo_autorizacion").empty(); 
                $("#Modal5").modal("show");
                $("#cuerpo_autorizacion").append('<div class="loader "></div><h3 style="margin-top: 55px;">Eliminando...</h3>');
                $('#tabla_imagenes_caso tbody').empty();
                },
                success: function(resultado){
                    $('#cambiar_img_caso'+posicion).val("");
                    var res = JSON.parse(resultado);
                    if(res.estatus){
                        $("#cuerpo_autorizacion").empty();
                        $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Se eliminó exitosamente</h3>');
                        //console.log(n);
                        var indice = arrayPos.indexOf(posicion); // obtenemos el indice
                        arrayPos.splice(indice, 1);
                        $('#arrayContador').val(arrayPos);
                        cargar_imagenes_caso_temp(arrayPos, res.especialidad);
                    }else{
                        $("#cuerpo_autorizacion").empty();
                        $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló: no se pudo eliminar</h3>');
                    }
                }
             });
                
            }
        });
            
    
    }

    function agregar_imagen_cc_editar(){

        var id_caso = $('#e_id_caso_clinico').val();

        if($('#agregar_img_caso_e').get(0).files.length === 0){
            alert('Seleccione una imagen');
        }else{
            var _csrfName = $('input#hidCSRF').attr('name');
            var _csrfValue = $('input#hidCSRF').val();
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('agregar_img_caso', $('#agregar_img_caso_e')[0].files[0]);
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
                $("#cuerpo_autorizacion_modal5").empty(); 
                $("#Modal5").modal("show");
                $("#cuerpo_autorizacion_modal5").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
                },
                success: function(resultado){
                $('#cambiar_img_caso').val("");
                var res = JSON.parse(resultado);
                if(res.estatus){
                    $("#cuerpo_autorizacion_modal5").empty();
                    $("#cuerpo_autorizacion_modal5").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                    cargar_imagenes_caso(id_caso);
                }else{
                    $("#cuerpo_autorizacion_modal5").empty();
                    $("#cuerpo_autorizacion_modal5").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                }
                }
            });
        }
    }

    function agregar_imagen_cc_nuevo(){

        console.log("Init function")

        
        let contador = parseInt($('#contador').val());
        
        if($('#contador').val() == "1"){
            $('#arrayContador').val(0);
        }
        let arrayContador = $('#arrayContador').val();
        
        let n = arrayContador.split(',').map(Number);

        console.log(contador);
        console.log(arrayContador);
        console.log(n);        
        
        if($('#agregar_img_caso').get(0).files.length === 0){
            alert('Seleccione una imagen');
        }else{
            var _csrfName = $('input#hidCSRF').attr('name');
            var _csrfValue = $('input#hidCSRF').val();
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('agregar_img_caso', $('#agregar_img_caso')[0].files[0]);
            paqueteDeDatos.append(_csrfName, _csrfValue);
            paqueteDeDatos.append('contador', contador);
                
            $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/agregar_imagenes_caso_temporal')?>",
                type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
                contentType: false,
                data: paqueteDeDatos,
                processData: false,
                cache: false, 
                beforeSend:function(){
                $("#cuerpo_autorizacion_modal5").empty(); 
                $("#Modal5").modal("show");
                $("#cuerpo_autorizacion_modal5").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
                },
                success: function(resultado){
                $('#cambiar_img_caso').val("");
                let res = JSON.parse(resultado);
                if(res.estatus){
                    $("#cuerpo_autorizacion_modal5").empty();
                    $("#cuerpo_autorizacion_modal5").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                    n.push(contador);
                    //console.log(n);
                    $('#contador').val(contador+1);
                    $('#arrayContador').val(n);
                    cargar_imagenes_caso_temp(n, res.especialidad);
                }else{
                    //$("#cuerpo_autorizacion").empty();
                    console.log("Clean body");
                    let j = jQuery.noConflict();
                    $("#cuerpo_autorizacion_modal5").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                    console.log("Set body");
                }
                }
            });
        }
        
    }

    function agregar_video_cc_nuevo(){

        var contador = parseInt($('#contador').val());

        if($('#contador').val() == "1"){
            $('#arrayContador').val(0);
        }
        var arrayContador = $('#arrayContador').val();

        var n = arrayContador.split(',').map(Number);



        if($('#agregar_img_caso').get(0).files.length === 0){
            alert('Seleccione una imagen');
        }else{
            var _csrfName = $('input#hidCSRF').attr('name');
            var _csrfValue = $('input#hidCSRF').val();
            var paqueteDeDatos = new FormData();
            paqueteDeDatos.append('agregar_img_caso', $('#agregar_img_caso')[0].files[0]);
            paqueteDeDatos.append(_csrfName, _csrfValue);
            paqueteDeDatos.append('contador', contador);
                
            $.ajax({
                url:"<?php echo base_url('index.php/Casos_c_new/agregar_imagenes_caso_temporal')?>",
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
                    cargar_imagenes_caso_temp(n, res.especialidad);
                }else{
                    $("#cuerpo_autorizacion").empty();
                    $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                }
                }
            });
        }
    }

    function cambiar_imagen_cc_temp(posicion){

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



                if($('#cambiar_img_caso'+posicion).get(0).files.length === 0){
                    alert('Seleccione una imagen');
                }else{
                    var _csrfName = $('input#hidCSRF').attr('name');
                    var _csrfValue = $('input#hidCSRF').val();
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('cambiar_img_caso'+posicion, $('#cambiar_img_caso'+posicion)[0].files[0]);
                    paqueteDeDatos.append(_csrfName, _csrfValue);
                    paqueteDeDatos.append('nombre_imagen', nombreImg);
                    paqueteDeDatos.append('pos', posicion);
                        
                    $.ajax({
                        url: "<?php echo base_url('index.php/Casos_c_new/cambiar_imagenes_caso_temporal')?>",
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
                        $('#cambiar_img_caso'+posicion).val("");
                        var res = JSON.parse(resultado);
                        if(res.estatus){
                            $("#cuerpo_autorizacion").empty();
                            $("#cuerpo_autorizacion").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                            cargar_imagenes_caso_temp(n, res.especialidad);
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

    function editarPregunta(id_caso, id_pregunta){
        
        $('.rubrica').removeProp('checked');
        $('.tabla_imagenes tbody').empty();
        $('#')
        //$('.editar_pregunta_form_preg')[0].reset();
        getDivisiones_preg();
        getCognitivas_preg();
        getPeriodos_preg();
        getEstatus_preg();
        getAcciones_preg();
        getBiblios_preg();
        
        $.ajax({
            url:"<?php echo base_url('index.php/Casos_clinicos_nw/getCasoClinico')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_caso:id_caso,
            id_pregunta:id_pregunta},
            cache:false,
            beforeSend:function(){
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
                $('#id_caso').val(id_caso);
                //getImages(id_caso);
                $("#id_pregunta").val(data.id_pregunta);
                //cargar_imagenes_pregunta(data.id_pregunta);
                $('#pregunta2').val(data.pregunta);
                $('#opcion_a2').val(data.opcion_a);
                $('#opcion_b2').val(data.opcion_b);
                $('#opcion_c2').val(data.opcion_c);
                $('#opcion_d2').val(data.opcion_d);
                $('#opcion_e2').val(data.opcion_e);
                $('#capitulo2').val(data.capitulo);
                $('#id_division2_preg option[value='+data.id_division+']').attr('selected','selected');
                getAreas_preg(data.id_division);
                getTemas_preg(data.id_area,data.id_tema);
                getPuntosClave_tabla_editar_preg(data.id_tema);
                getCasos(data.id_tema);
                $('#id_caso option[value='+id_caso+']').attr('selected','selected');
                $('#id_area2_preg option[value='+data.id_area+']').attr('selected','selected');
                //honey
                $('#id_tema2_preg option[value='+data.id_tema+']').attr('selected','selected');
                console.log(data.id_tema);
                console.log("here!");
                $('#id_temaIn').val(data.id_tema);
                $('#id_complejidad_cognitiva2_preg option[value='+data.id_complejidad_cognitiva+']').attr('selected','selected');
                $('#id_periodo_vida2_preg option[value='+data.id_periodo_vida+']').attr('selected','selected');
                $('#estatus_list_preg option[value='+data.id_estatus+']').attr('selected','selected');
                $('#accion_list_preg option[value='+data.id_accion+']').attr('selected','selected');
                $('#respuesta2 option[value='+data.respuesta+']').attr('selected','selected');
                $('#id_bibliografia2_preg option[value='+data.id_bibliografia+']').attr('selected','selected');
                $('#id_caso_e option[value='+id_caso+']').attr('selected','selected');
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
            }
        });

        $("#Modal_editar").modal("show");
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

                $.each(data, function(i, item) { 

                    $('.list-casos').append('<option value="'+data[i].id_caso+'">'+data[i].caso_clinico+'</option>');
                });
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

    function eliminaPregunta(id_caso, id_pregunta){

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
                        tabla_preguntas(id_caso);
                        getTablaCasosClinicos();
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

    function getPuntosClave_tabla_preg(id_tema){

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

                    $('#tabla_imagenes_caso tbody').append('<tr><td style="text-align: center;"><div><img src="<?=base_url();?>img/casos_clinicos/'+data[i].especialidad+'/E'+data[i].especialidad+'_C'+data[i].num_caso+'_P'+data[i].n_pregunta+'_'+data[i].posicion+'_V01.jpg" style="cursor:pointer;"  width="100" height="100" class="img" data-action="zoom"></div></td></tr>');
                });
                $('#footer_boton_imagenes').append('<div class="input-group form-group" style="text-align: center; "><span class="btn btn-success btn-file btn-sm">AGREGAR NUEVA IMAGEN<input type="file" accept=".jpg" name="agregar_img_caso" id="agregar_img_caso" onchange="agregar_imagen_cc('+id_caso+');"></span></div>');
            }
        });
        
    }

    function agregarPregunta(){
        var tema = $("#id_tema2_e").val();
        console.log(tema)
        var caso = $("#e_id_caso_clinico").val();
        var division = $("#id_division2_e").val();
        var area = $("#id_area2_e").val();
        var comple = 1; //default
        var periodo = 1; //default
        var estatus = $("#id_area2_e").val();
        var accion = $("#accion_list_e").val();
        $("#id_caso_p").val(caso);
        $("#id_division2_e2").val(division);
        $("#id_area2_e2").val(area);
        $("#id_tema2_e2").val(tema);
        $("#id_complejidad_cognitiva2_e").val(comple);
        $("#id_periodo_vida2_e").val(periodo);
        $("#estatus_list_e2").val(accion);
        $("#accion_list_e2").val(accion);
        getImagesCasoEspecifico(caso);
        iniciarTempImg();
        getPuntosClave_tabla_preg(tema);
        $('.tabla_imagenes tbody').empty();
        $('.alert').hide();
        $('.puntos_clave_arreglo').val("");
        $("#contador").val("1");
        $("#arrayContador").val("");
        $("#Modal_registrar").modal("show");
        $('#registro_caso_clinico')[0].reset();
        getBiblios();
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
                $("#cuerpo_autorizacion1").empty(); 
                $("#Modal6").modal("show");
                $("#cuerpo_autorizacion1").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');
                },
                success: function(resultado){
                $('#cambiar_img_caso').val("");
                var res = JSON.parse(resultado);
                if(res.estatus){
                    $("#cuerpo_autorizacion1").empty();
                    $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                    n.push(contador);
                    //console.log(n);
                    $('#contador').val(contador+1);
                    $('#arrayContador').val(n);
                    cargar_imagenes_pregunta_temp(n, res.especialidad);
                }else{
                    $("#cuerpo_autorizacion1").empty();
                    $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
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
                            $("#cuerpo_autorizacion1").empty(); 
                            $("#Modal6").modal("show");
                            $("#cuerpo_autorizacion1").append('<div class="loader "></div><h3 style="margin-top: 55px;">Cargando...</h3>');

                        },
                        success: function(resultado){
                            $('#cambiar_img_pregunta'+posicion).val("");
                            var res = JSON.parse(resultado);
                            if(res.estatus){
                                $("#cuerpo_autorizacion1").empty();
                                $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Exitosa</h3>');
                                cargar_imagenes_pregunta_temp(n, res.especialidad);
                            }else{
                                $("#cuerpo_autorizacion1").empty();
                                $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló'+res.errores+'</h3>');
                            }
                        }
                    });
                }

            }
        });


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
                            $("#cuerpo_autorizacion1").empty(); 
                            $("#Modal6").modal("show");
                            $("#cuerpo_autorizacion1").append('<div class="loader "></div><h3 style="margin-top: 55px;">Eliminando...</h3>');
                            $('#tabla_imagenes_pregunta_e tbody').empty();
                            },
                            success: function(resultado){
                                    $('#cambiar_img_pregunta').val("");
                                    var res = JSON.parse(resultado);
                                    if(res.estatus){
                                        $("#cuerpo_autorizacion1").empty();
                                        $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Se eliminó exitosamente</h3>');
                                        //console.log(n);
                                        var indice = arrayPos.indexOf(posicion); // obtenemos el indice
                                        arrayPos.splice(indice, 1);
                                        $('#arrayContador').val(arrayPos);
                                        cargar_imagenes_pregunta_temp(arrayPos, res.especialidad);
                                    }else{
                                        $("#cuerpo_autorizacion1").empty();
                                        $("#cuerpo_autorizacion1").append('<h3 style="margin-top: 55px; margin-bottom:55px;">Carga Falló: no se pudo eliminar</h3>');
                                    }
                            }
                        });
                        
                    }
                });

            }
        });


    }
</script>
<script src="<?=base_url();?>js/zoom.js"></script>