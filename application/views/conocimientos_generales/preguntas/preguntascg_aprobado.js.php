<!-- <script type="text/javascript">
  
</script> -->

<script type="text/javascript">
  $(document).ready(function(){

    // alert('hola');
    getTabla();

  });

  function verPreguntaAprobado(id_pregunta){

    $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/get_preguntas_aprobadoID')?>",
        type:'GET',
        dataType:"JSON",
        data:{id_pregunta:id_pregunta},
        cache:false,
        beforeSend:function(){},
        success:function(data){
          $("#id_pregunta_banco_aprobado").val(data.id_pregunta_banco);
          $("#pregunta_aprobado").val(data.pregunta);
          $("#a_aprobado").val(data.a);
          $("#b_aprobado").val(data.b);
          $("#c_aprobado").val(data.c);
          $("#d_aprobado").val(data.d);
          $("#e_aprobado").val(data.e);
          $("#respuesta_aprobado").val(data.respuesta);
          $("#director_aprobado").val(data.director);
          $("#fecha_aprobado").val(data.fecha_autorizacion);

          $("#preguntaContenido").modal("show");
        }
      });

  }

  function getTabla(){

    var especialidad= $("#especialidad_tipo").val();
    var tipo_reactivo= $("#tipo_reactivo").val();
    var version_examen= $("#version_examen").val();
     $.ajax({
        url:"<?php echo base_url('index.php/Conocimientos_generales/get_preguntas_aprobado')?>",
        type:'GET',
        dataType:"JSON",
        data:{especialidad:especialidad,
              tipo_reactivo:tipo_reactivo,
              version_examen:version_examen
              },
        cache:false,
        beforeSend:function(){$('#tabla_preguntas tbody').empty()},
        success:function(data){
          $('#preguntas_contenedor_aprobado').html(data);
        }
      });
  }
</script>