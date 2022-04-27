    <nav class="navbar navbar-default navbar-fixed-top hidden-xs" style="border:0;background:none;">
      <div class="container-fluid" id="container-fluid-1">
        <div class="container">
          <div class="col-sm-2 col-md-2">
          </div>
          <div class="col-sm-10 col-md-8 text-center">
            <div class="row text-right" style="margin-top:-10px;">
              <?php
                if($this->session->logged){ 
                  echo '<a class="btn-top-menu pull-right" href="'.base_url().'index.php/login/salir" title="Cerrar sesión">'.'<img src="'.base_url().'img/btn_salir.png" class="img img-responsive">'.'</a>'; }
                else{ 
                  echo '<a class="btn-top-menu pull-right" href="'.base_url().'index.php/login" title="Iniciar sesión">'.'<img src="'.base_url().'img/btn_ingreso.png" class="img img-responsive">'.'</a>'; }
              ?>  
            </div>
          </div>
          <div class="hidden-sm col-md-2"></div>
        </div>
      </div>
    </nav>