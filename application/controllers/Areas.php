<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Areas extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Areas_model','model');
    }

	public function index(){
		$this->acceso();
		$especialidades = $this->model->getEspecialidades();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"areas",
				"contenido"=>$this->load->view("areas/areas",array(
					"title"=>"DATOS OPERATIVOS -> ÁREAS",
					"especialidades"=>$especialidades			
					),true),
				"script"=>$this->load->view("areas/areas.js.php",array(),true)
			)
		);
	}

	public function getCombo(){
		$id_especialidad = $this->security->xss_clean($this->input->post("especialidad"));
		$todas = $this->security->xss_clean($this->input->post("todas"));
		$divisiones = $this->model->getDivisiones($id_especialidad,$todas);
		echo json_encode($divisiones);
	}

	public function getTabla(){
		$id_especialidad = $this->security->xss_clean($this->input->post("especialidad"));
		$id_division = $this->security->xss_clean($this->input->post("division"));
		$areas = $this->model->getAreas($id_division,$id_especialidad);
		$vista = $this->load->view("areas/tabla_areas",array("areas"=>$areas),true);
		echo json_encode($vista);
	}

	public function addArea(){
		$form=array(
			"id_division"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una división.","required"=>"Seleccione una división.","is_natural_no_zero"=>"Seleccione una division.")),
			"area"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Área requerida.","required"=>"Área requerida."))
			);
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("add_$key","add_$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"add_$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("add_$key"));
			}
		}
		$add = $this->model->addArea($data);
		if($add){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"add_division"));exit(0);
		}
	}

	public function getRow(){
		$id = $this->security->xss_clean($this->input->post("id"));
		$info = array();
		$info = $this->model->getArea($id);
		echo json_encode($info);
	}

	public function updArea(){
		$form=array(
			"id_division"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una division.","required"=>"Seleccione una division.","is_natural_no_zero"=>"Seleccione una division.")),
			"area"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Área requerida.","required"=>"Área requerida."))
			);
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("upd_$key","upd_$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"upd_$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("upd_$key"));
			}
		}
		$id_area = $this->security->xss_clean($this->input->post("upd_id_area"));
		$upd = $this->model->updArea($id_area,$data);
		if($upd){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"upd_division"));exit(0);
		}
	}

	public function delRow(){
		$id = $this->security->xss_clean($this->input->post("id"));
		$del = $this->model->delArea($id);
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>""));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo eliminar el registro.","input"=>"upd_division"));exit(0);
		}
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}
}