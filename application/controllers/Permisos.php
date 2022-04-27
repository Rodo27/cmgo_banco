<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Permisos extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Permisos_model','model');
    }

	public function index(){
		$this->acceso();
		$usuarios = $this->model->getUsuarios();
		$especialidades = $this->model->getEspecialidades();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"permisos",
				"contenido"=>$this->load->view("permisos/permisos",array(
					"title"=>"DATOS OPERATIVOS -> PERMISOS",
					"usuarios"=>$usuarios,
					"especialidades"=>$especialidades			
					),true),
				"script"=>$this->load->view("permisos/permisos.js.php",array(),true)
			)
		);
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}

	public function addUser(){
		$form=array(
			"usuario"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Usuario requerido.","required"=>"Usuario requerido.")),
			"correo"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Correo requerido.","required"=>"Correo requerido.")),
			"cc"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una especialidad.","required"=>"Seleccione una especialidad.","is_natural_no_zero"=>"Seleccione una especialidad.")),
			"rol"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Rol requerido.","required"=>"Rol requerido."))
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
		$data["cg"]=$data["cc"];
		$add = $this->model->addUser($data);
		if($add){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"add_usuario"));exit(0);
		}
	}

	public function updUser(){
		$form=array(
			"usuario"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Usuario requerido.","required"=>"Usuario requerido.")),
			"correo"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Correo requerido.","required"=>"Correo requerido.")),
			"cc"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una especialidad.","required"=>"Seleccione una especialidad.","is_natural_no_zero"=>"Seleccione una especialidad.")),
			"rol"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Rol requerido.","required"=>"Rol requerido."))
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
		$data["cg"]=$data["cc"];
		$id_usuario=$this->security->xss_clean($this->input->post("upd_id_usuario"));
		$add = $this->model->updUser($id_usuario,$data);
		if($add){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"add_usuario"));exit(0);
		}
	}

	public function getRow(){
		$id_usuario=$this->security->xss_clean($this->input->post("id"));
		$user = $this->model->getUser($id_usuario);
		echo json_encode($user);
	}

	public function delRow(){
		$id_usuario=$this->security->xss_clean($this->input->post("id"));
		$del = $this->model->delUser($id_usuario);
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>""));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al quitar el registro."));exit(0);
		}
	}
}