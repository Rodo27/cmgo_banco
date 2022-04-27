<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Especialidades_model','model');
    }

	public function index(){
		$especialidades = $this->model->getEspecialidades();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"especialidades",
				"contenido"=>$this->load->view("especialidades/especialidades",array(
					"title"=>"DATOS OPERATIVOS -> ESPECIALIDADES",
					"tabla"=>$this->load->view("especialidades/tabla_especialidades",array("especialidades"=>$especialidades),true),
					),true),
				"script"=>$this->load->view("especialidades/especialidades.js.php",array(),true)
			)
		);
	}
}