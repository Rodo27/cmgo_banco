<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Permisos_model extends CI_Model {
	
	public function getUsuarios(){
		$usuarios=array();
		$query=$this->db->get("usuarios");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$row["comite"]=$this->getComite($row['cc']);
				$usuarios[]=$row;
			}
		}return $usuarios;
	}

	public function getComite($id_especialidad){
		$query = $this->db->get_where("especialidades",array("id_especialidad"=>$id_especialidad));
		$comite = "";
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$comite = $row['especialidad'];
			}
		}return $comite;
	}

	public function getEspecialidades(){
		$query = $this->db->get("especialidades");
		$esp = "";
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$esp.='<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';
			}
		}return $esp;
	}

	public function addUser($data){
		$add = $this->db->insert("usuarios",$data);
		return $add;
	}

	public function updUser($id_usuario,$data){
		$upd = $this->db->update("usuarios",$data,array("id_usuario"=>$id_usuario));
		return $upd;
	}

	public function getUser($id){
		$query = $this->db->get_where("usuarios",array("id_usuario"=>$id));
		$user = array();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$user = $row;
			}
		}return $user;
	}

	public function delUser($id_usuario){
		$del = $this->db->delete("usuarios",array("id_usuario"=>$id_usuario));
		return $del;
	}
}