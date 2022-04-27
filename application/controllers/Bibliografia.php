<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bibliografia extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Bibliografia_model','model');
    }

	public function index()
	{	
		$this->acceso();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"bibliografia",
				"sbmenu"=>"bibliografia",
				"contenido"=>$this->load->view("bibliografia/bibliografia",array(),true),
				"script"=>$this->load->view("bibliografia/bibliografia.js.php",array(),true),
				)
			);
	}

	public function addBibliografia(){
		$this->acceso();
		$form=array(
			"bibliografia"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Bibliografía requerida.","required"=>"Bibliografía requerida."))
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
		$data['capitulo'] = $this->security->xss_clean($this->input->post("add_capitulo"));
		$data['id_especialidad'] = $this->session->cg;
		$add = $this->model->addBibliografia($data);
		if($add){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro agregado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"add_bibliografia"));exit(0);
		}
	}

	public function updBibliografia(){
		$this->acceso();
		$form=array(
			"bibliografia"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Bibliografía requerida.","required"=>"Bibliografía requerida."))
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
		$data['capitulo'] = $this->security->xss_clean($this->input->post("upd_capitulo"));
		$id_bibliografia = $this->security->xss_clean($this->input->post("upd_id_bibliografia"));
		$upd = $this->model->updBibliografia($id_bibliografia,$data);
		if($upd){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro editado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al editar el registro.","input"=>"upd_bibliografia"));exit(0);
		}
	}

	public function getTabla(){
		$this->acceso();
		$bibliografias = $this->model->getBibliografias();
		$tabla = $this->load->view("bibliografia/tabla_bibliografias",array("bibliografias"=>$bibliografias),TRUE);
		echo json_encode($tabla);
	}

	public function getRow(){
		$this->acceso();
		$id_bibliografia = $this->security->xss_clean($this->input->post("id"));
		$bibliografia = $this->model->getBibliografia($id_bibliografia);
		echo json_encode($bibliografia);
	}

	public function delRow(){
		$this->acceso();
		$id_bibliografia = $this->security->xss_clean($this->input->post("id"));
		$del = $this->model->delRow($id_bibliografia);
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro eliminado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo quitar el registro."));
		}
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}
}