<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos_c_new extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Casos_model','model');
		$this->load->model('Casos_model_nw','nuevo_model');
        //$this->load->library('bcrypt');
    }

	public function index(){

		$id_especialidad = $this->session->cg;
		$especialidad = $this->model->getEspecialidad($id_especialidad);

    	$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"casos_clinicos",
				"sbmenu"=>"cc_casos_new",
				"contenido"=>$this->load->view("casos_clinicos/casos/casos_c_new",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					),true),
                "script"=>$this->load->view("casos_clinicos/casos/casos_c_nw.js.php",array("id_especialidad"=>$id_especialidad),true),
                )
			);
    }

    public function getTabla(){

		//var_dump($_GET);

		$id_division = null;
		$id_area = null;
		$id_tema = null;
		$id_estatus = null;
		$id_accion = null;

		$casos = $this->nuevo_model->getTabla($id_division, $id_area, $id_tema, $id_estatus, $id_accion);
		//var_dump($casos);

		
		$vista = $this->load->view("casos_clinicos/casos/tabla_casos.php",array("casos"=>$casos),TRUE);
        if(!empty($casos)){
            echo json_encode($vista);
        } 
        //else{
        //    echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        //}

		/*
		if(isset($_GET['id_division'])){
			$id_division = $_GET['id_division'];
		}
		else{
			$id_division = null;
		}
		if(isset($_GET['id_area'])){
			$id_area = $_GET['id_area'];
		}
		else{
			$id_area = null;
		}
		if(isset($_GET['id_tema'])){
			$id_tema = $_GET['id_tema'];
		}
		else{
			$id_tema = null;
		}
		if(isset($_GET['id_estatus'])){
			$id_estatus = $_GET['id_estatus'];
		}
		else{
			$id_estatus = null;
		}
		if(isset($_GET['id_accion'])){
			$id_accion = $_GET['id_accion'];
		}
		else{
			$id_accion = null;
		}*/
		
		//$casos = $this->nuevo_model->getTabla($id_division, $id_area, $id_tema, $id_estatus, $id_accion);
		#// var_dump($casos);
		//$vista = $this->load->view("casos_clinicos/casos/tabla_casos.php",array("casos"=>$casos),TRUE);
        //if(!empty($casos)){
        //    echo json_encode($vista);
        //}
        //else{
        //    echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        //}
	}

	/*
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
	}*/






	public function numPregCasos(){
		$id_caso = $_GET['id_caso'];
		$num = $this->nuevo_model->numPregCasos($id_caso);

		echo json_encode($num);
	}

	public function registroCaso(){

		$datos = array(
			'id_division' => $this->input->get('id_division'),
			'id_area' => $this->input->get('id_area'),
			'id_tema' => $this->input->get('id_tema'),
			'id_estatus' => $this->input->get('id_estatus'),
			'id_accion' => $this->input->get('id_accion'),
			'add_casos_caso_clinico' => $this->input->get('add_casos_caso_clinico'),
			'posicionesImg' => $this->input->get('imagenesPos')
		);
		
		$respuesta = $this->nuevo_model->registroCaso($datos);
		echo json_encode($respuesta);

		
	}

	public function eliminarCasoClinico(){
		$id_caso = $_GET['id_caso'];

		$respuesta = $this->nuevo_model->eliminarCasoClinico($id_caso);

		echo json_encode($respuesta);
	}

	public function getCaso(){

		$id_caso = $_GET['id_caso'];

		$respuesta = $this->nuevo_model->getCaso($id_caso);

		echo json_encode($respuesta);

	}

	public function preguntasCaso(){
		$id_caso = $_GET['id_caso'];

		$preguntas = $this->nuevo_model->preguntasCaso($id_caso);

		//var_dump($preguntas);

		$vista = $this->load->view("casos_clinicos/casos/sub_tabla_preg.php",array("preguntas"=>$preguntas),TRUE);

		if(!empty($preguntas)){
            echo json_encode($vista);
        }
        else{
            echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        }
	}

	public function editarCaso(){
		$casoEditado = array(
			'modificacion' => $this->input->get('upd_casos_modificacion'),
			'id_estatus' => $this->input->get('id_estatus_e'),
			'id_accion' => $this->input->get('id_accion_e'),
			'caso_clinico' => $this->input->get('caso_clinico'),
			'id_caso' => $this->input->get('e_id_caso_clinico'),
			'id_tema' => $this->input->get('id_tema_e'),
		);

		$respuesta = $this->nuevo_model->editarCaso($casoEditado);

		echo json_encode($respuesta);

	}

	public function agregar_imagenes_caso_temporal(){

		$contador = $_POST['contador'];

		$nombre_imagen = $this->session->unicoCC.$contador;
    	
    	if (isset($contador)) {
    		
	        $config['upload_path'] = './img/casos_clinicos/'.$this->session->cg.'/';
	        $config['overwrite'] = TRUE;
	        $config['allowed_types'] = 'png|jpeg|jpg|mp4|MOV';
	        $config['file_name'] = $nombre_imagen;
	        $config['max_size'] = '102400';
	        // $config['max_width']  = '1024';
	        // $config['max_height']  = '768';
	        $this->load->library('upload', $config);
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

	            $resultado=array('estatus' =>FALSE ,'errores'=> $errors, 'especialidad'=> $this->session->cg );
	            echo json_encode($resultado);
	        }else{ 
	            $resultado=array('estatus' =>TRUE, 'especialidad'=> $this->session->cg);
	            echo json_encode($resultado);
				//unlink('./img/casos_clinicos/2/'.$nombre_imagen.'.jpg'); Borra imagen con el nombre
				//rename('./img/casos_clinicos/2/'.$nombre_imagen.'.jpg', './img/casos_clinicos/2/'.$nombre_imagen.'nuevo.jpg'); //RENOMBRA LOS ARCHIVOS OLD_NAME, NEW_NAME
	        }
    		
    	}else{
    		echo FALSE;
    	}
        
    }

	public function eliminar_imagenes_caso_temporal(){

		$posicion = $_POST['pos'];

		$nombre_imagen = $this->session->unicoCC.$posicion;
    	
    	if (isset($posicion)) {
    		
	            $resultado=array('estatus' =>TRUE, 'especialidad'=> $this->session->cg);
	            echo json_encode($resultado);
				unlink('./img/casos_clinicos/'.$this->session->cg.'/'.$nombre_imagen.'.jpg'); //Borra imagen con el nombre
				//rename('./img/casos_clinicos/2/'.$nombre_imagen.'.jpg', './img/casos_clinicos/2/'.$nombre_imagen.'nuevo.jpg'); //RENOMBRA LOS ARCHIVOS OLD_NAME, NEW_NAME      		
    	}else{
    		echo FALSE;
    	}
        
    }

	public function cambiar_imagenes_caso_temporal(){

		$nombre_imagen =$_POST['nombre_imagen'];

        $config['upload_path'] = './img/casos_clinicos/'.$this->session->cg.'/';
        $config['overwrite'] = TRUE;
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $nombre_imagen;
        $config['max_size'] = '3072';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $this->load->library('upload');
        $this->upload->initialize($config);
        $image="cambiar_img_caso".$_POST['pos'];
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
            $resultado=array('estatus' =>TRUE, 'especialidad' => $this->session->cg);
            echo json_encode($resultado);
            // echo 'EXITOSO';
        }
	}
}