<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Balance_model extends CI_Model {
	
	public function getEspecialidades(){
		$especialidades="";
		$query=$this->db->get("especialidades");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$especialidades.='<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';
			}
		}return $especialidades;
	}

	public function getPreguntas($especialidad,$tipo_examen,$tb){
		$cc = $this->db->query('
			SELECT
				divisiones.division,
			    areas.area,
			    COUNT('.$tb.'_cc_preguntas.id_pregunta) AS cc
			FROM divisiones
			LEFT JOIN areas ON areas.id_division = divisiones.id_division
			LEFT JOIN temas ON temas.id_area = areas.id_area
			LEFT JOIN '.$tb.'_casos_clinicos ON '.$tb.'_casos_clinicos.id_tema = temas.id_tema
			LEFT JOIN '.$tb.'_cc_preguntas ON '.$tb.'_cc_preguntas.id_caso = '.$tb.'_casos_clinicos.id_caso_clinico
			WHERE divisiones.id_especialidad = '.$especialidad.' AND '.$tb.'_cc_preguntas.tipo_examen = "'.$tipo_examen.'"
			GROUP BY division,area;')->result_array(); 

		$cg = $this->db->query('
			SELECT
				divisiones.division,
			    areas.area,
			    count('.$tb.'_cg_preguntas.id_pregunta) AS cg
			FROM divisiones
			LEFT JOIN areas ON areas.id_division = divisiones.id_division
			LEFT JOIN temas ON temas.id_area = areas.id_area
			LEFT JOIN '.$tb.'_cg_preguntas ON '.$tb.'_cg_preguntas.id_tema = temas.id_tema
			WHERE divisiones.id_especialidad = '.$especialidad.' AND '.$tb.'_cg_preguntas.tipo_examen = "'.$tipo_examen.'"
			GROUP BY division,area;')->result_array();

		$all = array();
		foreach ($cc as $value) {
			$all[$value['division'].$value['area']]['division']=$value['division'];
			$all[$value['division'].$value['area']]['area']=$value['area'];
			$all[$value['division'].$value['area']]['cc']=$value['cc'];
			$all[$value['division'].$value['area']]['cg']=0;
		}
		foreach ($cg as $value2) {
			$all[$value2['division'].$value2['area']]['division']=$value2['division'];
			$all[$value2['division'].$value2['area']]['area']=$value2['area'];
			$key = $value2['division'].$value2['area'];
			if( !isset( $all[$value2['division'].$value2['area']]['cc'] ) ){
				$all[$value2['division'].$value2['area']]['cc']=0;	
			}
			$all[$value2['division'].$value2['area']]['cg']=$value2['cg'];
		}
		sort($all);
		return $all;
	}
}