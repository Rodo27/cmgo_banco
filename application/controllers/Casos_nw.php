<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos_nw extends CI_Controller {

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
				"sbmenu"=>"cc_preguntas_nw",
				"contenido"=>$this->load->view("casos_clinicos/casos/casos",array(
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
		$vista = $this->load->view("casos_clinicos/casos/tabla_casos.php",array("preguntas"=>$preguntas),TRUE);
		
		echo json_encode($vista);
	}

}