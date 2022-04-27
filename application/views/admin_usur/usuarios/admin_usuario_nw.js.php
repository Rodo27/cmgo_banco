<script type="text/javascript">

	$(document).ready(function(){

        getTabla();

        //Registro desde el formulario
        $('#registro_usuario').submit(function(e) {

            $(".validacion").hide();
            $(".noti").hide();

            var validationPass = $("#misma").val();

            if(validationPass == 1){

                $.ajax({
                    url:"<?php echo base_url('index.php/Admin_usuario/registroUsuario')?>",
                    type:'GET',
                    dataType:"JSON",
                    data: $('#registro_usuario').serialize(),
                    cache:false,
                    beforeSend:function(){
                        $('#registro_usuario')[0].reset(); //Limpia la modal de registro
                        $(".alert").hide();
                        $('#rol_e2').val("");
                    },
                    success:function(data){
                        //alert("¡Registro exitoso!");
                        if(data.estatus)
                        {
                            $('#usuario_registrado').removeClass('alert-danger');
                            $('#usuario_registrado').addClass('alert-success');
                        }
                        else{
                            $('#usuario_registrado').removeClass('alert-success');
                            $('#usuario_registrado').addClass('alert-danger');
                        }
                        
                            
                        $("#usuario_registrado").show();
                        $("#mensaje_r").text(data.msg);
                        getTabla();
                        
                    }
                });

            }
            else{
                alert("Las contraseñas no coinciden");
            }
            e.preventDefault();
        });

        //Editar desde el formulario
        $('#edicion_usuario').submit(function(e) {

            $(".validacion").hide();
            $(".noti").hide();

            var validationPass = $("#misma_e").val();

            if(validationPass == 1){

                $.ajax({
                    url:"<?php echo base_url('index.php/Admin_usuario/actualizaUsuario')?>",
                    type:'GET',
                    dataType:"JSON",
                    data: $('#edicion_usuario').serialize(),
                    cache:false,
                    beforeSend:function(){
                        $(".alert").hide();
                    },
                    success:function(data){
                        if(data){
                            //alert("¡Registro exitoso!");
                            $("#usuario_editado").show();
                            getTabla();
                        }
                        else{
                            //alert("Fallo en el registro.");
                            $("#usuario_no_editado").show();
                        }
                    }
                });

            }
            else{
                alert("Las contraseñas no coinciden");
            }
            e.preventDefault();
        });

        //Verificar contraseña
        $('#contraV_e').change(function(e) {

            $(".noti").hide();

            if($('#contraV_e').val() == $('#contrase_e').val()){
                $('#bienI').show();
                $('#misma_e').val("1");
            }
            else{
                $('#malI').show();
                $('#misma_e').val("0");
            }

            e.preventDefault();
        });

        $('#contrase_e').change(function(e) {

            if($('#contraV_e').val() == $('#contrase_e').val()){
                $('#bien_e').show();
                $('#misma_e').val("1");
            }
            else{
                $('#mal_e').show();
                $('#misma_e').val("0");
            }

            e.preventDefault();
        });

        $('#contraV').change(function(e) {
           
            $(".validacion").hide();

            if($('#contraV').val() == $('#contrase').val()){
                $('#bien1').show();
                
                $('#misma').val("1");
            }
            else{
                $('#mal1').show();
                $('#misma').val("0");
            }

            e.preventDefault();
        });

        $('#contrase').change(function(e) {

            


            if($('#contraV').val() == $('#contrase').val()){
                $('#bien2').show();
                $('#misma').val("1");
            }
            else{
                $('#mal2').show();
                $('#misma').val("0");
            }

            e.preventDefault();
        });

        //quitar espacios
        $("#rol_e2").keyup(function(){              
            var ta      =   $("#rol_e2");
            letras      =   ta.val().replace(/ /g, "");
            letras = ta.val().replace(/[^a-z]/g,'') ;
            ta.val(letras);
        });

        $("#rol_e").keyup(function(){              
            var ta      =   $("#rol_e");
            letras      =   ta.val().replace(/ /g, "");
            letras = ta.val().replace(/[^a-z]/g,'') ;
            ta.val(letras);
        });
		      
    });


    function getTabla(){

        $.ajax({
            url:"<?php echo base_url('index.php/Admin_usuario/getUsuarios')?>/",
            type:'GET',
            dataType:"json",
            cache:false,
            beforeSend:function(){
                $('#usuarios').empty();
                $('#usuarios').html('<img src="<?=base_url();?>img/ajaxLoader.gif" class="img img-responsive" style="margin:0 auto; height:100px; width:100px;">')},
            success:function(result){
            $('#usuarios').html(result);
            }
        });
    }

  

  function nuevoRegistro(){
    $('#rol_e2').val("");
    $('#registraUsuario').modal("show");

  }

  function editarUsuario(id_usuario){

    $(".noti").hide();
    $(".validacion").hide();
    $('#id_usu').val(id_usuario);
    
    $.ajax({
            url:"<?php echo base_url('index.php/Admin_usuario/getDatosUsuario')?>",
            type:'GET',
            dataType:"JSON",
            data:{id_usuario:id_usuario},
            cache:false,
            beforeSend:function(){
                $('#edicion_usuario')[0].reset();
                $('#rol_e').val("");
                $('.alert').hide();
            },
            success:function(data){

                $('#usuario_e').val(data.usuario);
                $('#correo_e').val(data.correo);
                $('#id_usuario_e').val(id_usuario);
                $('#estatus_e').val(data.estatus);
                $('#rol_e').val(data.rol);
            }
        });
                
                

      $('#editaUsuario').modal("show");

  }

  function eliminarUsuario(id_usuario){

    $("#id_usu").val(id_usuario);
    $('#notificacion').modal("show");

  }


  function eliminarDefUsuario(){

    var id_usuario = $("#id_usu").val();

    $.ajax({
        url:"<?php echo base_url('index.php/Admin_usuario/eliminarUsuario')?>/",
        type:'GET',
        dataType:"json",
        data:{id_usuario:id_usuario},
        cache:false,
        beforeSend:function(){
                $('#notificacion').modal('hide');
                $('#buenaOmala').modal('show');
                $(".alert").hide();
            },
        success:function(data){
            if(data){
                $("#usuario_eliminado").show();
                getTabla();
             }
            else{
                $("#usuario_no_eliminado").show();
            }
            
        }
    });

  }

  function cancelar(){
    $('#notificacion').modal('hide');
  }

  function cerrarNoti(){
    $('#buenaOmala').modal('hide');
  }

  

</script>