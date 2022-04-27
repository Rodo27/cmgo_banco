<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Consejo mexicano de ginecología y obstetricia.">
    <meta name="author" content="Caltec Soluciones">
    <link rel="icon" href="<?=base_url();?>img/favicon.png">
    <title><?=$titulo;?></title>
  
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/plugins/datatables/jquery.dataTables.min.css"> 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
    .panel-body .input-group-addon{background-color:#605ca8;color:#fff;border:1px solid #605ca8;font-size:20px;}
    .scroll{overflow:auto;}
    .popover{min-width:600px;max-width:600px;}
    ul > .active{background-color:#605ca8;}
    .modal-dialog{width:80% !important;}
    .modal-dialog > select,textarea{font-size:18px !important;}
    .rojo{color:#FF0000;}
    .amarillo{color:#FFD700;}
    .verde{color:#7CFC00;}
    .verdeFuerte{color:#008000;}
    .oculto{display:none;}
  </style>

</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?=base_url();?>index.php/Login" class="logo">
      <span class="logo-mini"><small>CMGO</small></span>
      <span class="logo-lg"><b>CMGO</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="<?=base_url();?>index.php/Login" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>&nbsp;</li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image" style="color:#fff;">
          <h4><i class="fa fa-circle text-success"></i> &nbsp; <?=$this->session->nombre;?></h4>
          <?=($this->session->especialidad=='gyo')?'Ginecología y obstetricia':'';?>
          <?=($this->session->especialidad=='brh')?'Biología de la reproducción humana':'';?>
          <?=($this->session->especialidad=='mmf')?'Medicina materno Fetal':'';?>
          <?=($this->session->especialidad=='uro')?'Urología ginecológica':'';?>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header" <?=($this->session->rol!="admin")?'style="display:none;"':'';?>>ESPECIALIDADES</li>
        <li class="treeview" <?=($this->session->rol!="admin")?'style="display:none;"':'';?>>
          <a href="#">
            <i class="fa fa-file-text"></i> <span>ESPECIALIDAD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview <?=($this->session->especialidad=='gyo')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/gyo"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='gyo')?'map-marker':'record';?>"></i><span>GYO</span></a></li>
            <li class="treeview <?=($this->session->especialidad=='brh')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/brh"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='brh')?'map-marker':'record';?>"></i><span>BRH</span></a></li>
            <li class="treeview <?=($this->session->especialidad=='mmf')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/mmf"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='mmf')?'map-marker':'record';?>"></i><span>MMF</span></a></li>
            <!-- <li class="treeview <?=($this->session->especialidad=='uro')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/uro"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='uro')?'map-marker':'record';?>"></i><span>URO</span></a></li>
            <li class="treeview <?=($this->session->especialidad=='uro2')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/uro2"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='uro2')?'map-marker':'record';?>"></i><span>URO NUEVO</span></a></li> -->
            <li class="treeview <?=($this->session->especialidad=='uropuem')?'active':'';?>"><a href="<?=base_url();?>index.php/Comite/uropuem"><i class="glyphicon glyphicon-<?=($this->session->especialidad=='uropuem')?'map-marker':'record';?>"></i><span>URO PUEM</span></a></li>
          </ul>
        </li>

        <li class="header">MENÚ</li>
        <li class="treeview <?=($menu=='casos_clinicos')?'active':'';?>">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>CASOS CLÍNICOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview <?=($sbmenu=='cc_temas')?'active':'';?>"><a href="<?=base_url();?>index.php/Casos_clinicos/cc"><i class="glyphicon glyphicon-<?=($sbmenu=='cc_temas')?'map-marker':'record';?>"></i><span>TEMAS</span></a></li>
            <li class="treeview <?=($sbmenu=='cc_casos')?'active':'';?>"><a href="<?=base_url();?>index.php/Casos"><i class="glyphicon glyphicon-<?=($sbmenu=='cc_casos')?'map-marker':'record';?>"></i><span>CASOS</span></a></li>
            <li class="treeview <?=($sbmenu=='cc_casos_new')?'active':'';?>"><a href="<?=base_url();?>index.php/Casos_c_new"><i class="glyphicon glyphicon-<?=($sbmenu=='cc_casos_nw')?'map-marker':'record';?>"></i><span>CASOS_NW</span></a></li>
            <li class="treeview <?=($sbmenu=='cc_preguntas')?'active':'';?>"><a href="<?=base_url();?>index.php/Casos_clinicos/preguntas"><i class="glyphicon glyphicon-<?=($sbmenu=='cc_preguntas')?'map-marker':'record';?>"></i><span>PREGUNTAS</span></a></li>
            <li class="treeview <?=($sbmenu=='cc_preguntas_nw')?'active':'';?>"><a href="<?=base_url();?>index.php/Casos_clinicos_nw"><i class="glyphicon glyphicon-<?=($sbmenu=='cc_preguntas_nw')?'map-marker':'record';?>"></i><span>PREGUNTAS_NW</span></a></li>

          </ul>
        </li>
        <li class="treeview <?=($menu=='conocimientos_generales')?'active':'';?>">
          <a href="#">
          <i class="fa fa-file-text"></i> <span>CONOCIMIENTOS GRALES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview <?=($sbmenu=='cg_temas')?'active':'';?>"><a href="<?=base_url();?>index.php/Conocimientos_generales"><i class="glyphicon glyphicon-<?=($sbmenu=='cg_temas')?'map-marker':'record';?>"></i><span>TEMAS</span></a></li>
            <li class="treeview <?=($sbmenu=='cg_preguntas')?'active':'';?>"><a href="<?=base_url();?>index.php/Conocimientos_generales/preguntas"><i class="glyphicon glyphicon-<?=($sbmenu=='cg_preguntas')?'map-marker':'record';?>"></i><span>PREGUNTAS</span></a></li>
            <li class="treeview <?=($sbmenu=='cg_preguntas_nw')?'active':'';?>"><a href="<?=base_url();?>index.php/Conocimientos_generales_nw"><i class="glyphicon glyphicon-<?=($sbmenu=='cg_preguntas_nw')?'map-marker':'record';?>"></i><span>PREGUNTAS_NW</span></a></li>
          </ul>
        </li>
        <li class="treeview <?=($sbmenu=='bibliografia')?'active':'';?>">
          <a href="<?=base_url();?>index.php/Bibliografia">
            <i class="<?=($sbmenu=='bibliografia')?'glyphicon glyphicon-map-marker':'fa fa-file-text';?>"></i> <span>BIBLIOGRAFÍA</span>
          </a>
        </li>
         
        <li class="treeview <?=($menu=='admin')?'active':'';?>">
        <?=($this->session->rol=="admin")?'  
        <a href="#">
            <i class="fa fa-file-text"></i> <span>ADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>':null;?>
          <ul class="treeview-menu">
            <li class="treeview <?=($sbmenu=='divisiones')?'active':'';?>"><a href="<?=base_url();?>index.php/Divisiones"><i class="glyphicon glyphicon-<?=($sbmenu=='divisiones')?'map-marker':'record';?>"></i><span>DIVISIONES</span></a></li>
            <li class="treeview <?=($sbmenu=='areas')?'active':'';?>"><a href="<?=base_url();?>index.php/Areas"><i class="glyphicon glyphicon-<?=($sbmenu=='areas')?'map-marker':'record';?>"></i><span>ÁREAS</span></a></li>
            <li class="treeview <?=($sbmenu=='analisis')?'active':'';?>" <?=($this->session->rol!="admin")?'style="display:none;"':'';?>><a href="<?=base_url();?>index.php/Analisis"><i class="glyphicon glyphicon-<?=($sbmenu=='analisis')?'map-marker':'record';?>"></i><span>ANÁLISIS</span></a></li>
            <li class="treeview <?=($sbmenu=='permisos')?'active':'';?>" <?=($this->session->rol!="admin")?'style="display:none;"':'';?>><a href="<?=base_url();?>index.php/Permisos"><i class="glyphicon glyphicon-<?=($sbmenu=='permisos')?'map-marker':'record';?>"></i><span>PERMISOS</span></a></li>
            <li class="treeview <?=($sbmenu=='balance')?'active':'';?>" <?=($this->session->rol!="admin")?'style="display:none;"':'';?>><a href="<?=base_url();?>index.php/Balance"><i class="glyphicon glyphicon-<?=($sbmenu=='balance')?'map-marker':'record';?>"></i><span>BALANCE</span></a></li>
            <li class="treeview <?=($sbmenu=='admin_usuario')?'active':'';?>"><a href="<?=base_url();?>index.php/Admin_usuario">
            <i class="<?=($sbmenu=='admin_usuario')?'glyphicon glyphicon-user':'glyphicon glyphicon-user';?>"></i> <span>Admin. Usuarios</span>
          </a>
        </li>
          </ul>
        </li>

        <?=(($this->session->rol=="admin" || $this->session->rol=="certificacion")?
          '<li class="treeview '.(($sbmenu=="preguntacg_aprobado")?"active":"").'">'.
            '<a href="'.base_url().'index.php/Conocimientos_generales/preguntacg_aprobado">'.
              '<i class="'.(($sbmenu=="preguntacg_aprobado")?"glyphicon glyphicon-map-marker":"fa fa-file-text").'"></i> <span>REACTIVOS APROBADOS  CG</span>
            </a>
          </li>'
        :null)?>

        <?=(($this->session->rol=="admin" || $this->session->rol=="certificacion")?
          '<li class="treeview '.(($sbmenu=="preguntacc_aprobado")?"active":"").'">'.
            '<a href="'.base_url().'index.php/Casos_clinicos/preguntacc_aprobado">'.
              '<i class="'.(($sbmenu=="preguntacc_aprobado")?"glyphicon glyphicon-map-marker":"fa fa-file-text").'"></i> <span>REACTIVOS APROBADOS  CC</span>
            </a>
          </li>'
        :null)?>


        <li class="header">SESIÓN</li>
        <li class="treeview">
          <a href="<?=base_url();?>index.php/Login/salir">
            <i class="fa fa-file-text"></i> <span>SALIR</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      <?=$contenido;?>
    </section>
  </div>
  <footer class="main-footer">
    <strong>CONSEJO MEXICANO DE GINECOLOGÍA Y OBSTETRICIA</strong>
    <input type="hidden" name="BUSCADOR_DATA_TABLES" id="BUSCADOR_DATA_TABLES" value="">
  </footer>
</div>
<script src="<?=base_url();?>AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?=base_url();?>AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>AdminLTE/dist/js/app.min.js"></script>
<script src="<?=base_url();?>AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<?=$script;?>
</body>
</html>