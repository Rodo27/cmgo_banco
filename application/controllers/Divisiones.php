<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Divisiones extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Divisiones_model','model');
    }

	public function index(){
		$especialidades = $this->model->getEspecialidades();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"divisiones",
				"contenido"=>$this->load->view("divisiones/divisiones",array(
					"title"=>"DATOS OPERATIVOS -> DIVISIONES",
					"especialidades"=>$especialidades			
					),true),
				"script"=>$this->load->view("divisiones/divisiones.js.php",array(),true)
			)
		);
	}

	public function getTabla(){
		$id_especialidad = $this->security->xss_clean($this->input->post("especialidad"));
		$divisiones = $this->model->getDivisiones($id_especialidad);
		$vista = $this->load->view("divisiones/tabla_divisiones",array("divisiones"=>$divisiones),true);
		echo json_encode($vista);
	}

	public function addDivision(){
		$form=array(
			"id_especialidad"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una especialidad.","required"=>"Seleccione una especialidad.","is_natural_no_zero"=>"Seleccione una especialidad.")),
			"division"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Escribe el nombre de la división.","required"=>"Escribe el nombre de la división."))
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
		$add = $this->model->addDivision($data);
		if($add){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"add_division"));exit(0);
		}
	}

	public function getRow(){
		$id = $this->security->xss_clean($this->input->post("id"));
		$info = array();
		$info = $this->model->getDivision($id);
		echo json_encode($info);
	}

	public function updDivision(){
		$form=array(
			"id_especialidad"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una especialidad.","required"=>"Seleccione una especialidad.","is_natural_no_zero"=>"Seleccione una especialidad.")),
			"division"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Escribe el nombre de la división.","required"=>"Escribe el nombre de la división."))
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
		$id_division = $this->security->xss_clean($this->input->post("upd_id_division"));
		$upd = $this->model->updDivision($id_division,$data);
		if($upd){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"upd_division"));exit(0);
		}
	}

	public function delRow(){
		$id = $this->security->xss_clean($this->input->post("id"));
		$del = $this->model->delDivision($id);
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>""));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo eliminar el registro.","input"=>"upd_division"));exit(0);
		}
	}
}