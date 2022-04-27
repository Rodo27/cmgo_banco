<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocimientos_generales_nw extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Conocimientos_generales_model','model');
        $this->load->model('Conocimientos_generales_model_nw', 'nuevo_model');
        //$this->load->library('bcrypt');
    }

    public function index()
	{	
		//$this->acceso();
		$id_especialidad = $this->session->cg;
		$especialidad = $this->model->getEspecialidad($id_especialidad);
		//$divisiones = $this->model->getIdsDivisiones($id_especialidad,"SI");
		
		//$preguntas_piloto = $this->model->get_preguntas_piloto();
		//$preguntas_examen = $this->model->get_preguntas_examen();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"conocimientos_generales",
				"sbmenu"=>"cg_preguntas_nw",
				"contenido"=>$this->load->view("conocimientos_generales/conocimientos_generales_nw",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					//"divisiones"=>$divisiones,
					//"piloto"=>$preguntas_piloto,
					//"examen"=>$preguntas_examen
					),true),
				"script"=>$this->load->view("conocimientos_generales/preguntas/conocimientos_generales_nw.js.php",array("id_especialidad"=>$id_especialidad),true),
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
		$vista = $this->load->view("conocimientos_generales/tabla_preguntas_nw",array("preguntas"=>$preguntas),TRUE);
        
		if(!empty($preguntas)){
            echo json_encode($vista);
        }
        else{
            echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        }
    }

	public function getTablaPregunta(){
		$id_tema = $_GET['id_tema'];
		
		$preguntas = $this->nuevo_model->getTablaPregunta($id_tema);
		$vista = $this->load->view("conocimientos_generales/tabla_preguntas_nw",array("preguntas"=>$preguntas),TRUE);
        
		if(!empty($preguntas)){
            echo json_encode($vista);
        }
        else{
            echo json_encode('<h1 style="text-align: center;">No hay resultados</h1>');
        }
	}

	public function getPuntosClave(){
		$id_tema = $_GET['id_tema'];
		$puntos_clave = $this->nuevo_model->getPuntosClave($id_tema);
		//$vista = $this->load->view("conocimientos_generales/tabla_puntos_clave",array("puntos_clave"=>$puntos_clave),TRUE);
        echo json_encode($puntos_clave);
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

	public function getBiblios(){
		$biblios = $this->nuevo_model->getBiblios();
		echo json_encode($biblios);
	}

	public function registroPreguntaCG(){
		$datos = array(
			"id_division" => $this->input->get('id_division'),
			"id_area" => $this->input->get('id_area'),
			"id_tema" => $this->input->get('id_tema'),
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
		//var_dump($datos);
		$respuesta = $this->nuevo_model->registroPreguntaCG($datos);
		echo json_encode($respuesta);
	}

	public function getIdPreguntaCG(){
		$id_pregunta = $_GET['id_pregunta'];
	
		$contenido_pregunta = $this->nuevo_model->getIdPreguntaCG($id_pregunta);

		echo json_encode($contenido_pregunta);
	}

	public function actualizarPregunta(){

		$datos = array(
			"id_pregunta" => $this->input->get('id_pregunta_e'),
			"id_division" => $this->input->get('id_division_e'),
			"id_area" => $this->input->get('id_area_e'),
			"id_tema" => $this->input->get('id_tema_e'),
			"id_complejidad_cognitiva" => $this->input->get('upd_preguntas_id_complejidad_cognitiva_e'),
			"id_periodo_vida" => $this->input->get('upd_preguntas_id_periodo_vida_e'),
			"id_estatus" => $this->input->get('id_estatus_e'),
			"id_accion" => $this->input->get('id_accion_e'),
			"pregunta" => $this->input->get('upd_preguntas_pregunta_e'),
			"opcion_a" => $this->input->get('upd_preguntas_opcion_a_e'),
			"opcion_b" => $this->input->get('upd_preguntas_opcion_b_e'),
			"opcion_c" => $this->input->get('upd_preguntas_opcion_c_e'),
			"opcion_d" => $this->input->get('upd_preguntas_opcion_d_e'),
			"opcion_e" => $this->input->get('upd_preguntas_opcion_e_e'),
			"respuesta" => $this->input->get('upd_preguntas_respuesta_e'),
			"id_bibliografia" => $this->input->get('upd_preguntas_id_bibliografia_e'),
			"capitulo" => $this->input->get('upd_preguntas_capitulo_e'),
			"puntos_clave" => $this->input->get('puntos_clave_e')
		);

		$resultado = $this->nuevo_model->actualizarPregunta($datos);

		echo json_encode($resultado);

	}

	public function getPuntosChecked(){
		$id_pregunta = $_GET['id_pregunta'];

		$puntos_clave = $this->nuevo_model->getPuntosChecked($id_pregunta);
		
        echo json_encode($puntos_clave);
	}

	public function eliminarPuntoClave(){
		$id_pregunta = $_GET['id_pregunta'];
		$id_punto_clave = $_GET['punto_clave'];
		$punto_clave_eliminado = $this->nuevo_model->eliminarPuntoClave($id_pregunta,$id_punto_clave);
        echo json_encode($punto_clave_eliminado);
	}

	public function guardarListaDeCotejo(){
		$rubricas = $_GET['rubricas'];
		$id_pregunta = $_GET['id_pregunta'];
		$guardado = $this->nuevo_model->guardarListaDeCotejo($rubricas, $id_pregunta);
		echo json_encode($guardado);
	}

	public function getCotejoChecked(){
		$id_pregunta = $_GET['id_pregunta'];

		$seleccionados = $this->nuevo_model->getCotejoChecked($id_pregunta);
		
        echo json_encode($seleccionados);
	}

	public function getPreguntaAprobada(){

		$id_pregunta = $_GET['id_pregunta'];

		$pregunta_aprovada = $this->nuevo_model->getPreguntaAprobada($id_pregunta);

		echo json_encode($pregunta_aprovada);
	}
	
}