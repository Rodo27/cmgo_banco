<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Casos_model','model');
    }

    public function agregar_imagenes_pregunta(){

    	$id_pregunta=$_POST['id_pregunta'];
    	$num_posicion =$this->model->agregar_imagenes_pregunta($id_pregunta);

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$nombre_imagen ='E'.$var_especialidad.'_C'.$num_posicion['num_caso'].'_P'.$num_posicion['n_pregunta'].'_'.$num_posicion['maximo'].'_V01';
    	
    	if (isset($num_posicion)) {
    		
	        $config['upload_path'] = './img/casos_clinicos/'.$var_especialidad.'/';
	        $config['overwrite'] = TRUE;
	        $config['allowed_types'] = 'jpg';
	        $config['file_name'] = $nombre_imagen;
	        $config['max_size'] = '3072';
	        // $config['max_width']  = '1024';
	        // $config['max_height']  = '768';
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        $image="agregar_img_pregunta";
	        if ( ! $this->upload-> do_upload($image)){
	            $errores = $this->upload->display_errors();
	            if(strpos($errores, 'uploaded file exceeds the maximum')){
	                $errors='<br>El archivo excede el tamaño permitido (MÁXIMO 3 MB).';
	            }else if(strpos($errores, 'filetype you are attempting to upload is not allowed')){
	                $errors='<br>El tipo de archivo que intenta subir no esta permitido (SOLO FORMATO JPG).';
	            }else{
	                $errors=$errores;
	            }

	            $resultado=array('estatus' =>FALSE ,'errores'=> $errors);
	            echo json_encode($resultado);
	        }else{ 
	            $resultado=array('estatus' =>TRUE);
	            echo json_encode($resultado);
	        }
    		
    	}else{
    		echo FALSE;
    	}
        
    }

    public function eliminar_imagenes_pregunta(){

    	$nombre_imagen=$_GET['nombre_imagen'];
    	$especialidad=$_GET['especialidad'];
    	$posicion=$_GET['posicion'];
    	$id_caso=$_GET['id_caso'];
    	$n_pregunta=$_GET['n_pregunta'];

    	$borrar =$this->model->borrar_imagenes_pregunta($id_caso, $especialidad, $posicion, $n_pregunta);
        echo json_encode($borrar);


    	unlink('./img/casos_clinicos/'.$especialidad.'/'.$nombre_imagen.'.jpg');

    }

    public function cambiar_imagen_pregunta(){

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$nombre_imagen =$_POST['nombre_imagen'];
        $config['upload_path'] = './img/casos_clinicos/'.$var_especialidad.'/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $nombre_imagen;
        $config['max_size'] = '3072';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $this->load->library('upload');
        $this->upload->initialize($config);
        $image="cambiar_img_pregunta";
        if ( ! $this->upload-> do_upload($image)){
            $errores = $this->upload->display_errors();
            if(strpos($errores, 'uploaded file exceeds the maximum')){
                $errors='<br>El archivo excede el tamaño permitido (MÁXIMO 3 MB).';
            }else if(strpos($errores, 'filetype you are attempting to upload is not allowed')){
                $errors='<br>El tipo de archivo que intenta subir no esta permitido (SOLO FORMATO JPG).';
            }else{
                $errors=$errores;
            }

            $resultado=array('estatus' =>FALSE ,'errores'=> $errors);
            echo json_encode($resultado);
        }else{ 
            $resultado=array('estatus' =>TRUE);
            echo json_encode($resultado);
            // echo 'EXITOSO';
        }

    }

    public function cargar_imagenes_pregunta(){
    	
    	$id_pregunta_banco=$_GET['id_pregunta_banco'];

        $nombre_imagenes =$this->model->cargar_imagenes_pregunta($id_pregunta_banco);
        echo json_encode($nombre_imagenes);

    }

    public function agregar_imagenes_caso(){

    	$id_caso=$_POST['id_caso'];
    	$num_posicion =$this->model->agregar_imagenes_caso($id_caso);

    	if ($id_caso<10) {
    		$numero_caso='0'.$id_caso;
    	}else{
    		$numero_caso=$id_caso;
    	}

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}



		$nombre_imagen ='E'.$var_especialidad.'_C'.$numero_caso.'_P0_'.$num_posicion['maximo'].'_V01';
    	
    	if (isset($num_posicion)) {
    		
	        $config['upload_path'] = './img/casos_clinicos/'.$var_especialidad.'/';
	        $config['overwrite'] = TRUE;
	        $config['allowed_types'] = 'jpg';
	        $config['file_name'] = $nombre_imagen;
	        $config['max_size'] = '3072';
	        // $config['max_width']  = '1024';
	        // $config['max_height']  = '768';
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        $image="agregar_img_caso";
	        if ( ! $this->upload-> do_upload($image)){
	            $errores = $this->upload->display_errors();
	            if(strpos($errores, 'uploaded file exceeds the maximum')){
	                $errors='<br>El archivo excede el tamaño permitido (MÁXIMO 3 MB).';
	            }else if(strpos($errores, 'filetype you are attempting to upload is not allowed')){
	                $errors='<br>El tipo de archivo que intenta subir no esta permitido (SOLO FORMATO JPG).';
	            }else{
	                $errors=$errores;
	            }

	            $resultado=array('estatus' =>FALSE ,'errores'=> $errors);
	            echo json_encode($resultado);
	        }else{ 
	            $resultado=array('estatus' =>TRUE);
	            echo json_encode($resultado);
	        }
    		
    	}else{
    		echo FALSE;
    	}
        
    }

    public function eliminar_imagenes_caso(){

    	$nombre_imagen=$_GET['nombre_imagen'];
    	$especialidad=$_GET['especialidad'];
    	$posicion=$_GET['posicion'];
    	$id_caso=$_GET['id_caso'];

    	$borrar =$this->model->borrar_imagenes_caso($id_caso, $especialidad, $posicion);
        echo json_encode($borrar);


    	unlink('./img/casos_clinicos/'.$especialidad.'/'.$nombre_imagen.'.jpg');

    }

    public function cargar_imagenes_caso(){
    	
    	$id_caso=$_GET['id_caso'];

        $nombre_imagenes =$this->model->cargar_imagenes_caso($id_caso);
        echo json_encode($nombre_imagenes);

    }

    public function cambiar_imagen_caso(){

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}



		$nombre_imagen =$_POST['nombre_imagen'];
        $config['upload_path'] = './img/casos_clinicos/'.$var_especialidad.'/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $nombre_imagen;
        $config['max_size'] = '3072';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $this->load->library('upload');
        $this->upload->initialize($config);
        $image="cambiar_img_caso";
        if ( ! $this->upload-> do_upload($image)){
            $errores = $this->upload->display_errors();
            if(strpos($errores, 'uploaded file exceeds the maximum')){
                $errors='<br>El archivo excede el tamaño permitido (MÁXIMO 3 MB).';
            }else if(strpos($errores, 'filetype you are attempting to upload is not allowed')){
                $errors='<br>El tipo de archivo que intenta subir no esta permitido (SOLO FORMATO JPG).';
            }else{
                $errors=$errores;
            }

            $resultado=array('estatus' =>FALSE ,'errores'=> $errors);
            echo json_encode($resultado);
        }else{ 
            $resultado=array('estatus' =>TRUE);
            echo json_encode($resultado);
            // echo 'EXITOSO';
        }

    }

    public function guardar_rubrica(){

    	$id_pregunta=$_GET['id_pregunta'];
    	$rubrica1=$_GET['rubrica1'];
    	$rubrica2=$_GET['rubrica2'];
    	$rubrica3=$_GET['rubrica3'];
    	$rubrica4=$_GET['rubrica4'];
    	$rubrica5=$_GET['rubrica5'];
    	$rubrica6=$_GET['rubrica6'];
    	$rubrica7=$_GET['rubrica7'];
    	$rubrica8=$_GET['rubrica8'];
    	$rubrica9=$_GET['rubrica9'];
    	$rubrica10=$_GET['rubrica10'];
    	$rubrica11=$_GET['rubrica11'];
    	$rubrica12=$_GET['rubrica12'];
    	$rubrica13=$_GET['rubrica13'];
    	$rubrica14=$_GET['rubrica14'];
    	$rubrica15=$_GET['rubrica15'];
    	$rubrica16=$_GET['rubrica16'];
    	$rubrica17=$_GET['rubrica17'];
    	$rubrica18=$_GET['rubrica18'];
    	$rubrica19=$_GET['rubrica19'];
    	$rubrica20=$_GET['rubrica20'];
    	$rubrica21=$_GET['rubrica21'];
    	$rubrica22=$_GET['rubrica22'];
    	$rubrica23=$_GET['rubrica23'];
    	$rubrica24=$_GET['rubrica24'];
    	$rubrica25=$_GET['rubrica25'];
    	$rubrica26=$_GET['rubrica26'];
    	$rubrica27=$_GET['rubrica27'];


    	$guardar = $this->model->guardar_rubrica($id_pregunta, $rubrica1, $rubrica2, $rubrica3, $rubrica4, $rubrica5, $rubrica6,
    		$rubrica7, $rubrica8, $rubrica9, $rubrica10, $rubrica10, $rubrica11, $rubrica12, $rubrica13, $rubrica14, $rubrica15, $rubrica16, $rubrica17, $rubrica18, $rubrica19, $rubrica20, $rubrica21, $rubrica22, $rubrica23, $rubrica24, $rubrica25, $rubrica26, $rubrica27

    	);
		echo json_encode($guardar);

    }

    public function get_rubrica(){

    	$id_pregunta=$_GET['id_pregunta'];

    	$rubrica = $this->model->get_rubrica($id_pregunta);
		echo json_encode($rubrica);

    }

	public function index()
	{	
		$this->acceso();
		$id_especialidad = $this->session->cc;
		$especialidad = $this->model->getEspecialidad($id_especialidad);
		$divisiones = $this->model->getIdsDivisiones($id_especialidad,"SI");
		
		$preguntas_piloto = $this->model->get_preguntas_piloto();
		$preguntas_examen = $this->model->get_preguntas_examen();

		$cs_piloto = $this->model->get_cs_piloto();
		$cs_examen = $this->model->get_cs_examen();

		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"casos_clinicos",
				"sbmenu"=>"cc_casos",
				"contenido"=>$this->load->view("casos_clinicos/casos/casos",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					"divisiones"=>$divisiones,
					"cc_piloto"=>$cs_piloto,
					"cc_examen"=>$cs_examen,
					"editar_pregunta"=>$this->load->view("casos_clinicos/editar_pregunta",array(
						"piloto"=>$preguntas_piloto,
						"examen"=>$preguntas_examen),true)
					),true),
				"script"=>$this->load->view("casos_clinicos/casos/casos_new.js.php",array("id_especialidad"=>$id_especialidad),true),
				)
			);
	}

	public function getCombo(){
		$this->acceso();
		$tipo = $this->security->xss_clean($this->input->post("tipo"));

		$idTema = $this->security->xss_clean($this->input->post("idTema"));
		$idArea = $this->security->xss_clean($this->input->post("idArea"));
		$idDivision = $this->security->xss_clean($this->input->post("idDivision"));
		$idEspecialidad = $this->security->xss_clean($this->input->post("idEspecialidad"));

		$todas = $this->security->xss_clean($this->input->post("todas"));
		$ids="";
		switch ($tipo) {
			case 'areas':
				$ids = $this->model->getIdsAreas($idDivision,$idEspecialidad,$todas);
				break;
			case 'temas':
				$ids = $this->model->getIdsTemas($idArea,$idDivision,$idEspecialidad,$todas);
				break;
			//Nuevos filtros para la edición de preguntas.
			case 'casos':
				$ids = $this->model->getIdsCasos($idTema); //Solo usamos ID_TEMA
				break;
		}
		echo json_encode($ids);
	}

	public function getTabla(){
		$this->acceso();
		$tipo=$this->security->xss_clean($this->input->post("tipo"));
		$estatus_casos = $this->security->xss_clean($this->input->post("estatus"));
		$id_tema = $this->security->xss_clean($this->input->post("tema"));
		$id_area = $this->security->xss_clean($this->input->post("area"));
		$id_division = $this->security->xss_clean($this->input->post("division"));
		$id_especialidad = $this->security->xss_clean($this->input->post("especialidad"));
		$vista = "";

		$pagina_casos = $this->security->xss_clean($this->input->post("pagina_casos"));
		$pagina_preguntas = $this->security->xss_clean($this->input->post("pagina_preguntas"));

		$estatus = $this->security->xss_clean($this->input->post("nfEstatus"));
		$accion = $this->security->xss_clean($this->input->post("nfAccion"));

		switch ($tipo) {
			case 'casos': 
				$casos = $this->model->getCasos($estatus_casos,$id_tema,$id_area,$id_division,$id_especialidad);
				$vista = $this->load->view("casos_clinicos/casos/tabla_casos",array("casos"=>$casos,"pagina"=>($pagina_casos*100)),TRUE);
				break;
			case 'preguntas': 
				$preguntas = $this->model->getPreguntas2($id_tema,$id_area,$id_division,$id_especialidad,$estatus,$accion);
				$vista = $this->load->view("casos_clinicos/preguntas/tabla_preguntas",array("preguntas"=>$preguntas,"pagina"=>($pagina_preguntas*100)),TRUE);
				break;
		}
		echo json_encode($vista);
	}

	public function addCaso(){
		$this->acceso();
		$form=array(
			"id_tema"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Tema requerido.","required"=>"Tema requerido.","is_natural_no_zero"=>"Tema requerido.")),
			"caso_clinico"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Caso clínico requerido.","required"=>"Caso clínico requerido.")),
			"examen_banco"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Estatus rquerido.","required"=>"Estatus requerido."))
			);
		
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("add_casos_$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"add_casos_$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("add_casos_$key"));
			}
		}

		if(empty($_FILES['add_casos_file']['name'])){
			/*
			$this->form_validation->set_rules("add_casos_file","add_casos_file",'required',array('required'=>'Agregue una imagen.'));
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"add_casos_file"));exit(0);
			}
			*/
			$only_data = TRUE;
		}else{
			if(isset($_FILES['add_casos_file']) && $_FILES['add_casos_file']['error']==0){
				$only_data = FALSE;
	           	$allowed=array('png','jpg','jpeg');
	            $extension=pathinfo($_FILES['add_casos_file']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){
	            	$archivo="files/cc/temp/".$_FILES['add_casos_file']['name'];
		            if(move_uploaded_file($_FILES['add_casos_file']['tmp_name'],$archivo)){
		            	$add = $this->model->addCaso($data);
		            	if($add){
		            		$nombre = $add."_".date("YmdHis");
		            		$nuevo="files/cc/".$nombre.".".$extension;
		                	copy($archivo,$nuevo);
		                	unlink($archivo);
		                	$this->model->updCaso($add,array("imagen_url"=>$nuevo,"imagen_nombre"=>$nombre));
		                	echo json_encode(array('estatus'=>TRUE,'msg'=>'Registro agregado.'));
		            	}else{
		            		unlink($archvio);
		            		echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al registrar el archvio","input"=>""));
		            	}
		            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al copiar el archivo.'));}
	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}
		}

		if( $only_data )
		{
			$add = $this->model->addCaso($data);
			if( $add )
			{
				echo json_encode(array('estatus'=>TRUE,'msg'=>'Registro agregado.'));
			}
			else
			{
				echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al crear el registro.'));
			}
		}
	}

	public function updCaso(){
		$this->acceso();
		$form=array(
			"id_tema"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Tema requerido.","required"=>"Tema requerido.","is_natural_no_zero"=>"Tema requerido.")),
			"caso_clinico"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Caso clínico requerido.","required"=>"Caso clínico requerido.")),
			"examen_banco"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Estatus rquerido.","required"=>"Estatus requerido.")),
			"modificacion"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Indique la modificación que realizó.","required"=>"Indique la modificación que realizó."))
			);
		
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("upd_casos_$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"upd_casos_$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("upd_casos_$key"));
			}
		}

		//Acción.
		$accion = "POR_REVISAR";
		$accion_comentario = "";
		$examen_banco = $data["examen_banco"];
		if( $examen_banco == "EXAMEN" ){
			$accion = $this->security->xss_clean($this->input->post("accion_examen"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_EXAMEN"));
		}

		if( $examen_banco == "BANCO" ){
			$accion = $this->security->xss_clean($this->input->post("accion_banco"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_BANCO"));
		}

		if( $examen_banco == "PILOTO" ){
			$accion = $this->security->xss_clean($this->input->post("accion_piloto"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_PILOTO"));
		}
		if( $examen_banco == "PILOTO_2020" ){
			$accion = $this->security->xss_clean($this->input->post("accion_piloto_2020"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_PILOTO_2020"));
		}

		if( $examen_banco == "RESERVA" ){
			$accion = $this->security->xss_clean($this->input->post("accion_reserva"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_RESERVA"));
		}

		if( $examen_banco == "BANCO_REVISION" ){
			$accion = $this->security->xss_clean($this->input->post("accion_banco_revision"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_BANCO_REVISION"));
		}

		if( $examen_banco == "EXAMEN_2020" ){
			$accion = $this->security->xss_clean($this->input->post("accion_examen_2020"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_EXAMEN_2020"));
		}

		if( $examen_banco == "EXAMEN_2019" ){
			$accion = $this->security->xss_clean($this->input->post("accion_examen_2019"));
			$accion_comentario = $this->security->xss_clean($this->input->post("accion_comentario_EXAMEN_2019"));
		}



		$data['examen_banco']=$examen_banco;
		$data['accion']=$accion;
		$data['accion_comentario']=$accion_comentario;

		$id_caso = $this->security->xss_clean($this->input->post("upd_casos_id_caso_clinico"));

		if(!empty($_FILES['upd_casos_file']['name'])){
			
			if(isset($_FILES['upd_casos_file']) && $_FILES['upd_casos_file']['error']==0){
	           	$allowed=array('png','jpg','jpeg');
	            $extension=pathinfo($_FILES['upd_casos_file']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){
	            	$archivo="files/cc/temp/".$_FILES['upd_casos_file']['name'];
		            if(move_uploaded_file($_FILES['upd_casos_file']['tmp_name'],$archivo)){

		            	$add = $this->security->xss_clean($this->input->post("upd_casos_imagen_nombre"));
		            	$nombre = $add."_".date("YmdHis");
		            	$nuevo="files/cc/".$nombre.".".$extension;
		                	
		                copy($archivo,$nuevo);
		                unlink($archivo);

		                $n = $this->security->xss_clean($this->input->post("upd_casos_imagen"));
		                if( file_exists($n) && $n != 'files/cc/pregunta.png' ){
		                	unlink($n);
		                }
		                
		                $data["imagen_url"]=$nuevo;
		                $data["imagen_nombre"]=$nombre;
		                $this->model->updCaso($id_caso,$data);

		                echo json_encode(array('estatus'=>TRUE,'msg'=>'Registro editado.'));
		            	


		            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al copiar el archivo.'));}
	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}

		}else{
			
			$upd = $this->model->updCaso($id_caso,$data);
			if($upd){
				echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro editado."));
			}else{
				echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo editar el registro."));
			}
		}
	}

	public function delRow(){
		$this->acceso();
		$id = $this->security->xss_clean($this->input->post("id"));
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$del = FALSE;
		switch($tipo){
			case 'casos':
				$del = $this->model->delCaso($id);
				break;
		}
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro eliminado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo quitar el registro."));
		}
	}

	public function getRow(){
		$this->acceso();
		$id = $this->security->xss_clean($this->input->post("id"));
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$info = array();
		switch ($tipo) {
			case 'casos':
				$info = $this->model->getCasoClinico($id);
				break;
		}
		echo json_encode($info);
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}

	public function getPreguntas(){
		$id_caso=$this->security->xss_clean($this->input->post("id"));
		$preguntas = $this->model->getPreguntas($id_caso);
		$pagina_preguntas = $this->security->xss_clean($this->input->post("pagina_preguntas"));
		$tabla = $this->load->view("casos_clinicos/casos/tabla_preguntas",array("preguntas"=>$preguntas,"pagina"=>($pagina_preguntas*100)),TRUE);
		echo json_encode($tabla);
	}
}