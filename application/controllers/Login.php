<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model','login');
        $this->load->library('bcrypt');
    }

	public function index()
	{ 
		if( !$this->session->logged ){
			$this->load->view('login/login',
				array(
					'titulo'=>"Login",
					'menu'=>$this->load->view('login/menu',array(),true),
					'footer'=>$this->load->view('login/footer',array(),true),
					'script'=>$this->load->view('login/login.js.php',array(),true)
				)
			);
		}else{ redirect("Casos_clinicos"); }
	}

	public function iniciarSesion(){
		$this->form_validation->set_rules('cedula','Cedula','trim|required|min_length[5]|max_length[20]|regex_match[/^[a-zA-Z.\-_]*$/]',array('trim'=>'Ingrese el nombre de Usuario.','required'=>'Ingrese el nombre de Usuario.','min_length'=>'Ingrese un Usuario válido.','max_length'=>'Ingrese un Usuario válido.','regex_match'=>'Ingrese un Usuario válido.'));
		if($this->form_validation->run() == FALSE){
			echo json_encode(array('estatus'=>0,'msg'=>validation_errors()));
		}else{
			$cedula = $this->security->xss_clean($this->input->post('cedula'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$existe = $this->login->consultaMedico($cedula);
			if( !empty($existe) ){
				if( $existe['estatus']=="Activo" ){
					$check = $this->bcrypt->check_password($password, $existe['password']);
					if($check){
						$esp="2";
						switch ($existe['cc']) {
							case '2':
								$esp="gyo";
								break;
							case '3':
								$esp="brh";
								break;
							case '4':
								$esp="mmf";
								break;
							case '5':
								$esp="uro";
								break;
							case '6':
								$esp="uro2";
							case '7':
								$esp="uropuem";
								break;
						}
						$this->session->set_userdata(array('logged'=>TRUE,'nombre'=>$existe['usuario'],'usuario'=>$existe['usuario'],'id'=>$existe['id_usuario'],'cc'=>$existe['cc'],'cg'=>$existe['cg'],'rol'=>$existe['rol'],'especialidad'=>$esp));
						echo json_encode(array('estatus'=>TRUE,'msg'=>base_url()."index.php/Casos_clinicos"));
					}else{
						echo json_encode(array('estatus'=>FALSE,'msg'=>"Contraseña incorrecta."));
					}
				}else{
					echo json_encode(array('estatus'=>FALSE,'msg'=>"El usuario fué dado de baja."));
				}
			}else{
				echo json_encode(array('estatus'=>FALSE,'msg'=>"El usuario no está registrado."));
			}
		}
	}

	public function formPassword(){
		$this->form_validation->set_rules('cedula2','Cedula','trim|required|min_length[5]|max_length[20]|regex_match[/^[a-zA-Z.\-_]*$/]',array('trim'=>'Ingrese el nombre de Usuario.','required'=>'Ingrese el nombre de Usuario.','min_length'=>'Ingrese un Usuario válido.','max_length'=>'Ingrese un Usuario válido.','regex_match'=>'Ingrese un Usuario válido.'));
		if($this->form_validation->run() == FALSE){
			echo json_encode(array('estatus'=>0,'msg'=>validation_errors()));
		}else{
			$cedula = $this->security->xss_clean($this->input->post('cedula2'));
			$correo = $this->security->xss_clean($this->input->post('correo2'));
			$existe = $this->login->consultaMedico($cedula);
			if( !empty($existe) ){
				if( $existe['estatus']=="Activo" ){
					$token = $this->get_token(40);
					$add = $this->login->addToken( $cedula, $correo, $token, "Intento" );
					if( $add ){
						if( $existe["correo"]==$correo ){
							$envio = $this->enviarMail($correo,$token);
							if( $envio ){
								echo json_encode(array('estatus'=>TRUE,'msg'=>"En breve recibirás un mensaje en tu correo electrónico."));
							}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"Temporalmente fuera de servicio, intente más tarde."));}
						}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"Correo incorrecto."));}	
					}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"Bloqueado por demasiados intentos. Intente mañana."));}	
				}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"El usuario fué dado de baja."));}
			}else{ echo json_encode(array('estatus'=>FALSE,'msg'=>"El usuario no está registrado."));}
		}
	}

	private function enviarMail( $correo,$token ){
        $this->load->library('email'); 
        $this->email->from('avisos@cmgo.org.mx', 'CONSEJO MEXICANO DE GINECOLOGÍA Y OBSTETRICIA');
        $this->email->to(array($correo,'notificaciones@cmgo.org.mx'));
        $this->email->subject('PLANTILLA DE COMITÉS [Cambio de contraseña]');
        $this->email->message("
            
CONSEJO MEXICANO DE GINECOLOGÍA Y OBSTETRICIA

Estimado usuario haga click en la siguiente liga para cambiar su contraseña.

".base_url()."index.php/Login/cambioPassword/".$token."
");
        $envio = $this->email->send();
        return $envio;
    }

	private function get_token($len=20){
        $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
        );
        shuffle($chars);
        $num_chars = count($chars) - 1;
        $token = '';
        for($i = 0; $i < $len; $i++){
            $token .= $chars[mt_rand(0, $num_chars)];
        }
        return($token);
    }

    public function cambioPassword($token="0"){ 
    	$dts = $this->login->getTokenCambioPassword($token);
    	if( empty($dts) ){
    		echo "<script>alert('Proceso inválido, el token a expirado.'); window.location='".base_url()."index.php/Login'; </script>";
    	}else{
    		$this->load->view('login/cambioPassword',
				array(
					'titulo'=>"Cambio de contraseña",
					'menu'=>$this->load->view('login/menu',array(),true),
					'footer'=>$this->load->view('login/footer',array(),true),
					'dts'=>$dts,
					'token'=>$token,
					'script'=>$this->load->view("login/cambioPassword.js.php",array(),true)
				)
			);
    	}
    	
    }

    public function actualizarUsuario(){
    	$this->form_validation->set_rules('password1','Contraseña','trim|required|min_length[6]|max_length[20]',array('trim'=>'Contraseña requerida.','required'=>'Contraseña requerida.','min_length'=>'Por seguridad su contraseña debe contener entre 6 y 20 caracteres.','max_length'=>'La contraseña no debe exceder 20 caracteres.'));
		if($this->form_validation->run() == FALSE){
			echo json_encode(array('estatus'=>0,'msg'=>validation_errors()));
		}else{
			$this->form_validation->set_rules('password2','Contraseña','matches[password1]',array('matches'=>'Las contraseñas no coindiden.'));
			if($this->form_validation->run() == FALSE){
				echo json_encode(array('estatus'=>0,'msg'=>validation_errors()));
			}else{
				$this->form_validation->set_rules('pregunta','Pregunta','trim|required',array('trim'=>'Conteste la pregunta de seguridad.','required'=>'Conteste la pregunta de seguridad.'));
				if($this->form_validation->run() == FALSE){
					echo json_encode(array('estatus'=>0,'msg'=>validation_errors()));
				}else{
					$cedula = $this->security->xss_clean($this->input->post('cedula'));
					$respuesta = $this->security->xss_clean($this->input->post('pregunta'));
					$medico = $this->login->consultaMedico($cedula);
					if( !empty($medico) ){
						$token = $this->security->xss_clean($this->input->post('token'));
						$correo = $this->security->xss_clean($this->input->post('correo'));
						$intentos = $this->login->getIntentos( $token, $correo );
						if( $intentos < 4 ){
							if( /*$medico['cs_respuesta_secreta'] == $respuesta*/ $respuesta=TRUE ){
								$new = $this->security->xss_clean($this->input->post('password1'));
								$password_code = $this->bcrypt->hash_password($new);
								$upd = $this->login->updUsuario( $cedula, array("password"=>$password_code,"correo"=>$correo) );
								if( $upd ){
									$this->login->updateToken($token,$correo,array("tipo"=>"Completo","intentos"=>$intentos,"estatus"=>0));
									echo json_encode(array('estatus'=>TRUE,'msg'=>"Contraseña actualizada correctamente.",'url'=>base_url()));
								}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"No fue posible actualizar la contraseña."));}	
							}else{
								$this->login->updateToken($token,$correo,array("intentos"=>$intentos));
								echo json_encode(array('estatus'=>FALSE,'msg'=>"Contesta correctamente la pregunta de seguridad."));}
						}else{
							$this->login->updateToken($token,$correo,array("estatus"=>0));
							echo json_encode(array('estatus'=>FALSE,'msg'=>"El token a expirado por demasiados intentos. Genere otro token."));}
					}else{echo json_encode(array('estatus'=>FALSE,'msg'=>"El usuario no está registrado."));}
				}
			}
		}
    }

    private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}

	public function salir(){
    	$this->session->sess_destroy();
		redirect("login");
    }

    public function actualizar(){
    	$query = $this->db->get("cc_casos_clinicos");
    	if($query->num_rows() > 0){
    		foreach ($query->result() as $value) {
    			$this->db->update("cc_preguntas",array("examen_banco"=>$value->examen_banco),array("id_caso"=>$value->id_caso_clinico));
    		}
    	}
    }
}