<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model {
    public function consultaMedico($usuario){
    	$query = $this->db->get_where("usuarios",array("usuario"=>$usuario));
    	$dts = array();
    	if( $query->num_rows() > 0 ){
    		foreach ($query->result_array() as $row) {
    			$dts = $row;
    		}
    	}return $dts;
    }

    public function addToken( $cedula, $correo, $token, $tipo ){
		$query = $this->db->query("SELECT * FROM cambios_password WHERE cedula = '".$cedula."' AND date(fecha_hora_creacion) = '".date('Y-m-d')."';");
		$ins = TRUE;
		if( $query->num_rows() > 2 ){
			$ins = FALSE;
		}else{
			$this->db->update("cambios_password",array("estatus"=>0),array("cedula"=>$cedula));
			$ins = $this->db->insert("cambios_password",array("token"=>$token,"cedula"=>$cedula,"correo"=>$correo,"tipo"=>$tipo, "estatus"=>1));
		} return $ins;
	}

	public function getTokenCambioPassword($token){
		$query = $this->db->get_where("cambios_password",array("token"=>$token,"estatus"=>1));
		$dts = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$dts = $row;
			}
		}return $dts;
	}

	public function updateToken($token,$correo,$data){
		$this->db->update("cambios_password",$data,array("token"=>$token,"correo"=>$correo));
	}

	public function getIntentos($token,$correo){
		$query = $this->db->get_where("cambios_password",array("token"=>$token,"correo"=>$correo));
		$intentos = 5;
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$intentos = $row['intentos'];
			}
		} return $intentos+1;
	}

	public function updUsuario( $usuario, $data ){
		$upd = $this->db->update("usuarios",$data,array("usuario"=>$usuario));
		return $upd;
	}
}