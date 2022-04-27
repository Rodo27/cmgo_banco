<?php defined('BASEPATH') OR exit('No direct script access allowed');
class admin_usuario_model extends CI_Model {

	private function tb(){
		return $this->session->especialidad;
	}

    public function getUsuarios(){
		
		$query = $this->db->query('SELECT id_usuario, usuario, correo, estatus, rol FROM usuarios');
        return $query->result_array();
	}

	public function registroUsuario($newUser){

		$query = $this->db->query('INSERT INTO usuarios
        (usuario, correo, `password`, estatus, rol, cc, cg) 
		VALUES ("'.$newUser['usuario'].'", "'.$newUser['correo'].'",
		"'.$newUser['contrasena'].'" , "'.$newUser['estatus'].'",
		"'.$newUser['rol'].'",
		"'.$newUser['id_especialidad'].'",
		"'.$newUser['id_especialidad'].'"
		)');

		return $this->db->affected_rows();
	}

	public function getDatosUsuario($id){

		$query = $this->db->query('SELECT id_usuario, usuario, correo, password, estatus, rol FROM usuarios WHERE id_usuario = '.$id.'');
        return $query->row_array();

	}

	public function eliminarUsuario($id){
		
		$query = $this->db->query('DELETE FROM usuarios WHERE id_usuario = '.$id.'');

		if($query){
            return true;
        }
        else{
            return false;
        }

	}

	public function actualizaUsuario($datos){

		$query = $this->db->query('UPDATE usuarios SET
        password = "'.$datos['contrasena'].'",
        estatus = "'.$datos['estatus'].'",
        rol = "'.$datos['rol'].'"
        WHERE id_usuario = '.$datos['usuario'].'');

		return $this->db->affected_rows();
	}

	public function verificarRepetido($username){
		$query = $this->db->query('SELECT * FROM usuarios
		WHERE usuario = "'.$username.'"');
        return $query->row_array();
	}

}