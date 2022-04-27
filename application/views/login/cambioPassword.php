<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Consejo mexicano de ginecología y obstetricia.">
    <meta name="author" content="Caltec Soluciones">
    <link rel="icon" href="<?=base_url();?>img/favicon.png">
    <title><?=$titulo;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=base_url();?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?=base_url();?>css/footer.css" rel="stylesheet">
    <link href="<?=base_url();?>css/menu.css" rel="stylesheet">
    <link href="<?=base_url();?>css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <?=$menu;?>

    <div class="container"> 
      <div class="row"><br class="hidden-xs"><br class="hidden-xs">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h4 class="text-left"><b>Cambio de contraseña</b></h4>
            </div>
            <div class="panel-body">
              <?php echo form_open('Login/actualizarUsuario',array('id'=>'formActualizar'));?>
                <div class="col-sm-12">

                  <div class="form-group">
                    <label for="cedula">Usuario</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-user"></i> </span>
                      <input type="text" class="form-control" placeholder="Usuario" required="required" id="cedula" name="cedula" autocomplete="off" readonly="true" value="<?=$dts['cedula'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-envelope"></i> </span>
                      <input type="email" class="form-control" placeholder="Correo electrónico" required="required" id="correo" name="correo" autocomplete="off" readonly="true" value="<?=$dts['correo'];?>">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="password1">Nueva contraseña</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-lock"></i> </span>
                      <input type="password" class="form-control" placeholder="Contraseña" required="required" id="password1" name="password1" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password2">Repetir contraseña</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-repeat"></i> </span>
                      <input type="password" class="form-control" placeholder="Repetir contraseña" required="required" id="password2" name="password2" autocomplete="off">
                    </div>
                  </div>
                  <input type="hidden" id="pregunta" name="pregunta" value="Default">
                  <!--
                  <hr>
                  <div class="form-group">
                    <label for="pregunta">Pregunta de seguridad</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-question-sign"></i> </span>
                      <input type="text" class="form-control" placeholder="¿Cúal es el apellido materno de su mamá?" required="required" id="pregunta" name="pregunta" autocomplete="off">
                    </div>
                  </div> -->
                </div>
                <div class="col-xs-12">
                  <br>
                  <div id="ajaxLoader" class="alert alert-info oculto" role="alert">
                    <span><img src="<?=base_url();?>img/ajaxLoader.gif" width="19" height="19" alt="..."></span>
                    <span> &nbsp; Procesando...</span>
                  </div>
                  <div id="alertDanger" class="alert alert-danger oculto" role="alert">
                    <strong><span class="glyphicon glyphicon-alert"></span>&nbsp;</strong>
                    <span id="alertDangerText"></span>
                  </div>
                  <div id="alertSuccess" class="alert alert-success oculto" role="alert">
                    <strong><span class="glyphicon glyphicon-ok-sign"></span></strong>
                    <span id="alertSuccessText"></span>
                  </div>
                </div>             
                <div class="row text-center">
                  <button type="submit" class="btn btn-success" id="btnEnviar" title="Iniciar sesión"><i class="glyphicon glyphicon-log-in"></i> <b>Enviar</b></button>
                </div>
                <input type="hidden" name="token" value="<?=$token;?>">
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?=$footer;?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>js/jquery.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url();?>js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
      <?=$script;?>
    </script>
  </body>
</html>
