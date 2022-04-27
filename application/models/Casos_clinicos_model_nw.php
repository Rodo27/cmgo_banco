<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Casos_clinicos_model_nw extends CI_Model {

	private function tb(){
		return $this->session->especialidad;
	}

	public function get_rubrica($id_pregunta){

		$query = $this->db->query('SELECT * FROM '.$this->session->especialidad.'_cc_preguntas
									where id_pregunta='.$id_pregunta.'');
        return $query->row_array();
	}

	public function getTabla($id_division, $id_area, $id_tema, $id_estatus, $id_accion){
			
			if(empty($id_division))
			{
			   $like_division = " like '%%'";
   
			}
			else{
				$like_division = " = ".$id_division."";
			}
			if(empty($id_area))
			{
			   $like_area = " like '%%'";
   
			}
			else{
				$like_area = " = ".$id_area."";
			}
			if(empty($id_tema))
			{
			   $like_tema = " like '%%'";
   
			}
			else{
				$like_tema = " = ".$id_tema."";
			}
			if(empty($id_estatus))
			{
			   $like_estatus = " like '%%'";
   
			}
			else{
				$like_estatus = " = ".$id_estatus."";
			}
			if(empty($id_accion))
			{
			   $like_accion = " like '%%'";
   
			}
			else{
				$like_accion = " = ".$id_accion."";
			}
			
		   $query = $this->db->query("SELECT cc.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave, caso.* FROM 
		   ".$this->session->especialidad."_cc_preguntas AS cc
		   INNER JOIN catalogo_estatus e ON e.id_estatus = cc.id_estatus
		   INNER JOIN catalogo_accion a ON a.id_accion = cc.id_accion
		   LEFT JOIN ".$this->session->especialidad."_casos_clinicos caso ON cc.id_caso = id_caso_clinico
		   LEFT JOIN pregunta_pc p ON cc.id_pregunta = p.id_pregunta
		   INNER JOIN temas t ON t.id_tema = caso.id_tema
           INNER JOIN areas ar ON ar.id_area = t.id_area
		   WHERE ar.id_division ".$like_division." AND ar.id_area ".$like_area." 
		   AND t.id_tema ".$like_tema." 
		   AND cc.id_estatus ".$like_estatus."
		   AND cc.id_accion ".$like_accion."
		   GROUP BY cc.id_pregunta
		   ORDER BY cc.id_caso, cc.id_pregunta");

			/*
			SELECT cc.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave, caso.* FROM 
		   gyo_cc_preguntas AS cc
		   INNER JOIN catalogo_estatus e ON e.id_estatus = cc.id_estatus
		   INNER JOIN catalogo_accion a ON a.id_accion = cc.id_accion
			LEFT JOIN gyo_casos_clinicos caso ON cc.id_caso = id_caso_clinico
		   INNER JOIN temas t ON t.id_tema = caso.id_tema
           INNER JOIN areas ar ON ar.id_area = t.id_area
			LEFT JOIN pregunta_pc p ON cc.id_pregunta = p.id_pregunta
		   WHERE ar.id_division like '%%' AND ar.id_area like '%%' 
		   AND t.id_tema like '%%'
		   AND cc.id_estatus like '%%'
		   AND cc.id_accion like '%%'
		   GROUP BY cc.id_pregunta
		   ORDER BY cc.id_caso, cc.id_pregunta;




			*/



		   
			//print_r($this->db->last_query());
	
		   return $query->result_array();
		  
	}

	public function getPuntosClave($id_tema, $id_caso, $id_pregunta){
        $query = $this->db->query("SELECT tpc.id_punto_clave, tpc.numeracion, tpc.punto_clave 
		FROM temas_puntos_clave tpc 
		INNER JOIN temas t ON tpc.id_tema = t.id_tema
		WHERE tpc.id_tema = ".$id_tema." 
		");

        return $query->result_array();
    }

	public function getPuntosChecked($id_caso, $id_pregunta){

		$query = $this->db->query('SELECT id_punto_clave FROM pregunta_pc
                                WHERE id_pregunta = '.$id_pregunta.'
                                AND id_especialidad = '.$this->session->cg.'
								AND n_caso = '.$id_caso.'');

        return $query->result_array();
	}

    public function getDivisiones(){
        $query = $this->db->query('SELECT id_division, division FROM divisiones WHERE id_especialidad='.$this->session->cg.'');
        return $query->result_array();
    }

    public function getAreas(){
        $query = $this->db->query('SELECT id_area, area FROM divisiones LEFT JOIN areas USING(id_division) WHERE id_especialidad='.$this->session->cg.'');
        return $query->result_array();
    }

    public function getTemas($id_area){
        $query = $this->db->query('SELECT id_tema, tema FROM temas WHERE id_area ='.$id_area.'');
        return $query->result_array();
    }

    public function getCognitivas(){
        $query = $this->db->query('SELECT id_complejidad_cognitiva, complejidad_cognitiva FROM complejidades_cognitivas');
        return $query->result_array();
    }

    public function getPeriodos(){
        $query = $this->db->query('SELECT id_periodo_vida, periodo_vida FROM periodos_vida');
        return $query->result_array();
    }

    public function getEstatus(){
        $query = $this->db->query('SELECT id_estatus, catalogo_estatus FROM catalogo_estatus');
        return $query->result_array();
    }

    public function getAcciones(){
        $query = $this->db->query('SELECT id_accion, catalogo_accion FROM catalogo_accion');
        return $query->result_array();
    }

	public function getCasos($id_tema){
		$query = $this->db->query('SELECT *
		FROM '.$this->session->especialidad.'_casos_clinicos
		WHERE id_tema = '.$id_tema.'');
        return $query->result_array();
	}

	public function get_password(){

		$query = $this->db->query('SELECT * FROM usuarios  where usuario="verificacion_reactivos"');
        
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return false;
	}

	public function getCasoClinico($id_caso, $id_pregunta){

        $query = $this->db->query('SELECT cc.*, d.id_division, a.id_area, caso.* FROM '.$this->session->especialidad.'_cc_preguntas cc
       
        INNER JOIN catalogo_estatus e ON e.id_estatus = cc.id_estatus
        INNER JOIN catalogo_accion ac ON ac.id_accion = cc.id_accion
		LEFT JOIN gyo_casos_clinicos caso ON cc.id_caso = id_caso_clinico
		INNER JOIN temas t ON t.id_tema = caso.id_tema
		INNER JOIN areas a ON a.id_area = t.id_area
        INNER JOIN divisiones d ON d.id_division = a.id_division
      
        WHERE id_caso = '.$id_caso.'
		AND id_pregunta = '.$id_pregunta.'
		;');
		/*
		 INNER JOIN temas t ON t.id_tema = cc.id_tema
        INNER JOIN areas a ON a.id_area = t.id_area
        INNER JOIN divisiones d ON d.id_division = a.id_division
        INNER JOIN catalogo_estatus e ON e.id_estatus = cc.id_estatus
        INNER JOIN catalogo_accion ac ON ac.id_accion = cc.id_accion
		LEFT JOIN gyo_casos_clinicos caso ON cc.id_caso = id_caso_clinico
		
		*/
		//LEFT JOIN gyo_casos_clinicos caso USING(id_caso)
		//ON cc.id_caso = id_caso_clinico

        return $query->row_array();
    }

	public function getCasoClinicoAprobado($id_caso){

		$query = $this->db->query('SELECT *
		FROM casos_clinicos_aprobado
        WHERE id_caso = '.$id_caso.';');

        return $query->row_array();

	}

	public function registroPreguntaCC($datos){
		
		$numeracion = $this->db->query('SELECT (MAX(numeracion)+1) as numeracion 
		FROM '.$this->session->especialidad.'_cc_preguntas');

		foreach($numeracion->result_array() AS $row) {
			$dato_numeracion = $row['numeracion'];
		}


		$query = $this->db->query('INSERT INTO '.$this->session->especialidad.'_cc_preguntas
        (id_estatus,id_accion,id_tema,id_complejidad_cognitiva,id_periodo_vida,
        pregunta,opcion_a,opcion_b,opcion_c,opcion_d,opcion_e,respuesta,
		id_bibliografia,capitulo, numeracion,id_caso)
        VALUES('.$datos['id_estatus'].','.$datos['id_accion'].','.$datos['id_tema'].','.$datos['id_complejidad_cognitiva'].
        ','.$datos['id_periodo_vida'].',"'.$datos['pregunta'].'","'.$datos['opcion_a'].
        '","'.$datos['opcion_b'].'","'.$datos['opcion_c'].'","'.$datos['opcion_d'].'","'.$datos['opcion_e'].
        '","'.$datos['respuesta'].'",'.$datos['id_bibliografia'].',
		"'.$datos['capitulo'].'",
		"'.$dato_numeracion.'",
		'.$datos['id_caso'].')');

        $id_pregunta_nueva = $this->db->insert_id();

        $pc = explode(",", $datos['puntos_clave']);
        unset($pc[0]);

        $registro_puntos_clave = false;

        foreach($pc as $row){

            $query2 = $this->db->query('INSERT INTO pregunta_pc (id_pregunta,id_punto_clave,n_caso,id_especialidad)
                                        VALUES(
                                            '.$id_pregunta_nueva.',
                                            '.$row.',
											'.$datos['id_caso'].',
											'.$this->session->cg.')
                                        ON DUPLICATE KEY UPDATE
                                        id_pregunta = '.$id_pregunta_nueva.',
										n_caso = '.$datos['id_caso'].',
                                        id_punto_clave = '.$row.'');
            
            if($query2){
                $registro_puntos_clave =  true;
            }
            else{
                $registro_puntos_clave = false;
            }

        }

		$posiciones = explode(",", $datos['posicionesImg']);

		if ($datos['id_caso']<10) {
    		$numero_caso='0'.$datos['id_caso'];
    	}else{
    		$numero_caso=$datos['id_caso'];
    	}

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$ord_pos_img = 0;

		foreach ($posiciones as &$num_posicion) {

			$nombre_imagen ='E'.$var_especialidad.'_C'.$numero_caso.'_P'.$id_pregunta_nueva.'_'.$ord_pos_img.'_V01';

			
    	
			if (isset($num_posicion) && $num_posicion != 0) {

				rename('./img/casos_clinicos/'.$var_especialidad.'/'.$this->session->unicoCC.$num_posicion.'.jpg', './img/casos_clinicos/'.$var_especialidad.'/'.$nombre_imagen.'.jpg'); //RENOMBRA LOS ARCHIVOS OLD_NAME, NEW_NAME

				$query=$this->db->query('INSERT INTO imagenes_banco
                                    (id_caso, n_pregunta, posicion, especialidad)
                                    VALUES
                                    ('.$datos['id_caso'].','.$id_pregunta_nueva.','.$ord_pos_img.', "'.$var_especialidad.'")
                                ');

				//$resultado=array('estatus' =>TRUE);
				$resultado= true;
				
			}else{
				echo FALSE;
				$resultado= false;
			}

			$ord_pos_img += 1;
		}
        

        if($query){
            return true;
        }
        else{
            return false;
        }

	}

	public function eliminarCasoClinico($id_caso, $id_pregunta){

		$query = $this->db->query('DELETE FROM 
		'.$this->session->especialidad.'_cc_preguntas 
		WHERE id_caso = '.$id_caso.' AND id_pregunta = '.$id_pregunta.';');

		return $query;

	}

	public function editarPreguntaCC($datos){

		$query = $this->db->query( "UPDATE ".$this->session->especialidad."_cc_preguntas SET 
		pregunta = '".$datos['pregunta']."', 
		id_estatus = '".$datos['id_estatus']."', 
		id_accion = '".$datos['id_accion']."', 
		opcion_a = '".$datos['opcion_a']."', 
		opcion_b = '".$datos['opcion_b']."', 
		opcion_c = '".$datos['opcion_c']."', 
		opcion_d = '".$datos['opcion_d']."', 
		opcion_e = '".$datos['opcion_e']."', 
		respuesta = '".$datos['respuesta']."', 
		id_complejidad_cognitiva = '".$datos['id_complejidad_cognitiva']."', 
		id_periodo_vida = '".$datos['id_periodo_vida']."', 
		id_bibliografia = '".$datos['id_bibliografia']."', 
		capitulo = '".$datos['capitulo']."',
		id_tema = '5',
		id_caso = ".$datos['id_caso']."
		WHERE id_pregunta = ".$datos['id_pregunta'] ."");

		//id_tema = '".$datos['id_tema']."',

		$pc = explode(",", $datos['puntos_clave']);
        unset($pc[0]);

		return false;

        $registro_puntos_clave = false;

        foreach($pc as $row){

            $query2 = $this->db->query('INSERT INTO pregunta_pc (id_pregunta,id_punto_clave,n_caso,id_especialidad)
                                        VALUES(
                                            '.$datos['id_pregunta'] .',
                                            '.$row.',
											'.$datos['id_caso'].',
											'.$this->session->cg.')
                                        ON DUPLICATE KEY UPDATE
                                        id_pregunta = '.$datos['id_pregunta'] .',
										n_caso = '.$datos['id_caso'].',
                                        id_punto_clave = '.$row.'');
            
            if($query2){
                $resultado=array('estatus' =>true, 'id_caso' => $datos['id_caso']);
            }
            else{
                $resultado=array('estatus' =>false, 'id_caso' => $datos['id_caso']);
            }

        }

		return $resultado;

	}
}