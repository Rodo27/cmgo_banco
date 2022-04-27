<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Casos_clinicos_model extends CI_Model {

	private function tb(){
		return $this->session->especialidad;
	}

	public function get_rubrica($id_pregunta){

		$query = $this->db->query('SELECT * FROM '.$this->session->especialidad.'_cc_preguntas
									where id_pregunta='.$id_pregunta.'');
        return $query->row_array();
	}

	public function guardar_rubrica($id_pregunta, $rubrica1, $rubrica2, $rubrica3, $rubrica4, $rubrica5,$rubrica6,
    		$rubrica7, $rubrica8, $rubrica9, $rubrica10, $rubrica10, $rubrica11, $rubrica12, $rubrica13, $rubrica14, $rubrica15, $rubrica16, $rubrica17, $rubrica18, $rubrica19, $rubrica20, $rubrica21, $rubrica22, $rubrica23, $rubrica24, $rubrica25, $rubrica26, $rubrica27){

		$query = $this->db->query('UPDATE '.$this->session->especialidad.'_cc_preguntas
									set 
									rubrica1="'.$rubrica1.'",
									rubrica2="'.$rubrica2.'",
									rubrica3="'.$rubrica3.'",
									rubrica4="'.$rubrica4.'",
									rubrica5="'.$rubrica5.'",
									rubrica6="'.$rubrica6.'",
									rubrica7="'.$rubrica7.'",
									rubrica8="'.$rubrica8.'",
									rubrica9="'.$rubrica9.'",
									rubrica10="'.$rubrica10.'",
									rubrica11="'.$rubrica11.'",
									rubrica12="'.$rubrica12.'",
									rubrica13="'.$rubrica13.'",
									rubrica14="'.$rubrica14.'",
									rubrica15="'.$rubrica15.'",
									rubrica16="'.$rubrica16.'",
									rubrica17="'.$rubrica17.'",
									rubrica18="'.$rubrica18.'",
									rubrica19="'.$rubrica19.'",
									rubrica20="'.$rubrica20.'",
									rubrica21="'.$rubrica21.'",
									rubrica22="'.$rubrica22.'",
									rubrica23="'.$rubrica23.'",
									rubrica24="'.$rubrica24.'",
									rubrica25="'.$rubrica25.'",
									rubrica26="'.$rubrica26.'",
									rubrica27="'.$rubrica27.'"
									where id_pregunta='.$id_pregunta.'	');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	public function get_preguntas_aprobadoID($id_pregunta){

		$query = $this->db->query('SELECT * FROM preguntacc_aprobado p
									inner join casos_clinicos_aprobado cc on cc.id_caso=p.id_caso_banco
									where p.id_pregunta_aprobado='.$id_pregunta.'	');
        return $query->row_array();
	}

	public function get_preguntas_aprobado($especialidad_tipo, $tipo_reactivo,$version_examen){

		if ($especialidad_tipo=="") {
			$especialidad="id_especialidad LIKE '%%'";
		}else{
			$especialidad=" id_especialidad =".$especialidad_tipo."";
		}

		if ($tipo_reactivo=="") {
			$tipo="examen_banco LIKE '%%'";
		}else if ($tipo_reactivo=="EXAMEN") {
			$tipo="examen_banco like '%EXAMEN%'";
		}else if ($tipo_reactivo=="PILOTO") {
			$tipo="examen_banco like '%PILOTO%'";
		}

		if ($version_examen=="") {
			$version="version LIKE '%%'";
		}else{
			$version="version =".$version_examen."";
		}

		$query = $this->db->query('SELECT p.*, 
									(CASE
										WHEN examen_banco like "%EXAMEN%" THEN "EXAMEN"
									    WHEN examen_banco like "%PILOTO%" THEN "PILOTO"
									    else examen_banco
									END)as tipo_reactivo
									 FROM preguntacc_aprobado p
									WHERE '.$especialidad.'
										and '.$tipo.' and '.$version.'
								');
        return $query->result_array();
	}

	public function clonar_pregunta($id_pregunta,$id_caso, $director){

		$id_pregunta_banco= $this->db->query('SELECT * FROM '.$this->session->especialidad.'_cc_preguntas  p
												INNER JOIN '.$this->session->especialidad.'_casos_clinicos cc
												on cc.id_caso_clinico=p.id_caso
											where p.numeracion="'.$id_pregunta.'" and p.id_caso='.$id_caso.'
								');
        if($id_pregunta_banco->num_rows() > 0){

        	$pregunta_banco =$id_pregunta_banco->row_array();

        	$registro_cc = $this->db->query('INSERT INTO casos_clinicos_aprobado
										(id_caso, contenido, id_tema, id_especialidad)
										VALUES
										("'.$pregunta_banco['id_caso_clinico'].'",
										"'.$pregunta_banco['caso_clinico'].'",
										"'.$pregunta_banco['id_tema'].'",
										'.$this->session->cg.'
										)
										ON DUPLICATE KEY UPDATE 
										id_caso = "'.$pregunta_banco['id_caso_clinico'].'",
										contenido= "'.$pregunta_banco['caso_clinico'].'",
										id_tema="'.$pregunta_banco['id_tema'].'",
										id_especialidad='.$this->session->cg.'
											;
								');

			$registro_p = $this->db->query('INSERT INTO preguntacc_aprobado
										(id_caso_banco, id_pregunta_banco, pregunta, a, b, c, d, e, respuesta, director, id_especialidad, examen_banco, accion, version)
										VALUES
										("'.$pregunta_banco['id_caso'].'",
										"'.str_replace("P","",$id_pregunta).'",
											 "'.$pregunta_banco['pregunta'].'", "'.$pregunta_banco['opcion_a'].'", "'.$pregunta_banco['opcion_b'].'", "'.$pregunta_banco['opcion_c'].'", "'.$pregunta_banco['opcion_d'].'", "'.$pregunta_banco['opcion_e'].'", "'.$pregunta_banco['respuesta'].'",
											 "'.$director.'",'.$this->session->cg.',
											 "'.$pregunta_banco['examen_banco'].'", "'.$pregunta_banco['accion'].'", "'.$pregunta_banco['version'].'"
										)
										ON DUPLICATE KEY UPDATE 
										id_caso_banco= "'.$pregunta_banco['id_caso'].'",
										id_pregunta_banco= "'.str_replace("P","",$id_pregunta).'",
										pregunta="'.$pregunta_banco['pregunta'].'",
										a="'.$pregunta_banco['opcion_a'].'",
										b="'.$pregunta_banco['opcion_b'].'",
										c="'.$pregunta_banco['opcion_c'].'",
										d="'.$pregunta_banco['opcion_d'].'",
										e="'.$pregunta_banco['opcion_e'].'",
										respuesta="'.$pregunta_banco['respuesta'].'",
										director="'.$director.'",
										id_especialidad='.$this->session->cg.',
										examen_banco="'.$pregunta_banco['examen_banco'].'",
										accion="'.$pregunta_banco['accion'].'",
										version="'.$pregunta_banco['version'].'"
								');

			if ($this->db->affected_rows()){
	            return TRUE;
	        }else{
	             return FALSE;
	        }

        }
        return FALSE;
	}

	public function get_password(){

		$query = $this->db->query('SELECT * FROM usuarios  where usuario="verificacion_reactivos"');
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return false;
	}

	public function get_pregunta_examen_actual_cc($id_pregunta){

		if ($this->session->cc==7) {
			$id_especialidad=5;
		}else{
			$id_especialidad=$this->session->cc;
		}

		if ($id_especialidad==2) {

			$query = $this->db->query('SELECT contenido_pregunta.* FROM (
												SELECT id_caso,  REPLACE(numeracion,"P","")as n_pregunta
									 			FROM '.$this->session->especialidad.'_cc_preguntas cc 
         										where id_pregunta='.$id_pregunta.'
         										)as numero_banco
         								inner join 
         								(
         								SELECT p.*, cc.contenido FROM caltecmx_cmgo.preguntacc p
         									inner join caltecmx_cmgo.casos_clinicos cc on
         									(cc.version_examen=p.version_examen and cc.n_caso=p.n_caso and p.especialidad=cc.especialidad)
         									WHERE  p.especialidad='.$id_especialidad.'
         								)as contenido_pregunta
         								on (numero_banco.id_caso=contenido_pregunta.id_caso_clinico_banco and numero_banco.n_pregunta=contenido_pregunta.n_pregunta)
         						');
		}else if ($id_especialidad==4) {

			$query = $this->db->query('SELECT * from (
											select cc.numeracion as numeracion_cc, REPLACE(p.numeracion,"P","")as n_pregunta, p.* from '.$this->session->especialidad.'_cc_preguntas p
													inner join '.$this->session->especialidad.'_casos_clinicos cc on p.id_caso=cc.id_Caso_clinico
													where p.id_pregunta='.$id_pregunta.' AND cc.examen_banco="EXAMEN_2019"
											)as dato_banco
											inner join (
												SELECT p.*, cc.contenido FROM caltecmx_cmgo.preguntacc p
													inner join caltecmx_cmgo.casos_clinicos cc on
													(cc.version_examen=p.version_examen and cc.n_caso=p.n_caso and p.especialidad=cc.especialidad)
													WHERE  p.especialidad='.$id_especialidad.'
											)as contenido_pregunta
										    on (contenido_pregunta.n_caso=dato_banco.numeracion_cc 
										    	and contenido_pregunta.n_pregunta=dato_banco.n_pregunta)

         						');
		}else{
			$query = $this->db->query('SELECT contenido_pregunta.* FROM (
												SELECT id_caso,  REPLACE(numeracion,"P","")as n_pregunta
									 			FROM '.$this->session->especialidad.'_cc_preguntas cc 
         										where id_pregunta='.$id_pregunta.'
         										)as numero_banco
         								inner join 
         								(
         								SELECT p.*, cc.contenido FROM caltecmx_cmgo.preguntacc p
         									inner join caltecmx_cmgo.casos_clinicos cc on
         									(cc.version_examen=p.version_examen and cc.n_caso=p.n_caso and p.especialidad=cc.especialidad)
         									WHERE  p.especialidad='.$id_especialidad.'
         								)as contenido_pregunta
         								on (numero_banco.id_caso=contenido_pregunta.n_caso and numero_banco.n_pregunta=contenido_pregunta.n_pregunta)
         						');
		}

        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return false;
	}

	public function get_imagen_pregunta_examen_actual($id_pregunta){

		if ($this->session->cc==7) {
			$id_especialidad=5;
		}else{
			$id_especialidad=$this->session->cc;
		}

		if ($id_especialidad==2) {

			$query = $this->db->query('SELECT CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen
										 from gyo_cc_preguntas banco 
										inner join caltecmx_cmgo.preguntacc cc on (banco.id_caso=cc.id_caso_clinico_banco and cc.n_pregunta=REPLACE(banco.numeracion,"P","") and cc.especialidad='.$id_especialidad.')
										inner join caltecmx_banco.imagenes_cc img  on
										(img.n_caso=cc.n_caso and img.n_pregunta=cc.n_pregunta and cc.version_examen=img.version_examen and img.especialidad=cc.especialidad)
										where cc.especialidad='.$id_especialidad.' and id_pregunta='.$id_pregunta.'');
		}else if ($id_especialidad==4) {

			$query = $this->db->query('SELECT CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen  from (
										select cc.numeracion as numeracion_cc, REPLACE(p.numeracion,"P","")as n_pregunta, p.* from mmf_cc_preguntas p
											inner join mmf_casos_clinicos cc on p.id_caso=cc.id_Caso_clinico
											where p.id_pregunta='.$id_pregunta.' AND cc.examen_banco="EXAMEN_2020"
											)as dato_banco
										inner join (
											SELECT p.*, cc.contenido FROM caltecmx_cmgo.preguntacc p
												inner join caltecmx_cmgo.casos_clinicos cc on
												(cc.version_examen=p.version_examen and cc.n_caso=p.n_caso and p.especialidad=cc.especialidad)
												WHERE  p.especialidad='.$id_especialidad.'
											)as contenido_pregunta
										on (contenido_pregunta.n_caso=dato_banco.numeracion_cc  and contenido_pregunta.n_pregunta=dato_banco.n_pregunta)
									    left join imagenes_cc img
									    on (img.n_caso=contenido_pregunta.n_caso and img.n_pregunta=contenido_pregunta.n_pregunta and img.especialidad='.$id_especialidad.')');
		}else{
			$query = $this->db->query('SELECT  CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen
											from '.$this->session->especialidad.'_cc_preguntas banco 
											inner join caltecmx_cmgo.preguntacc cc on (banco.id_caso=cc.n_caso and cc.n_pregunta=REPLACE(banco.numeracion,"P","")  and cc.especialidad='.$id_especialidad.')
											inner join caltecmx_banco.imagenes_cc img  on
											 (img.n_caso=cc.n_caso and img.n_pregunta=cc.n_pregunta and cc.version_examen=img.version_examen and img.especialidad=cc.especialidad)
											where cc.especialidad='.$id_especialidad.'  and img.n_pregunta!=0 
												and id_pregunta='.$id_pregunta.'
											group by id_imagen');
		}

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
  
	}

	public function get_imagen_caso_examen_actual($id_pregunta){

		if ($this->session->cc==7) {
			$id_especialidad=5;
		}else{
			$id_especialidad=$this->session->cc;
		}

		if ($id_especialidad==2) {

			$query = $this->db->query('SELECT  CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen
									 from gyo_cc_preguntas banco 
									inner join caltecmx_cmgo.preguntacc cc on (banco.id_caso=cc.id_caso_clinico_banco and cc.n_pregunta=REPLACE(banco.numeracion,"P","") and cc.especialidad='.$id_especialidad.')
									inner join caltecmx_banco.imagenes_cc img  on
										(img.n_caso=cc.n_caso  and cc.version_examen=img.version_examen 
											and img.especialidad=cc.especialidad)
									where cc.especialidad='.$id_especialidad.' and img.n_pregunta=0 
										and id_pregunta='.$id_pregunta.'
									group by id_imagen');
		}else if ($id_especialidad==4) {

			$query = $this->db->query('SELECT CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen  from (
										select cc.numeracion as numeracion_cc, REPLACE(p.numeracion,"P","")as n_pregunta, p.* from mmf_cc_preguntas p
											inner join mmf_casos_clinicos cc on p.id_caso=cc.id_Caso_clinico
											where p.id_pregunta='.$id_pregunta.' AND cc.examen_banco="EXAMEN_2020"
											)as dato_banco
										inner join (
											SELECT p.*, cc.contenido FROM caltecmx_cmgo.preguntacc p
												inner join caltecmx_cmgo.casos_clinicos cc on
												(cc.version_examen=p.version_examen and cc.n_caso=p.n_caso and p.especialidad=cc.especialidad)
												WHERE  p.especialidad='.$id_especialidad.'
											)as contenido_pregunta
										on (contenido_pregunta.n_caso=dato_banco.numeracion_cc  and contenido_pregunta.n_pregunta=dato_banco.n_pregunta)
									    left join imagenes_cc img
									    on (img.n_caso=contenido_pregunta.n_caso and img.n_pregunta=0 and img.especialidad='.$id_especialidad.')');
		}else{
			$query = $this->db->query('SELECT  CONCAT("'.$id_especialidad.'/",img.nombre_imagen)as nombre_imagen
											from '.$this->session->especialidad.'_cc_preguntas banco 
											inner join caltecmx_cmgo.preguntacc cc on (banco.id_caso=cc.n_caso and cc.n_pregunta=REPLACE(banco.numeracion,"P","")  and cc.especialidad='.$id_especialidad.')
											inner join caltecmx_banco.imagenes_cc img  on
											 (img.n_caso=cc.n_caso and cc.version_examen=img.version_examen and img.especialidad=cc.especialidad)
											where cc.especialidad='.$id_especialidad.'  and img.n_pregunta=0 
												and id_pregunta='.$id_pregunta.'
											group by id_imagen');
		}

        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
  
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
		if( $id_division=="TODAS" ){
			$query = $this->db->query('
				SELECT especialidades.id_especialidad, areas.*  FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'";');
		}else{
			$query = $this->db->get_where("areas",array("id_division"=>$id_division));
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

	public function getTemas($id_area,$id_division,$id_especialidad){
		if( $id_area!="TODAS" ){
			//Get Temas by Area
			$query = $this->db->get_where("temas",array("id_area"=>$id_area));
		}elseif( $id_division!="TODAS" ){
			//Get Temas by Division
			$query = $this->db->query('SELECT temas.*, divisiones.id_division FROM divisiones
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				WHERE divisiones.id_division = "'.$id_division.'";
				');
		}else{
			//Get Temas by Especialidad
			$query = $this->db->query('
				SELECT especialidades.id_especialidad, divisiones.id_division, temas.*  FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'";');
		}
		$temas = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$temas[]=$row;
			}
		}return $temas;
	}

	/*
	*******************************************
	***** DELETE **************************************
	***********************************************************
	*/

	public function delTema($id_tema){
		$del=$this->db->delete("temas",array("id_tema"=>$id_tema));
		return $del;
	}

	public function delPuntoClave($id_punto_clave){
		$del=$this->db->delete("temas_puntos_clave",array("id_punto_clave"=>$id_punto_clave));
		if($del){
			$this->db->delete($this->tb()."_cc_puntos_clave",array("id_punto_clave"=>$id_punto_clave));
		}
		return $del;
	}

	public function delPregunta($id){
		$del = $this->db->delete($this->tb()."_cc_preguntas",array("id_pregunta"=>$id));
		if($del){
			$this->db->delete($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id));
		}
		return $del;
	}



	/*
	*******************************************
	***** DATOS OPERATIVOS ****************************
	***********************************************************
	*/

	/*
	public function getComplejidadesCognitivas(){
		$query = $this->db->get("cc_complejidades_cognitivas");
		$dts = "";
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $value) {
				$dts.='<option value="'.$value->id_complejidad_cognitiva.'">'.$value->complejidad_cognitiva.'</option>';
			}
		}return $dts;
	}

	public function getPeriodosVida(){
		$query = $this->db->get("cc_periodos_vida");
		$dts = "";
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $value) {
				$dts.='<option value="'.$value->id_periodo_vida.'">'.$value->periodo_vida.'</option>';
			}
		}return $dts;
	} */


	/*
	*******************************************
	***** ADD DATA ************************************
	***********************************************************
	*/

	public function addTema($data){
		$id=false;
		$add = $this->db->insert("temas",$data);
		if($add){
			$query = $this->db->query("SELECT LAST_INSERT_ID() AS id FROM temas;");
			if( $query->num_rows() > 0 ){
				foreach($query->result() as $value){
					$id = $value->id;
				}
			}
		}
		return $id;
	}

	public function addPuntosClave($data){
		$add = $this->db->insert_batch("temas_puntos_clave",$data);
		return $add;
	}

	public function addObjetivo($data){
		$add = $this->db->insert("temas_objetivos",$data);
		return $add;
	}

	public function addPregunta($data,$pts){
		$add = $this->db->insert($this->tb()."_cc_preguntas",$data);
		if( $add ){
			$query = $this->db->query("SELECT LAST_INSERT_ID() AS id FROM ".$this->tb()."_cc_preguntas;");
			$id=0;
			if( $query->num_rows() > 0 ){
				foreach($query->result() as $value){
					$id = $value->id;
				}
			}
			foreach ($pts as $v) {
				$this->db->insert($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id,"id_punto_clave"=>$v));
			}
			$add = $id;
		}return $add;
	}


	/*
	*******************************************
	***** GET DATA ************************************
	***********************************************************
	*/
	public function getTema($id_tema){
		$query = $this->db->query('SELECT temas.*, especialidades.id_especialidad, divisiones.id_division FROM temas
			JOIN areas ON areas.id_area = temas.id_area
			JOIN divisiones ON divisiones.id_division = areas.id_division
			JOIN especialidades ON especialidades.id_especialidad = divisiones.id_especialidad
			WHERE temas.id_tema="'.$id_tema.'";');
		$tema = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$s="";
				$div = "";
				$ar = "";
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
				$row["id_division"]=$div;
				$row["id_area"]=$ar;
				$row["objetivo"]=$this->getObjetivoByTema($row["id_tema"]);
				$row["puntos_clave"]=$this->getPuntosClaveByTema($row["id_tema"]);
				$tema=$row;
			}
		}return $tema;
	}

	public function getPreguntas($id_tema,$id_area,$id_division,$id_especialidad){
		if( $id_tema!="TODAS" ){
			//Get Temas by Tema
			$query = $this->db->query('
				SELECT temas.id_tema, '.$this->tb().'_cc_preguntas.*, '.$this->tb().'_casos_clinicos.examen_banco AS st FROM temas
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE temas.id_tema ="'.$id_tema.'" ORDER BY '.$this->tb().'_cc_preguntas.id_caso, '.$this->tb().'_cc_preguntas.numeracion;');
		}elseif( $id_area!="TODAS" ){
			//Get Temas by Area
			$query = $this->db->query('
				SELECT areas.id_area, temas.id_tema, '.$this->tb().'_cc_preguntas.*, '.$this->tb().'_casos_clinicos.examen_banco AS st FROM areas
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE areas.id_area = "'.$id_area.'" ORDER BY '.$this->tb().'_cc_preguntas.id_caso, '.$this->tb().'_cc_preguntas.numeracion;');
			
		}elseif( $id_division!="TODAS" ){
			//Get Temas by Division
			$query = $this->db->query('
				SELECT divisiones.id_division,areas.id_area, temas.id_tema, '.$this->tb().'_cc_preguntas.*, '.$this->tb().'_casos_clinicos.examen_banco AS st FROM divisiones
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE divisiones.id_division = "'.$id_division.'" ORDER BY '.$this->tb().'_cc_preguntas.id_caso, '.$this->tb().'_cc_preguntas.numeracion;');
		}else{
			//Get Temas by Especialidad
			$query = $this->db->query('
				SELECT especialidades.id_especialidad,divisiones.id_division,areas.id_area, temas.id_tema, '.$this->tb().'_cc_preguntas.*, '.$this->tb().'_casos_clinicos.examen_banco AS st FROM especialidades
				JOIN divisiones ON divisiones.id_especialidad = especialidades.id_especialidad
				JOIN areas ON areas.id_division = divisiones.id_division
				JOIN temas ON temas.id_area = areas.id_area
				JOIN '.$this->tb().'_casos_clinicos ON '.$this->tb().'_casos_clinicos.id_tema = temas.id_tema
				JOIN '.$this->tb().'_cc_preguntas ON '.$this->tb().'_cc_preguntas.id_caso = '.$this->tb().'_casos_clinicos.id_caso_clinico
				WHERE especialidades.id_especialidad = "'.$id_especialidad.'" ORDER BY '.$this->tb().'_cc_preguntas.id_caso, '.$this->tb().'_cc_preguntas.numeracion;');

		}
		$preguntas = array();
		$cont=0;
		$pc_tema = array();
		$pc_pregunta = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$pc_tema = $this->getPuntosClaveTema($row['id_tema']);
				$pc_pregunta = $this->getPuntosClavePregunta($row['id_pregunta']);
				$pc='<table><tbody><tr style="font-size:10px;background-color:inherit;">';
				foreach ($pc_tema as $key => $value) {
					if( array_key_exists("$key", $pc_pregunta) ){ 
						$pc.='<td style="padding:4px;">'.$value['numeracion'].'<br><input type="checkbox" checked="checked" onClick="changeCHK('.$row['id_pregunta'].','.$value['id_punto_clave'].',this)"></td>';
					}else{
						$pc.='<td style="padding:4px;">'.$value['numeracion'].'<br><input type="checkbox" onClick="changeCHK('.$row['id_pregunta'].','.$value['id_punto_clave'].',this)"></td>';
					}
				}
				$pc.='</tr></tbody></table>';
				$row["pc"]=$pc;
				$preguntas[]=$row;
			}
		}return $preguntas;
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

	public function getObjetivoByTema($idTema){
		$objetivo="";
		$query = $this->db->get_where("temas_objetivos",array("id_tema"=>$idTema));
		if( $query->num_rows() > 0 ){
			foreach($query->result_array() as $row){
				$objetivo = $row["objetivo"];
			}
		}return $objetivo;
	}

	public function getPuntosClaveByTema($idTema){
		$pc='<table class="table table-striped table-condensed" id="updTable"><tbody>';
		$query = $this->db->get_where("temas_puntos_clave",array("id_tema"=>$idTema));
		$cont=0;
		if( $query->num_rows() > 0 ){
			foreach($query->result_array() as $row){
				$cont=str_replace("PC","",$row["numeracion"]);

				$pc.='
				<tr id="updRow'.$cont.'">
					<input name="PC[]" value="'.$cont.'_'.$row['punto_clave'].'" type="hidden">
					<td>'.$row['numeracion'].'</td>
					<td>'.$row['punto_clave'].'</td>
					<td>
						<button type="button" class="btn btn-danger btn-sm pull-right" onclick="delPC(\'updRow'.$cont.'\',\'upd\',\''.$row['id_punto_clave'].'\')">
							<i class="glyphicon glyphicon-minus-sign"></i>
						</button>
					</td>
				</tr>';
			}
		}return $pc.'</tbody><input id="updContador" value="'.($cont+1).'" type="hidden"><input id="updIdTema" value="'.$idTema.'" type="hidden"></table>';
	}

	public function addPuntoClave($data){
		$add = $this->db->insert("temas_puntos_clave",$data);
		if( $add ){
			$id=0;
			$query = $this->db->query("SELECT LAST_INSERT_ID() AS id FROM temas_puntos_clave;");
			if( $query->num_rows() > 0 ){
				foreach($query->result() as $value){
					$id = $value->id;
				}
			}
			$query2 = $this->db->get_where("temas_puntos_clave",array("id_punto_clave"=>$id));
			if( $query2->num_rows() > 0 ){
				foreach($query2->result_array() as $row){
					
					$cont=str_replace("PC","",$row["numeracion"]);
					$add='
					<tr id="updRow'.$cont.'">
						<input name="PC[]" value="'.$cont.'_'.$row['punto_clave'].'" type="hidden">
						<td>'.$row['numeracion'].'</td>
						<td>'.$row['punto_clave'].'</td>
						<td>
							<button type="button" class="btn btn-danger btn-sm pull-right" onclick="delPC(\'updRow'.$cont.'\',\'upd\',\''.$row['id_punto_clave'].'\')">
								<i class="glyphicon glyphicon-minus-sign"></i>
							</button>
						</td>
					</tr>';
				}
			}
		}
		return $add;
	}

	public function updPreguntaPC($id_pregunta,$id_punto_clave,$tipo){
		$upd=false;
		$query = $this->db->get_where($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id_pregunta,"id_punto_clave"=>$id_punto_clave));
		if($tipo=="SI"){
			if($query->num_rows() > 0){
				//Ya existe
			}else{
				$upd = $this->db->insert($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id_pregunta,"id_punto_clave"=>$id_punto_clave));
			}
		}else{
			$upd = $this->db->delete($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id_pregunta,"id_punto_clave"=>$id_punto_clave));
		}
		return $upd;
	}

	public function getDatosOperativos($id_tema){
		$id_caso="";
		$casos = $this->getQuery($this->tb()."_casos_clinicos",array("id_tema"=>$id_tema));
		foreach ($casos as $v_casos) {
			$id_caso.='<option value="'.$v_casos['id_caso_clinico'].'">'.$v_casos['caso_clinico'].'</option>';
		}
		//---
		$id_complejidad_cognitiva="";
		$cc = $this->getQuery("complejidades_cognitivas",false);
		foreach ($cc as $cc_v) {
			$id_complejidad_cognitiva.='<option value="'.$cc_v['id_complejidad_cognitiva'].'">'.$cc_v['complejidad_cognitiva'].'</option>';
		}
		//---
		$id_periodo_vida="";
		$pv = $this->getQuery("periodos_vida",false);
		foreach ($pv as $v_pv) {
			$id_periodo_vida.='<option value="'.$v_pv['id_periodo_vida'].'">'.$v_pv['periodo_vida'].'</option>';
		}
		//---
		$puntos_clave='<table class="table table-striped table-condensed"><thead><tr><th colspan="3">PUNTOS CLAVE</th></tr></thead><tbody>';

		$pc = $this->getQuery("temas_puntos_clave",array("id_tema"=>$id_tema));
		foreach ($pc as $v_pc) {
			$puntos_clave.='
				<tr>
					<td>'.$v_pc['numeracion'].'</td>
					<td>'.$v_pc['punto_clave'].'</td>
					<td>
						<input type="checkbox" name="pc[]" value="'.$v_pc['id_punto_clave'].'">
					</td>
				</tr>';
		}
		$puntos_clave.='</tbody></table>';
		//---
		$id_bibliografia='<option value="0">Ninguna</option>';
		// $biblio = $this->getQuery("bibliografias",false);
		// foreach ($biblio as $v_b) {
		// 	$id_bibliografia.='<option value="'.$v_b['id_bibliografia'].'">'.$v_b['bibliografia'].'</option>';
		// }
		$set = $this->db->query('SET SQL_MODE="";');
		// $biblio = array();
        $query = $this->db->query('SELECT * from (
										SELECT b.id_bibliografia, b.bibliografia, cg.capitulo  FROM caltecmx_banco.bibliografias b
											inner  join caltecmx_banco.'.$this->session->especialidad.'_cg_preguntas cg 
												on cg.id_bibliografia=b.id_bibliografia
											union
										SELECT b.id_bibliografia, b.bibliografia, cc.capitulo FROM caltecmx_banco.bibliografias b
											inner  join caltecmx_banco.'.$this->session->especialidad.'_cc_preguntas cc 
											on cc.id_bibliografia=b.id_bibliografia
										union
										SELECT id_bibliografia, bibliografia, capitulo FROM caltecmx_banco.bibliografias
										where id_especialidad='.$this->session->cc.'
									)as resumen
									group by id_bibliografia
									order by bibliografia');
		if( $query->num_rows() > 0 ){
			foreach ( $query->result_array() as $v_b ){
				// $biblio[]=$row;
				$id_bibliografia.='<option value="'.$v_b['id_bibliografia'].'">'.$v_b['bibliografia'].'</option>';
			}
		}

		$data=array(
			//"id_caso"=>$id_caso,
			"id_complejidad_cognitiva2"=>$id_complejidad_cognitiva,
			"id_periodo_vida2"=>$id_periodo_vida,
			"puntos_clave2"=>$puntos_clave,
			"id_bibliografia2"=>$id_bibliografia
			);
		return $data;
	}

	public function getCasoPreguntas($id_caso){
		$caso = array();
		$query = $this->db->query("
			SELECT caso_clinico,examen_banco,id_caso_clinico as numeracion,imagen_url,id_caso_clinico
			FROM ".$this->tb()."_casos_clinicos 
			WHERE id_caso_clinico = ".$id_caso.";");
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$idps = $this->getIdPreguntasByCaso($row['id_caso_clinico']);
				foreach ($idps as $key => $v) {
					$row["$key"]=$v;
				}
				$caso=$row;
			}
		}return $caso;
	}

	public function getIdPreguntasByCaso($id_caso){
		$query = $this->db->query('SELECT id_pregunta, numeracion FROM '.$this->tb().'_cc_preguntas WHERE id_caso = "'.$id_caso.'";');
		$dts=array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $v) {
				$dts[$v->numeracion]=$v->id_pregunta;
			}
		}return $dts;
	}

	public function getPregunta($id_pregunta){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_cc_preguntas WHERE id_pregunta = "'.$id_pregunta.'";');
		$pregunta = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$pregunta=$row;
			}
			//--- Casos
			$id_tema=0;
			$cs = $this->getCasosByCaso($row['id_caso']);
			$id_caso_clinico="";
			$header_caso="";
			foreach ($cs as $key => $cs_v) {
				$id_tema=$cs_v['id_tema'];
				$selected="";
				if( $cs_v['id_caso_clinico']==$row['id_caso'] ){
					$selected="selected";
					$header_caso=$row['id_caso'];
				}
				$id_caso_clinico.='<option value="'.$cs_v['id_caso_clinico'].'" '.$selected.'>'.$cs_v['caso_clinico'].'</option>';
			}
			//--- Get Division(es)|Area(s)|Tema(s)
			$DAT = $this->getDAT($id_tema);
			//---
			$id_complejidad_cognitiva="";
			$cc = $this->getQuery("complejidades_cognitivas",false);
			foreach ($cc as $cc_v) {
				$s2="";
				if( $cc_v['id_complejidad_cognitiva']==$row["id_complejidad_cognitiva"] ){$s2="selected";}
				$id_complejidad_cognitiva.='<option value="'.$cc_v['id_complejidad_cognitiva'].'" '.$s2.'>'.$cc_v['complejidad_cognitiva'].'</option>';
			}
			//---
			$id_periodo_vida="";
			$pv = $this->getQuery("periodos_vida",false);
			foreach ($pv as $v_pv) {
				$s3="";
				if($v_pv["id_periodo_vida"]==$row["id_periodo_vida"]){ $s3="selected"; }
				$id_periodo_vida.='<option value="'.$v_pv['id_periodo_vida'].'" '.$s3.'>'.$v_pv['periodo_vida'].'</option>';
			}
			//---
			$puntos_clave='<table class="table table-striped table-condensed"><thead><tr><th colspan="3">PUNTOS CLAVE</th></tr></thead><tbody>';
			$pc = $this->getPuntosClaveTema($id_tema);
			$pc_pregunta = $this->getPuntosClavePregunta($row['id_pregunta']);
			foreach ($pc as $key => $v_pc) {
				$s4="";
				if( array_key_exists("$key", $pc_pregunta) ){ $s4='checked="checked"'; }
				$puntos_clave.='
					<tr>
						<td>'.$v_pc['numeracion'].'</td>
						<td>'.$v_pc['punto_clave'].'</td>
						<td>
							<input type="checkbox" onClick="changeCHK('.$row['id_pregunta'].','.$v_pc['id_punto_clave'].',this)" '.$s4.'>
						</td>
					</tr>';
			}
			$puntos_clave.='</tbody></table>';
			//---
			$id_bibliografia='<option value="0">Ninguna</option>';
			// $biblio = $this->getQuery("bibliografias",false);
			$set = $this->db->query('SET SQL_MODE="";');
			$biblio = array();
	        $query = $this->db->query('SELECT * from (
											SELECT b.id_bibliografia, b.bibliografia, cg.capitulo  FROM caltecmx_banco.bibliografias b
												inner  join caltecmx_banco.'.$this->session->especialidad.'_cg_preguntas cg 
													on cg.id_bibliografia=b.id_bibliografia
												union
											SELECT b.id_bibliografia, b.bibliografia, cc.capitulo FROM caltecmx_banco.bibliografias b
												inner  join caltecmx_banco.'.$this->session->especialidad.'_cc_preguntas cc 
												on cc.id_bibliografia=b.id_bibliografia
											union
											SELECT id_bibliografia, bibliografia, capitulo FROM caltecmx_banco.bibliografias
											where id_especialidad='.$this->session->cc.'
										)as resumen
										group by id_bibliografia
										order by bibliografia');

			if( $query->num_rows() > 0 ){
				foreach ( $query->result_array() as $row1 ){
					$biblio[]=$row1;
				}
			}
			foreach ($biblio as $v_b) {
				$s5="";
				if( $v_b['id_bibliografia']==$row['id_bibliografia'] ){ $s5='selected'; }
				$id_bibliografia.='<option value="'.$v_b['id_bibliografia'].'" '.$s5.'>'.$v_b['bibliografia'].'</option>';
			}
			//---
			$st="";
			$estatus="";
			if( $pregunta['examen_banco']=="EXAMEN" ){
				$estatus="EXAMEN";
				$st.='
					<option value="EXAMEN" selected>EXAMEN</option>
					<option value="EXAMEN_2019">EXAMEN_2019</option>
					<option value="EXAMEN_2020" >EXAMEN_2020</option>
					<option value="BANCO" >BANCO</option>
					<option value="PILOTO" >PILOTO</option>
					<option value="PILOTO_2020" >PILOTO_2020</option>
					<option value="RESERVA" >RESERVA</option>
				';
			}elseif($pregunta["examen_banco"]=="EXAMEN_2019"){
				$estatus="EXAMEN_2019";
				$st.='
					<option value="EXAMEN">EXAMEN</option>
					<option value="EXAMEN_2019" selected>EXAMEN_2019</option>
					<option value="EXAMEN_2020">EXAMEN_2020</option>
					<option value="BANCO">BANCO</option>
					<option value="PILOTO" PILOTO</option>
					<option value="PILOTO_2020">PILOTO_2020</option>
				';
			}elseif($pregunta["examen_banco"]=="EXAMEN_2020"){
				$estatus="EXAMEN_2020";
				$st.='
					<option value="EXAMEN">EXAMEN</option>
					<option value="EXAMEN_2019" >EXAMEN_2019</option>
					<option value="EXAMEN_2020" selected>EXAMEN_2020</option>
					<option value="BANCO" >BANCO</option>
					<option value="PILOTO">PILOTO</option>
					<option value="PILOTO_2020">PILOTO_2020</option>
				';
			
			}
			elseif( $pregunta["examen_banco"]=="BANCO" ){
				$estatus="BANCO";
				$st.='
					<option value="EXAMEN">EXAMEN</option>
					<option value="EXAMEN_2019">EXAMEN_2019</option>
					<option value="EXAMEN_2020">EXAMEN_2020</option>
					<option value="BANCO" selected>BANCO</option>
					<option value="PILOTO">PILOTO</option>
					<option value="PILOTO_2020">PILOTO_2020</option>
					<option value="RESERVA">RESERVA</option>
				';
			}elseif($pregunta["examen_banco"]=="PILOTO"){
				$estatus="PILOTO";
				$st.='
					<option value="EXAMEN" >EXAMEN</option>
					<option value="EXAMEN_2019" >EXAMEN_2019</option>
					<option value="EXAMEN_2019" >EXAMEN_2020</option>
					<option value="BANCO" >BANCO</option>
					<option value="PILOTO" selected>PILOTO</option>
					<option value="PILOTO_2020">PILOTO_2020</option>
					<option value="RESERVA">RESERVA</option>
				';
			}elseif($pregunta["examen_banco"]=="PILOTO_2020"){
				$estatus="PILOTO_2020";
				$st.='
					<option value="EXAMEN" >EXAMEN</option>
					<option value="EXAMEN_2019" >EXAMEN_2019</option>
					<option value="EXAMEN_2019" >EXAMEN_2020</option>
					<option value="BANCO" >BANCO</option>
					<option value="PILOTO">PILOTO</option>
					<option value="PILOTO_2020" selected>PILOTO_2020</option>
					<option value="RESERVA">RESERVA</option>
				';
			}elseif($pregunta["examen_banco"]=="RESERVA"){
				$estatus="RESERVA";
				$st.='
					<option value="EXAMEN" disabled>EXAMEN</option>
					<option value="BANCO" disabled>BANCO</option>
					<option value="PILOTO" disabled>PILOTO</option>
					<option value="RESERVA" selected>RESERVA</option>
				';
			}
			$pregunta['id_division']=$DAT['divisiones'];
			$pregunta['id_area']=$DAT['areas'];
			$pregunta['id_tema']=$DAT['temas'];
			$pregunta['id_caso']=$id_caso_clinico;
			$pregunta['header_caso']=$header_caso;
			$pregunta['header_pregunta']=$pregunta['numeracion'];
			$pregunta['header_url2']=$pregunta['imagen_url'];
			$pregunta['header_url']=$this->getURL($header_caso);
			$pregunta['id_complejidad_cognitiva']=$id_complejidad_cognitiva;
			$pregunta['id_periodo_vida']=$id_periodo_vida;
			$pregunta['puntos_clave']=$puntos_clave;
			$pregunta['id_bibliografia']=$id_bibliografia;
			$pregunta['examen_banco']=$st;
			$pregunta['examen_banco_st']= (empty($estatus)) ? "BANCO" : $estatus;
			$pregunta['accion']= (empty($pregunta['accion'])) ? "0" : $pregunta['accion'] ;
			$pregunta['accion_comentario']= (empty($pregunta['accion_comentario'])) ? "0" : $pregunta['accion_comentario'] ;
		}
		return $pregunta;
	}

	public function contarPreguntas($id_caso){
		$query = $this->db->get_where($this->tb()."_cc_preguntas",array("id_caso"=>$id_caso));
		return $query->num_rows();
	}


	/** UPDATES **/
	public function updPregunta($data,$id_pregunta){
		$upd = $this->db->update($this->tb()."_cc_preguntas",$data,array("id_pregunta"=>$id_pregunta));
		$msg = "Registro editado correctamente.";
		return array('upd'=>$upd,'msg'=>$msg);
	}

	public function updTema($id_tema,$data){
		$upd = $this->db->update("temas",$data,array("id_tema"=>$id_tema));
		return $upd;
	}

	public function updObjetivo($id_tema,$data){
		$query = $this->db->get_where("temas_objetivos",array("id_tema"=>$id_tema));
		if( $query->num_rows() > 0 ){
			$upd = $this->db->update("temas_objetivos",$data,array("id_tema"=>$id_tema));
		}else{
			$upd = $this->db->insert("temas_objetivos",$data);
		}
		return $upd;
	}



	/*AUX*/
	public function getPuntosClaveTema($id_tema){
		$pc=array();
		$query = $this->db->get_where("temas_puntos_clave",array("id_tema"=>$id_tema));
		if( $query->num_rows() > 0 ){
			foreach($query->result_array() as $row){
				$pc[$row['id_punto_clave']] = $row;
			}
		}return $pc;
	}

	public function getPuntosClavePregunta($id_pregunta){
		$pc=array();
		$query = $this->db->get_where($this->tb()."_cc_puntos_clave",array("id_pregunta"=>$id_pregunta));
		if( $query->num_rows() > 0 ){
			foreach($query->result() as $value){
				$pc[$value->id_punto_clave] = $value->id_punto_clave;
			}
		}return $pc;
	}

	public function getQuery($tabla,$where){
		$dts = array();
		if($where){
			$query = $this->db->get_where($tabla,$where);
		}else{
			$query = $this->db->get($tabla);
		}
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$dts[]=$row;
			}
		}return $dts;
	}

	public function getCasosByCaso($id_caso){
		$query = $this->db->query('SELECT id_tema FROM '.$this->tb().'_casos_clinicos WHERE id_caso_clinico="'.$id_caso.'";');
		$id_tema = 0;
		$dts = array();
		if( $query->num_rows() > 0 ){
			foreach ($query->result_array() as $row) {
				$id_tema=$row['id_tema'];
			}
			$casos = $this->db->query('SELECT id_tema,id_caso_clinico, caso_clinico FROM '.$this->tb().'_casos_clinicos WHERE id_tema ="'.$id_tema.'";');
			if( $casos->num_rows() > 0 ){
				foreach ($casos->result_array() as $caso) {
					$dts[]=$caso;
				}
			}
		}return $dts;
	}

	public function get_preguntas_piloto(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_cc_preguntas WHERE id_pregunta > 200 AND id_pregunta < 226;');
		return $query->result_array();
	}

	public function get_preguntas_examen(){
		$query = $this->db->query('SELECT * FROM '.$this->tb().'_cc_preguntas WHERE id_pregunta < 201;');
		return $query->result_array();
	}

	private function getDAT($id_tema){
		$id_division=0;
		$id_area=0;
		$dts = array();
		$ids = $this->db->query('
			SELECT temas.id_tema, areas.id_area, divisiones.id_division 
			FROM temas
			JOIN areas ON areas.id_area = temas.id_area
			JOIN divisiones ON divisiones.id_division = areas.id_division
			WHERE temas.id_tema = '.$id_tema.';
			')->result_array();
		foreach($ids as $key0 => $v){
			$id_division=$v['id_division'];
			$id_area=$v['id_area'];
		}
		//--
		$divs = "";
		$divs_query = $this->db->get_where("divisiones",array("id_especialidad"=>$this->session->cc))->result_array();
		foreach($divs_query as $key1 => $d){
			$divs.='<option value="'.$d['id_division'].'" '.(($d["id_division"]==$id_division)?"selected":"").'>'.$d['division'].'</option>';
		}
		//--
		$ars = "";
		$ars_query = $this->db->get_where("areas",array("id_division"=>$id_division))->result_array();
		foreach ($ars_query as $key2 => $a) {
			$ars.='<option value="'.$a['id_area'].'" '.(($a["id_area"]==$id_area)?"selected":"").'>'.$a['area'].'</option>';
		}
		//--
		$tms = "";
		$tms_query = $this->db->get_where("temas",array("id_area"=>$id_area))->result_array();
		foreach ($tms_query as $key3 => $t){
			$tms.='<option value="'.$t['id_tema'].'" '.(($t["id_tema"]==$id_tema)?"selected":"").'>'.$t['tema'].'</option>';
		}
		return array("divisiones"=>$divs,"areas"=>$ars,"temas"=>$tms);
	}

	private function getURL($id_caso){
		$query = $this->db->query('SELECT imagen_url FROM '.$this->tb().'_casos_clinicos WHERE id_caso_clinico = '.$id_caso.';')->result_array();
		$id="";
		foreach ($query as $key => $value) {
			$id = $value["imagen_url"];
		} return $id;
	}
}