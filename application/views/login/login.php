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

    <style type="text/css">
      .panel-body .input-group-addon{background-color:#605ca8;color:#fff;border:1px solid #605ca8;}
    </style>

  </head>
  <body>

    <?=$menu;?>

    <div class="container"> 
      <div class="row"><br class="hidden-xs"><br class="hidden-xs">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading text-center" style="background-color:#605ca8;color:#fff;border:1px solid #605ca8;">
              <h4><b>PLANTILLA DE COMITÉS</b></h4>
            </div>
            <div class="panel-body" style="color:#fff;border:1px solid #605ca8;">
              <?php echo form_open('Login/iniciarSesion',array('id'=>'formLogin'));?>
                <div class="col-sm-3 col-lg-4">
                  <a href="https://www.cmgo.org.mx"><img src="<?=base_url();?>img/logo_cmgo.png" class="img img-responsive" style="margin:0 auto;"></a>
                </div>
                <div class="col-sm-9 col-lg-8">
                  <br>
                  <div class="input-group">
                    <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-user"></i> </span>
                    <input type="text" class="form-control" placeholder="Usuario" required="required" id="cedula" name="cedula" autocomplete="off">
                  </div>
                  <br>
                  <div class="input-group">
                    <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-lock"></i> </span>
                    <input type="password" class="form-control" placeholder="Contraseña" required="required" id="password" name="password" autocomplete="off">
                  </div>
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
                </div>
                <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-primary" id="btnEnviar" title="Iniciar sesión"><i class="glyphicon glyphicon-log-in"></i> <b>Entrar</b></button>
                </div>
              <?php echo form_close(); ?>
            </div>
            <div class="panel-footer" style="color:#fff;border:1px solid #605ca8;">
              <div class="row">
                <div class="col-sm-12">
                  <a href="#" data-toggle="modal" data-target="#MyModal1">¿Olvidaste tu contraseña o quieres generar una nueva?</a><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal1 -->
    <div class="modal fade" role="dialog" id="MyModal1">
      <div class="modal-dialog" id="mdialTamanio">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i></button>
            <h4 class="modal-title">¿Olvidaste tu contraseña?</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('Login/formPassword',array('id'=>'formPassword'));?>
            <h5>Ingresa tu <b><i>Usuario y Correo</i></b> para que se te envíe una liga donde puedas cambiar tu contraseña.</h5><br>
            <div class="input-group">
              <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-user"></i> </span>
              <input type="text" class="form-control" placeholder="Usuario" required="required" id="cedula2" name="cedula2" autocomplete="off">
            </div><br>
            <div class="input-group">
              <span class="input-group-addon icons-login"> <i class="glyphicon glyphicon-envelope"></i> </span>
              <input type="email" class="form-control" placeholder="Correo (usuario@dominio.com)" required="required" id="correo2" name="correo2" autocomplete="off">
            </div><br>
            <div id="ajaxLoader2" class="alert alert-info oculto" role="alert">
              <span><img src="<?=base_url();?>img/ajaxLoader.gif" width="20" height="20" alt="Loading"></span>
              <span> &nbsp; Esto puede tardar varios segundos, espere por favor.</span>
            </div>
            <div id="alertDanger2" class="alert alert-danger oculto" role="alert">
              <strong><span class="glyphicon glyphicon-alert"></span>&nbsp;</strong>
              <span id="alertDangerText2"></span>
            </div>
            <div id="alertSuccess2" class="alert alert-success oculto" role="alert">
              <strong><span class="glyphicon glyphicon-ok-sign"></span></strong>
              <span id="alertSuccessText2"></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnEnviar2" title="Enviar datos"><span class="glyphicon glyphicon-send"></span> Enviar</button>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" role="dialog" id="MyModal2">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i></button>
            <h4 class="modal-title">Registro al portal CMGO</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('login/registro',array('id'=>'formRegistro'));?>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group form-group-sm">
                    <label for="registroNombre">Nombre(s)</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" class="form-control" placeholder="Nombre(s)" required="required" id="registroNombre" name="registroNombre" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroApaterno">Apellido paterno</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" class="form-control" placeholder="Apellido paterno" required="required" id="registroApaterno" name="registroApaterno" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroPassword1">Contraseña</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-lock"></i></span>
                      <input type="password" class="form-control" placeholder="Contraseña" required="required" id="registroPassword1" name="registroPassword1" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroCorreo">Correo electrónico</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-envelope"></i></span>
                      <input type="email" class="form-control" placeholder="Correo electrónico" required="required" id="registroCorreo1" name="registroCorreo1" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group form-group-sm">
                    <label for="registroCedula">Cédula de Médico General</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-education"></i></span>
                      <input type="text" class="form-control" placeholder="Cédula profesional" required="required" id="registroCedula" name="registroCedula" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroAmaterno">Apellido materno</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="text" class="form-control" placeholder="Apellido materno" required="required" id="registroAmaterno" name="registroAmaterno" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroPassword2">Repetir contraseña</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-repeat"></i></span>
                      <input type="password" class="form-control" placeholder="Repetir contraseña" required="required" id="registroPassword2" name="registroPassword2" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group form-group-sm">
                    <label for="registroCorreo">Repetir correo electrónico</label>
                    <div class="input-group">
                      <span class="input-group-addon icons-login"><i class="glyphicon glyphicon-repeat"></i></span>
                      <input type="email" class="form-control" placeholder="Repetir correo electrónico" required="required" id="registroCorreo2" name="registroCorreo2" autocomplete="off">
                    </div>
                  </div>
                  <input type="hidden" id="registroPregunta" name="registroPregunta" value="Default">
                </div>
              </div>
              <div id="ajaxLoader3" class="alert alert-info oculto" role="alert">
                <span><img src="<?=base_url();?>img/ajaxLoader.gif" width="20" height="20" alt="Loading"></span>
                <span> &nbsp; Procesando...</span>
              </div>
              <div id="alertDanger3" class="alert alert-danger oculto" role="alert">
                <strong><span class="glyphicon glyphicon-alert"></span>&nbsp;</strong>
                <span id="alertDangerText3"></span>
              </div>
              <div id="alertSuccess3" class="alert alert-success oculto" role="alert">
                <strong><span class="glyphicon glyphicon-ok-sign"></span></strong>
                <span id="alertSuccessText3"></span>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnEnviar3" title="Enviar datos"><span class="glyphicon glyphicon-send"></span> Enviar</button>
            <?php echo form_close(); ?>
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
