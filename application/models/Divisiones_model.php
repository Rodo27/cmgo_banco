<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Divisiones_model extends CI_Model {
	
	public function getEspecialidades(){
		$especialidades="";
		$query=$this->db->get("especialidades");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$especialidades.='<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';
			}
		}return $especialidades;
	}

	public function getDivisiones($id_especialidad){
		$divisiones=array();
		if( $id_especialidad=="TODAS" ){
			$query=$this->db->get("divisiones");
		}else{
			$query=$this->db->get_where("divisiones",array("id_especialidad"=>$id_especialidad));
		}
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$divisiones[]=$row;
			}
		}return $divisiones;
	}

	public function addDivision($data){
		$add = $this->db->insert("divisiones",$data);
		return $add;
	}

	public function getDivision($id){
		$query = $this->db->get_where("divisiones",array("id_division"=>$id));
		$dts = array();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$dts=$row;
			}
		}return $dts;
	}

	public function updDivision($id_division,$data){
		$upd = $this->db->update("divisiones",$data,array("id_division"=>$id_division));
		return $upd;
	}

	public function delDivision($id_division){
		$del = $this->db->delete("divisiones",array("id_division"=>$id_division));
		return $del;
	}	
}