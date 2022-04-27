<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_usuario extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Conocimientos_generales_model','model_gnrl');
        $this->load->model('admin_usuario_model','model');
        $this->load->library('bcrypt');
    }

    public function index()
	{	
		//$this->acceso();
		$id_especialidad = $this->session->cg;
		$especialidad = $this->model_gnrl->getEspecialidad($id_especialidad);
		//$divisiones = $this->model->getIdsDivisiones($id_especialidad,"SI");
		
		//$preguntas_piloto = $this->model->get_preguntas_piloto();
		//$preguntas_examen = $this->model->get_preguntas_examen();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"conocimientos_generales",
				"sbmenu"=>"admin_usuario",
				"contenido"=>$this->load->view("admin_usur/admin_usuario_nw",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					//"divisiones"=>$divisiones,
					//"piloto"=>$preguntas_piloto,
					//"examen"=>$preguntas_examen
					),true),
				"script"=>$this->load->view("admin_usur/usuarios/admin_usuario_nw.js.php",array("id_especialidad"=>$id_especialidad),true),
				)
			);
	}

    public function getUsuarios(){

        $usuarios = $this->model->getUsuarios();
		$vista = $this->load->view("admin_usur/tabla_usuarios",array("usuarios"=>$usuarios),TRUE);
        echo json_encode($vista);

    }

	/*public function verificarRepetido($username){
		$respuesta = $this->model->verificarRepetido("dinosaurio");
		var_dump($respuesta);
	}*/

	public function registroUsuario(){

		$datos = array(
			"usuario" => $this->input->get('usuario'),
			"correo" => $this->input->get('correo'),
			"contrasena" => $this->bcrypt->hash_password($this->security->xss_clean($this->input->get('contra'))),
			"estatus" => $this->input->get('estatus'),
			"rol" => $this->input->get('rol'),
			"id_especialidad" => $this->input->get('id_especialidad')
		);
		$verificaRepetido = $this->model->verificarRepetido($this->input->get('usuario'));
		if(isset($verificaRepetido)){
			echo json_encode(array('estatus'=>FALSE, 'msg'=>"Ya hay un usuario registrado con ese nombre."));
		}
		else{
			//verificarRepetido($this->input->get('usuario'));
			$respuesta = $this->model->registroUsuario($datos);
			if($respuesta){
				echo json_encode(array('estatus'=>$respuesta, 'msg'=>"Usuario registrado."));
			}
			else{
				echo json_encode(array('estatus'=>$respuesta, 'msg'=>"Hubo un error con el registro."));
			}

		}
	}

	public function getDatosUsuario(){

		$usuarioID = $_GET['id_usuario'];

		$datos = $this->model->getDatosUsuario($usuarioID);

		echo json_encode($datos);
	}

	public function eliminarUsuario(){
		$id_usuario = $_GET['id_usuario'];

		$respuesta = $this->model->eliminarUsuario($id_usuario);

		echo json_encode($respuesta);

	}

	public function actualizaUsuario(){

		$datos = array(
			"usuario" => $this->input->get('usuario'),
			"contrasena" => $this->bcrypt->hash_password(($this->input->get('contra'))),
			"estatus" => $this->input->get('estatus'),
			"rol" => $this->input->get('rol')
		);

		$respuesta = $this->model->actualizaUsuario($datos);

		echo json_encode($respuesta);

	}


}