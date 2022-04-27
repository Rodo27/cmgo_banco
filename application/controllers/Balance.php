<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Balance_model','model');
    }

	public function index(){
		$this->acceso();
		$especialidades = $this->model->getEspecialidades();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"balance",
				"contenido"=>$this->load->view("balance/balance",array(
					"title"=>"DATOS OPERATIVOS -> BALANCE",
					"especialidades"=>$especialidades			
					),true),
				"script"=>$this->load->view("balance/balance.js.php",array(),true)
			)
		);
	}

	public function getTabla(){
		$this->acceso();
		$especialidad = $this->security->xss_clean($this->input->post("especialidad"));
		$tipo_examen = $this->security->xss_clean($this->input->post("tipo_examen"));
		$tb="gyo";
		switch ($especialidad) {
			case 2:
				$tb="gyo";
				break;
			case 3:
				$tb="brh";
				break;
			case 4:
				$tb="mmf";
				break;
			case 5:
				$tb="uro";
				break;
		}
		$preguntas = $this->model->getPreguntas($especialidad,$tipo_examen,$tb);
		$tabla = $this->load->view("balance/tabla",array("preguntas"=>$preguntas),true);
		echo json_encode($tabla);
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}
}