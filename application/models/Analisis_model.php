<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Analisis_model extends CI_Model {

	private function tb(){
		return $this->session->especialidad;
	}
	
	public function getEspecialidades(){
		$especialidades="";
		$query=$this->db->get("especialidades");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$especialidades.='<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';
			}
		}return $especialidades;
	}

	public function getDivisiones($id_especialidad,$todas='NO'){
		if($todas=="TODAS"){
			$divisiones='<option value="TODAS">TODAS</option>';
		}else{
			$divisiones="";
		}
		
		if($id_especialidad!="TODAS"){
			$query=$this->db->get_where("divisiones",array("id_especialidad"=>$id_especialidad));
		}else{
			$query=$this->db->get("divisiones");
		}
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$divisiones.='<option value="'.$row['id_division'].'">'.$row['division'].'</option>';
			}
		}return $divisiones;
	}

	public function updateMaxMinCC($tipo,$caso,$pregunta,$dif,$dis,$infit,$outfit){
		$up = $this->db->update($tipo."_cc_preguntas",
			array(
				"analisis_dif"=>$dif,
				"analisis_dis"=>$dis,
				"analisis_infit"=>$infit,
				"analisis_outfit"=>$outfit),
			array("id_caso"=>$caso,"numeracion"=>$pregunta));
	}

	public function updateMaxMinCG($tipo,$id_pregunta,$dif,$dis,$infit,$outfit){
		$up = $this->db->update($tipo."_cg_preguntas",
			array(
				"analisis_dif"=>$dif,
				"analisis_dis"=>$dis,
				"analisis_infit"=>$infit,
				"analisis_outfit"=>$outfit),
			array("id_pregunta"=>$id_pregunta));
	}
}