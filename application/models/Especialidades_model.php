<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Especialidades_model extends CI_Model {
	
	public function getEspecialidades(){
		$especialidades=array();
		$query=$this->db->get("especialidades");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$especialidades[]=$row;
			}
		}return $especialidades;
	}

	

}