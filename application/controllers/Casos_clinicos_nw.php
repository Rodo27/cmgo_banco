<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos_clinicos_nw extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Casos_clinicos_model','model');
		$this->load->model('Casos_clinicos_model_nw','nuevo_model');
		$this->load->model('Casos_model','model_caso');
        //$this->load->library('bcrypt');
    }

	public function index(){

		$id_especialidad = $this->session->cg;
		$especialidad = $this->model->getEspecialidad($id_especialidad);

    	$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"casos_clinicos",
				"sbmenu"=>"cc_preguntas_nw",
				"contenido"=>$this->load->view("casos_clinicos/casos/casos_nw",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					),true),
				"script"=>$this->load->view("casos_clinicos/casos/casos_new.js.php",array("id_especialidad"=>$id_especialidad),true),
				)
			);
    }


	public function getTabla(){
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
		}
		$preguntas = $this->nuevo_model->getTabla($id_division, $id_area, $id_tema, $id_estatus, $id_accion);
		$vista = $this->load->view("casos_clinicos/casos/tabla_preguntas_nw.php",array("preguntas"=>$preguntas),TRUE);
		
		if(!empty($preguntas)){
            echo json_encode($vista);
			//echo json_encode($preguntas);
        }
        else{
            echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        }
	}

	public function getPuntosClave(){
		$id_tema = $_GET['id_tema'];
		$id_caso = $_GET['id_caso'];
		$id_pregunta = $_GET['id_pregunta'];

		$puntos_clave = $this->nuevo_model->getPuntosClave($id_tema, $id_caso, $id_pregunta);
		
        echo json_encode($puntos_clave);
	}

	public function getPuntosChecked(){

		$id_caso = $_GET['id_caso'];
		$id_pregunta = $_GET['id_pregunta'];

		$checked = $this->nuevo_model->getPuntosChecked($id_caso, $id_pregunta);
		
        echo json_encode($checked);

	}

    public function getDivisiones(){
        $divisiones = $this->nuevo_model->getDivisiones();
        echo json_encode($divisiones);
    }

    public function getAreas(){
        $areas = $this->nuevo_model->getAreas();
        echo json_encode($areas);
    }

    public function getTemas(){
		$id_area = $this->input->get('id_area');
        $temas = $this->nuevo_model->getTemas($id_area);
        echo json_encode($temas);
    }

	public function getCognitivas(){
        $cognitivas = $this->nuevo_model->getCognitivas();
        echo json_encode($cognitivas);
    }

	public function getPeriodos(){
		$periodos = $this->nuevo_model->getPeriodos();
		echo json_encode($periodos);
	}

	public function getEstatus(){
		$estatus = $this->nuevo_model->getEstatus();
		echo json_encode($estatus);
	}

	public function getAcciones(){
		$acciones = $this->nuevo_model->getAcciones();
		echo json_encode($acciones);
	}

	public function getCasos(){

		$id_tema = $_GET['id_tema'];
	
		$contenido_caso = $this->nuevo_model->getCasos($id_tema);

		echo json_encode($contenido_caso);

	}

	public function getCasoClinico(){
		$id_caso = $_GET['id_caso'];
		$id_pregunta = $_GET['id_pregunta'];
	
		$contenido_caso = $this->nuevo_model->getCasoClinico($id_caso, $id_pregunta);

		echo json_encode($contenido_caso);
	}

	public function getImages(){
		$id_caso = $_GET['id_caso'];
		$imagenes = $this->model_caso->cargar_imagenes_caso($id_caso);
		echo json_encode($imagenes);
	}

	public function registroPreguntaCC(){

		$datos = array(
			"id_caso" => $this->input->get('id_caso'),
			"id_division" => $this->input->get('id_division'),
			"id_area" => $this->input->get('id_area'),
			"id_tema" => $this->input->get('id_tema'),
			"id_complejidad_cognitiva" => $this->input->get('id_complejidad_cognitiva'),
			"id_periodo_vida" => $this->input->get('upd_preguntas_id_periodo_vida'),
			"id_estatus" => $this->input->get('id_estatus'),
			"id_accion" => $this->input->get('id_accion'),
			"pregunta" => $this->input->get('upd_preguntas_pregunta'),
			"opcion_a" => $this->input->get('upd_preguntas_opcion_a'),
			"opcion_b" => $this->input->get('upd_preguntas_opcion_b'),
			"opcion_c" => $this->input->get('upd_preguntas_opcion_c'),
			"opcion_d" => $this->input->get('upd_preguntas_opcion_d'),
			"opcion_e" => $this->input->get('upd_preguntas_opcion_e'),
			"respuesta" => $this->input->get('upd_preguntas_respuesta'),
			"id_bibliografia" => $this->input->get('upd_preguntas_id_bibliografia'),
			"capitulo" => $this->input->get('upd_preguntas_capitulo'),
			"puntos_clave" => $this->input->get('puntos_clave'),
			'posicionesImg' => $this->input->get('imagenesPos')
		);
		$respuesta = $this->nuevo_model->registroPreguntaCC($datos);
		echo json_encode($respuesta);

	}

	public function getCasoClinicoAprobado(){
		$id_caso = $_GET['id_caso'];

		$caso_aprovado = $this->nuevo_model->getCasoClinicoAprobado($id_caso);

		echo json_encode($caso_aprovado);
	}

	public function eliminarCasoClinico(){

		$id_caso = $_GET['id_caso'];
		$id_pregunta = $_GET['id_pregunta'];

		$eliminado = $this->nuevo_model->eliminarCasoClinico($id_caso, $id_pregunta);

		echo json_encode($eliminado);

	}

	public function editarPreguntaCC(){
		$datos = array(
			"id_caso" => $this->input->get('id_caso'),
			"id_pregunta" => $this->input->get('id_pregunta'),
			"id_division" => $this->input->get('id_division'),
			"id_area" => $this->input->get('id_area'),
			"id_tema" => $this->input->get('idTemaIn'),
			"id_complejidad_cognitiva" => $this->input->get('upd_preguntas_id_complejidad_cognitiva'),
			"id_periodo_vida" => $this->input->get('upd_preguntas_id_periodo_vida'),
			"id_estatus" => $this->input->get('id_estatus'),
			"id_accion" => $this->input->get('id_accion'),
			"pregunta" => $this->input->get('upd_preguntas_pregunta'),
			"opcion_a" => $this->input->get('upd_preguntas_opcion_a'),
			"opcion_b" => $this->input->get('upd_preguntas_opcion_b'),
			"opcion_c" => $this->input->get('upd_preguntas_opcion_c'),
			"opcion_d" => $this->input->get('upd_preguntas_opcion_d'),
			"opcion_e" => $this->input->get('upd_preguntas_opcion_e'),
			"respuesta" => $this->input->get('upd_preguntas_respuesta'),
			"id_bibliografia" => $this->input->get('upd_preguntas_id_bibliografia'),
			"capitulo" => $this->input->get('upd_preguntas_capitulo'),
			"puntos_clave" => $this->input->get('puntos_clave')
		);

		$respuesta = $this->nuevo_model->editarPreguntaCC($datos);
		echo json_encode($respuesta);
	}

	public function agregar_imagenes_pregunta_temporal(){

		$contador = $_POST['contador'];

		$nombre_imagen =$this->session->unicoCC.$contador;
    	
    	if (isset($contador)) {
    		
	        $config['upload_path'] = './img/casos_clinicos/'.$this->session->cg.'/';
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

	public function eliminar_imagenes_pregunta_temporal(){

		$posicion = $_POST['pos'];

		$nombre_imagen =$this->session->unicoCC.$posicion;
    	
    	if (isset($posicion)) {
    		
	            $resultado=array('estatus' =>TRUE, 'especialidad'=> $this->session->cg);
	            echo json_encode($resultado);
				unlink('./img/casos_clinicos/'.$this->session->cg.'/'.$nombre_imagen.'.jpg'); //Borra imagen con el nombre
				//rename('./img/casos_clinicos/2/'.$nombre_imagen.'.jpg', './img/casos_clinicos/2/'.$nombre_imagen.'nuevo.jpg'); //RENOMBRA LOS ARCHIVOS OLD_NAME, NEW_NAME      		
    	}else{
    		echo FALSE;
    	}
        
    }

	public function cambiar_imagenes_pregunta_temporal(){

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
        $image="cambiar_img_pregunta".$_POST['pos'];
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

	public function iniciarTempImg(){

		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;
		for($i=0;$i < 6 ;$i++) $key .= $pattern{mt_rand(0,$max)};

		$datos['id_user'] = $this->session->id;
		
		$datos['hash'] = $key;

		if(isset($this->session->unicoCC)){
			$oldFiles = glob('./img/casos_clinicos/'.$this->session->cg.'/'.$this->session->unicoCC.'*.jpg');

			foreach($oldFiles as $file){
				if(is_file($file))
				unlink($file); //elimino el fichero
			}
		}

		$this->session->unset_userdata('unicoCC');
		$this->session->set_userdata('unicoCC',$datos['id_user'].$datos['hash']);
	}

	public function obtenerUnico(){
		echo json_encode($this->session->unicoCC);
	}


}