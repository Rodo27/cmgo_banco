<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Areas_model extends CI_Model {
	
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

	public function getAreas($id_division,$id_especialidad){
		$areas=array();
		if($id_division!="TODAS"){
			$query=$this->db->get_where("areas",array("id_division"=>$id_division));
		}elseif($id_especialidad != "TODAS"){
			$query=$this->db->query('
				SELECT especialidades.id_especialidad, areas.* FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division WHERE especialidades.id_especialidad = "'.$id_especialidad.';";
			');
		}else{
			$query = $this->db->get("areas");
		}
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$areas[]=$row;
			}
		}return $areas;
	}

	public function addArea($data){
		$add = $this->db->insert("areas",$data);
		return $add;
	}

	public function getArea($id){
		$query = $this->db->get_where("areas",array("id_area"=>$id));
		$dts = array();
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$dts = array("id_especialidad"=>0,"id_division"=>"");
				$dts=$this->getEspecialidadByArea($row['id_division']);
				$row['id_especialidad']=$dts["id_especialidad"];
				$row['id_division']=$dts["id_division"];
				$dts=$row;
			}
		}return $dts;
	}

	private function getEspecialidadByArea($id_division){
		$query = $this->db->get_where('divisiones',array("id_division"=>$id_division));
		$id_especialidad = 0;
		$div = "";
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$id_especialidad = $row['id_especialidad'];
			}
			$query2 = $this->db->get_where("divisiones",array("id_especialidad"=>$id_especialidad));
			if( $query2->num_rows() > 0 ){
				foreach ($query2->result_array() as $row2) {
					$s="";
					if( $row2['id_division']==$id_division ){$s="selected";}
					$div.='<option value="'.$row2['id_division'].'" '.$s.'>'.$row2['division'].'</option>';
				}
			}
		}return array("id_especialidad"=>$id_especialidad,"id_division"=>$div);
	}

	private function getDivisionByArea($id){

	}

	public function updArea($id_area,$data){
		$upd = $this->db->update("areas",$data,array("id_area"=>$id_area));
		return $upd;
	}

	public function delArea($id_area){
		$del = $this->db->delete("areas",array("id_area"=>$id_area));
		return $del;
	}
}