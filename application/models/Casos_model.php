<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Casos_model extends CI_Model {

	private function tb(){
		return $this->session->especialidad;
	}

	public function agregar_imagenes_pregunta($id_pregunta){

		if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$ultima_posicion=$this->db->query("SELECT 
											if(max(posicion)is null,1, (max(posicion)+1))as maximo,
											if(length(id_Caso)=1, CONCAT(0, id_caso),id_caso)as num_caso,id_caso, n_pregunta 
										    FROM (
												SELECT posicion,
												(select p.id_caso from ".$this->session->especialidad."_cc_preguntas p 
												where  p.id_pregunta=".$id_pregunta.")as id_caso,
										        (select REPLACE(p.numeracion, 'P', '')as n_pregunta from ".$this->session->especialidad."_cc_preguntas p 
										        where  p.id_pregunta=".$id_pregunta.")as n_pregunta
											FROM imagenes_banco i
											inner join ".$this->session->especialidad."_cc_preguntas p on (i.id_caso=p.id_caso and p.numeracion=concat('P',i.n_pregunta))
											where p.id_pregunta=".$id_pregunta." and i.especialidad=".$var_especialidad.")as conteo");

		foreach($ultima_posicion->result_array() AS $row) {
            $posicion = $row['maximo'];
            $id_caso = $row['id_caso'];
            $n_pregunta = $row['n_pregunta'];
        }

        $query=$this->db->query('INSERT INTO imagenes_banco 
                                    (id_caso, n_pregunta, posicion, especialidad)
                                    VALUES
                                    ('.$id_caso.','.$n_pregunta.','.$posicion.', "'.$var_especialidad.'")
                                ');

        if ($this->db->affected_rows()){
            return $ultima_posicion->row_array();
        }else{
             return false;
        }
	}

	public function borrar_imagenes_pregunta($id_caso, $especialidad, $posicion, $n_pregunta){
		$query = $this->db->query('DELETE from imagenes_banco
									where id_caso="'.$id_caso.'" and n_pregunta="'.$n_pregunta.'" 
									and posicion='.$posicion.' and especialidad='.$especialidad.'
								');
		return $this->db->affected_rows();
	}

	public function cargar_imagenes_pregunta($id_pregunta_banco){

		if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}


		$query = $this->db->query('SELECT if(length(i.id_Caso)=1, CONCAT(0, i.id_caso),i.id_caso)as num_caso, i.*, p.id_pregunta
									from imagenes_banco i
										inner join '.$this->session->especialidad.'_cc_preguntas p on (p.id_caso=i.id_caso and p.id_pregunta=i.n_pregunta)
									    where p.id_pregunta='.$id_pregunta_banco.' and especialidad='.$var_especialidad.'
								');
        return $query->result_array();
	}

	public function agregar_imagenes_caso($id_caso){

		if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$ultima_posicion=$this->db->query("SELECT if(max(posicion)is null,1, (max(posicion)+1))as maximo,
												  if(length(id_Caso)=1, CONCAT(0, id_caso),id_caso)as num_caso
 											FROM imagenes_banco
											where id_caso=".$id_caso." and especialidad=".$var_especialidad."");

		foreach($ultima_posicion->result_array() AS $row) {
            $posicion = $row['maximo'];
        }

        $query=$this->db->query('INSERT INTO imagenes_banco
                                    (id_caso, n_pregunta, posicion, especialidad)
                                    VALUES
                                    ('.$id_caso.',0,'.$posicion.', "'.$var_especialidad.'")
                                ');

        if ($this->db->affected_rows()){
            return $ultima_posicion->row_array();
        }else{
             return false;
        }
	}

	public function borrar_imagenes_caso($id_caso, $especialidad, $posicion){
		$query = $this->db->query('DELETE from imagenes_banco
									where id_caso="'.$id_caso.'" and n_pregunta=0 
									and posicion='.$posicion.' and especialidad='.$especialidad.'
								');
		return $this->db->affected_rows();
	}

	public function cargar_imagenes_caso($id_caso){

		if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}


		$query = $this->db->query('SELECT if(length(id_Caso)=1, CONCAT(0, id_caso),id_caso)as num_caso, i.* from imagenes_banco i
									where id_caso="'.$id_caso.'" and n_pregunta=0 and especialidad="'.$var_especialidad.'"
								');
        return $query->result_array();
	}
	
	public function getEspecialidad($id_especialidad){
		$especialidad="";
		$query=$this->db->get_where("especialidades",array("id_especialidad"=>$id_especialidad));
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$especialidad="COMITÉ DE ".$row["especialidad"];
			}
		}return $especialidad;
	}

	/*Combos*/
	public function getIdsDivisiones($id_especialidad, $todas){
		$query=$this->db->get_where("divisiones",array("id_especialidad"=>$id_especialidad));
		($todas=="SI") ? $divisiones='<option value="TODAS">TODAS</option>' : $divisiones='';
		if($query->num_rows() > 0){
			foreach($query->result() as $value){
				$divisiones.='<option value="'.$value->id_division.'">'.$value->division.'</option>';
			}
		}return $divisiones;
	}

	public function getIdsAreas($id_division, $id_especialidad, $todas){ 
		( $todas=="SI" ) ? $areas='<option value="TODAS">TODAS</option>' : $areas='' ;
		if( $id_division != "TODAS" ){
			$query = $this->db->get_where("areas",array("id_division"=>$id_division));
		}else{
			$query = $this->db->query('
				SELECT especialidades.id_especialidad, areas.*  FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'";');
		}
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $value) {
				$areas.='<option value="'.$value->id_area.'">'.$value->area.'</option>';
			}
		}return $areas;
	}

	public function getIdsTemas($id_area, $id_division, $id_especialidad, $todas){ 
		( $todas=="SI" ) ? $temas='<option value="TODAS">TODOS</option>' : $temas='' ;
		if( $id_area != "TODAS" ){
			$query = $this->db->get_where("temas",array("id_area"=>$id_area));
		}elseif( $id_division != "TODAS" ){
			$query = $this->db->query('
				SELECT divisiones.id_division, temas.* FROM divisiones
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				WHERE divisiones.id_division = "'.$id_division.'";');
		}else{
			$query = $this->db->query('
				SELECT especialidades.id_especialidad, divisiones.id_division, temas.* FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'";');
		}
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $value) {
				$temas.='<option value="'.$value->id_tema.'">'.$value->tema.'</option>';
			}
		}return $temas;
	}

	public function getIdsCasos($id_tema){
		$casos = '';
		$query = $this->db->get_where($this->tb()."_casos_clinicos",array("id_tema"=>$id_tema));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $value) {
				$casos.='<option value="'.$value->id_caso_clinico.'">'.$value->caso_clinico.'</option>';
			}
		}return $casos;
	}

	public function getCasos($estatus, $id_tema,$id_area,$id_division,$id_especialidad){
		$casos = array();
		if( $id_tema != "TODAS" ){

			$query = $this->db->get_where($this->tb()."_casos_clinicos",array("id_tema"=>$id_tema));

		}
		elseif( $estatus != "TODAS" ){

			$query = $this->db->get_where($this->tb()."_casos_clinicos",array("examen_banco"=>$estatus));

		}elseif( $id_area != "TODAS" ){

			$query = $this->db->query('
				SELECT areas.id_area, '.$this->tb().'_casos_clinicos.* FROM areas
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				WHERE areas.id_area = "'.$id_area.'";');

		}elseif( $id_division != "TODAS" ){

			$query = $this->db->query('
				SELECT divisiones.id_division, areas.id_area, '.$this->tb().'_casos_clinicos.* FROM divisiones
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				WHERE divisiones.id_division = "'.$id_division.'";');

		}else{

			$query = $this->db->query('
				SELECT especialidades.id_especialidad, divisiones.id_division, areas.id_area, '.$this->tb().'_casos_clinicos.* FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'";');
		}

		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$casos[]=$row;
			}
		}return $casos;
	}

	/*ADD*/
	public function addCaso($data){
		$add = $this->db->insert($this->tb()."_casos_clinicos",$data);
		if( $add ){
			$query = $this->db->query("SELECT LAST_INSERT_ID() AS id FROM ".$this->tb()."_casos_clinicos;");
			if( $query->num_rows() > 0 ){
				foreach($query->result() as $value){
					$add = $value->id;
				}
			}
		}return $add;
	}

	/*UPDATE*/
	public function updCaso($id_caso, $data){
		$upd = $this->db->update($this->tb()."_casos_clinicos",$data,array("id_caso_clinico"=>$id_caso));
		return $upd;
	}

	/*DElETE*/
	public function delCaso($id_caso){
		$del = $this->db->delete($this->tb()."_casos_clinicos",array("id_caso_clinico"=>$id_caso));
		return $del;
	}

	/*GET*/
	public function getCasoClinico($id_caso_clinico){
		$query = $this->db->query('SELECT '.$this->tb().'_casos_clinicos.*, especialidades.id_especialidad as ide, divisiones.id_division, areas.id_area FROM '.$this->tb().'_casos_clinicos
			JOIN temas ON temas.id_tema = '.$this->tb().'_casos_clinicos.id_tema
			JOIN areas ON areas.id_area = temas.id_area
			JOIN divisiones ON divisiones.id_division = areas.id_division
			JOIN especialidades ON especialidades.id_especialidad = divisiones.id_especialidad
			WHERE '.$this->tb().'_casos_clinicos.id_caso_clinico="'.$id_caso_clinico.'";');
		$casos_clinicos = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				/*$s="";
				$esp = "";
				$div = "";
				$ar = "";
				$tem = "";
				//Especialidades
				$especialidades = $this->getEspecialidades();
				foreach ($especialidades as  $e) {
					if($e['id_especialidad'] == $row['id_especialidad']){$s="selected";}
					$esp.='<option value="'.$e['id_especialidad'].'" '.$s.'>'.$e['especialidad'].'</option>';
					$s="";
				}
				//Divisiones
				$divisiones = $this->getDivisionesFiltro($row["id_especialidad"]);
				foreach($divisiones as $d){
					if( $d['id_division'] == $row["id_division"]){$s="selected";}
					$div.='<option value="'.$d['id_division'].'" '.$s.'>'.$d['division'].'</option>';
					$s="";
				}
				//Áreas
				$areas = $this->getAreasFiltro($row["id_division"]);
				foreach($areas as $a){
					if( $a['id_area'] == $row["id_area"]){$s="selected";}
					$ar.='<option value="'.$a['id_area'].'" '.$s.'>'.$a['area'].'</option>';
					$s="";
				}
				//Temas
				$temas = $this->getTemasFiltro($row["id_area"]);
				foreach($temas as $t){
					if( $t['id_tema'] == $row["id_tema"]){$s="selected";}
					$tem.='<option value="'.$t['id_tema'].'" '.$s.'>'.$t['tema'].'</option>';
					$s="";
				}
				$row["id_especialidad"]=$esp;
				$row["id_division"]=$div;
				$row["id_area"]=$ar;
				$row["id_tema"]=$tem;*/



				$st="";
				$estatus="";
				if( $row['examen_banco']=="EXAMEN" ){
					$estatus="EXAMEN";
					$st.='
						<option value="EXAMEN" selected>EXAMEN</option>
						<option value="BANCO" disabled>BANCO</option>
						<option value="PILOTO" disabled>PILOTO</option>
						<option value="RESERVA" disabled>RESERVA</option>
						<option value="Revision" disabled>Revisión</option>
					';
				}elseif( $row["examen_banco"]=="BANCO" ){
					$estatus="BANCO";
					$st.='
						<option value="EXAMEN" disabled>EXAMEN</option>
						<option value="BANCO" selected>BANCO</option>
						<option value="PILOTO" disabled>PILOTO</option>
						<option value="RESERVA" disabled>RESERVA</option>
						<option value="Revision" disabled>Revisión</option>
						<option value="BANCO_REVISION">BANCO REVISION</option>
					';
				}elseif($row["examen_banco"]=="PILOTO"){
					$estatus="PILOTO";
					$st.='
						<option value="EXAMEN" disabled>EXAMEN</option>
						<option value="BANCO" disabled>BANCO</option>
						<option value="PILOTO" selected>PILOTO</option>
						<option value="RESERVA" disabled>RESERVA</option>
						<option value="Revision" disabled>Revisión</option>
					';
				}elseif($row["examen_banco"]=="PILOTO_2020"){
					$estatus="PILOTO_2020";
					$st.='
						<option value="EXAMEN" disabled>EXAMEN</option>
						<option value="EXAMEN_2019" disabled>EXAMEN_2019</option>
						<option value="EXAMEN_2020" disabled>EXAMEN_2020</option>
						<option value="BANCO" disabled>BANCO</option>
						<option value="PILOTO" selected>PILOTO</option>
						<option value="PILOTO_2020" selected>PILOTO_2020</option>
						<option value="RESERVA" disabled>RESERVA</option>
						<option value="Revision" disabled>Revisión</option>
					';
				}elseif($row["examen_banco"]=="RESERVA"){
					$estatus="RESERVA";
					$st.='
						<option value="EXAMEN" disabled>EXAMEN</option>
						<option value="BANCO" disabled>BANCO</option>
						<option value="PILOTO" disabled>PILOTO</option>
						<option value="RESERVA" selected>RESERVA</option>
						<option value="Revision" disabled>Revisión</option>
					';
				}elseif($row["examen_banco"]=="Revision"){
					$estatus="Revision";
					$st.='
						<option value="EXAMEN">EXAMEN</option>
						<option value="BANCO">BANCO</option>
						<option value="PILOTO">PILOTO</option>
						<option value="RESERVA">RESERVA</option>
						<option value="Revision" selected>Revisión</option>
					';

				}elseif($row["examen_banco"]=="EXAMEN_2020"){
					$estatus="EXAMEN_2020";
					$st.='
						<option value="EXAMEN_2020" selected>EXAMEN_2020</option>
						<option value="EXAMEN_2019">EXAMEN_2019</option>
						<option value="BANCO">BANCO</option>
						<option value="PILOTO">PILOTO</option>
						<option value="RESERVA">RESERVA</option>
						<option value="BANCO_REVISION">BANCO REVISION</option>
					';
				}elseif($row["examen_banco"]=="EXAMEN_2019"){
					$estatus="EXAMEN_2019";
					$st.='
						<option value="EXAMEN_2020">EXAMEN_2020</option>
						<option value="EXAMEN_2019" selected>EXAMEN_2019</option>
						<option value="BANCO">BANCO</option>
						<option value="PILOTO">PILOTO</option>
						<option value="PILOTO_2020">PILOTO_2020</option>
						<option value="RESERVA">RESERVA</option>

						<option value="BANCO_REVISION">BANCO REVISION</option>
					';
				}elseif($row["examen_banco"]=="EXAMEN V1"){
					$estatus="EXAMEN V1";
					$st.='
						<option value="EXAMEN_2020">EXAMEN_2020</option>
						<option value="EXAMEN_2019">EXAMEN_2019</option>
						<option value="BANCO">BANCO</option>
						<option value="PILOTO">PILOTO</option>
						<option value="RESERVA">RESERVA</option>
						<option value="BANCO_REVISION">BANCO REVISION</option>
					';
				}elseif($row["examen_banco"]=="BANCO_REVISION"){
					$estatus="BANCO_REVISION";
					$st.='
						<option value="BANCO_REVISION"selected>BANCO REVISION</option>
						<option value="EXAMEN_2020">EXAMEN_2020</option>
						<option value="EXAMEN_2019">EXAMEN_2019</option>
						<option value="BANCO">BANCO</option>
						<option value="PILOTO">PILOTO</option>
						<option value="RESERVA">RESERVA</option>
					';
				}



				$row['examen_banco']=$st;
				$row['examen_banco_st']= (empty($estatus)) ? "Revision" : $estatus;
				$row['accion']= (empty($row['accion'])) ? "0" : $row['accion'] ;
				$row['accion_comentario']= (empty($row['accion_comentario'])) ? "0" : $row['accion_comentario'] ;

				$casos_clinicos=$row;
			}
		}return $casos_clinicos;
	}

	/*AUX*/
	public function getEspecialidades(){
		$this->db->order_by("fecha_hora_modificacion","DESC");
		$query = $this->db->get("especialidades");
		$especialidades = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$especialidades[]=$row;
			}
		}return $especialidades;
	}

	public function getDivisionesFiltro($id_especialidad){
		$this->db->order_by("fecha_hora_modificacion","DESC");
		$query = $this->db->get_where("divisiones",array("id_especialidad"=>$id_especialidad));
		$divisiones = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$divisiones[]=$row;
			}
		}return $divisiones;
	}

	public function getAreasFiltro($id_division){
		$this->db->order_by("fecha_hora_modificacion","DESC");
		$query = $this->db->get_where("areas",array("id_division"=>$id_division));
		$areas = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$areas[]=$row;
			}
		}return $areas;
	}

	public function getTemasFiltro($id_area){
		$this->db->order_by("fecha_hora_modificacion","DESC");
		$query = $this->db->get_where("temas",array("id_area"=>$id_area));
		$temas = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$temas[]=$row;
			}
		}return $temas;
	}

	public function getPreguntas($id_caso){
		$query = $this->db->query("SELECT ".$this->tb()."_cc_preguntas.*, ".$this->tb()."_casos_clinicos.examen_banco AS st FROM ".$this->tb()."_casos_clinicos JOIN ".$this->tb()."_cc_preguntas ON ".$this->tb()."_cc_preguntas.id_caso = ".$this->tb()."_casos_clinicos.id_caso_clinico WHERE ".$this->tb()."_casos_clinicos.id_caso_clinico='".$id_caso."';");
		$preguntas = array();
		if( $query->num_rows() > 0 ){
			foreach($query->result_array() as $row){
				$preguntas[] = $row;
			}
		}return $preguntas;
	}

	public function getPreguntas2($id_tema,$id_area,$id_division,$id_especialidad,$estatus,$accion){
		if( $id_tema != "TODAS" ){
			$query = $this->db->query('
				SELECT temas.id_tema, '.$this->tb().'_casos_clinicos.examen_banco AS st, '.$this->tb().'_cc_preguntas.* FROM temas
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE temas.id_tema = "'.$id_tema.'"'.(($estatus=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.examen_banco="'.$estatus.'"').(($accion=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.accion="'.$accion.'"').';
				');
		}elseif( $id_area != "TODAS" ){
			$query = $this->db->query('
				SELECT areas.id_area, temas.id_tema, '.$this->tb().'_casos_clinicos.examen_banco AS st, '.$this->tb().'_cc_preguntas.* FROM areas
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE areas.id_area = "'.$id_area.'"'.(($estatus=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.examen_banco="'.$estatus.'"').(($accion=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.accion="'.$accion.'"').';
				');
		}elseif( $id_division != "TODAS" ){
			$query = $this->db->query('
				SELECT divisiones.id_division, areas.id_area, temas.id_tema, '.$this->tb().'_casos_clinicos.examen_banco AS st, '.$this->tb().'_cc_preguntas.* FROM divisiones
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE divisiones.id_division = "'.$id_division.'"'.(($estatus=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.examen_banco="'.$estatus.'"').(($accion=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.accion="'.$accion.'"').';
				');
		}elseif ( $id_especialidad != "TODAS" ) {
			$query = $this->db->query('
				SELECT especialidades.id_especialidad, divisiones.id_division, areas.id_area, temas.id_tema, '.$this->tb().'_casos_clinicos.examen_banco AS st, '.$this->tb().'_cc_preguntas.* FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'"'.(($estatus=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.examen_banco="'.$estatus.'"').(($accion=='TODAS') ? '':' AND '.$this->tb().'_cc_preguntas.accion="'.$accion.'"').';
				');
		}else{
			$query = $this->db->query('
				SELECT '.$this->tb().'_casos_clinicos.examen_banco AS st, '.$this->tb().'_cc_preguntas.* FROM '.$this->tb().'_casos_clinicos
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico;
				');
		}
		$preguntas = array();
		if( $query->num_rows() > 0 ){
			foreach($query->result_array() as $row){
				$preguntas[] = $row;
			}
		}return $preguntas;
	}

	public function get_preguntas_piloto(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_cc_preguntas WHERE id_pregunta > 200 AND id_pregunta < 226;');
		return $query->result_array();
	}

	public function get_preguntas_examen(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_cc_preguntas WHERE id_pregunta < 201;');
		return $query->result_array();
	}

	public function get_cs_piloto(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_casos_clinicos WHERE examen_banco = "PILOTO";');
		return $query->result_array();
	}

	public function get_cs_examen(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_casos_clinicos WHERE examen_banco = "EXAMEN";');
		return $query->result_array();
	}
}