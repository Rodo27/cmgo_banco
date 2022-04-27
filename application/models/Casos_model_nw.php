<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Casos_model_nw extends CI_Model {

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
        $query = $this->db->query(
			"SELECT IF(p.conteo IS NULL, 0, p.conteo) as conteo, c1.* 
			FROM (
					SELECT cc.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave FROM 
					".$this->session->especialidad."_casos_clinicos as cc
					INNER JOIN catalogo_estatus as e ON e.id_estatus = cc.id_estatus
					INNER JOIN catalogo_accion as a ON a.id_accion = cc.id_accion
					INNER JOIN temas t ON t.id_tema = cc.id_tema
					INNER JOIN areas ar ON ar.id_area = t.id_area
					LEFT JOIN pregunta_pc p ON cc.id_caso_clinico = p.n_caso
					WHERE ar.id_division ".$like_division." AND ar.id_area ".$like_area." 
					AND t.id_tema ".$like_tema."  
					AND cc.id_estatus ".$like_estatus."
					AND cc.id_accion ".$like_accion."
					GROUP BY cc.id_caso_clinico
					ORDER BY cc.id_caso_clinico) as c1
					LEFT JOIN 
					(SELECT COUNT(*) as conteo, id_caso FROM gyo_cc_preguntas group by id_caso) p ON p.id_caso = c1.id_caso_clinico");
        return $query->result_array();
    }

	public function numPregCasos($id_caso){
		$query = $this->db->query("SELECT count(*) FROM ".$this->session->especialidad."_casos_clinicos 
		LEFT JOIN ".$this->session->especialidad."_cc_preguntas using(id_caso) 
		WHERE id_caso = ".$id_caso."");

		return $query->result_array();
	}


	public function registroCaso($datos){
		$query = $this->db->query("INSERT INTO ".$this->session->especialidad."_casos_clinicos 
		( 
		id_tema, 
		caso_clinico, 
		id_estatus, 
		id_accion
		) 
		VALUES ( 
		'".$datos['id_tema']."', 
		'".$datos['add_casos_caso_clinico']."', 
		'".$datos['id_estatus']."', 
		'".$datos['id_accion']."' 
		)");

		$id_caso = $this->db->insert_id(); //obtener el id del elemento registrado.

		

		//registroImagenes($id_nuevo_caso, $datos['posicionesImg']);

		
		$posiciones = explode(",", $datos['posicionesImg']);

		if ($id_caso<10) {
    		$numero_caso='0'.$id_caso;
    	}else{
    		$numero_caso=$id_caso;
    	}

    	if ($this->session->cc==7) {
    		$var_especialidad=5;
    	}else{
    		$var_especialidad=$this->session->cc;
    	}

		$ord_pos_img = 0;

		
		foreach ($posiciones as &$num_posicion) {

			$nombre_imagen ='E'.$var_especialidad.'_C'.$numero_caso.'_P0_'.$ord_pos_img.'_V01';

			
    	
			if (isset($num_posicion) && $num_posicion != 0) {

				rename('./img/casos_clinicos/'.$var_especialidad.'/'.$this->session->unicoCC.$ord_pos_img.'.jpg', './img/casos_clinicos/'.$var_especialidad.'/'.$nombre_imagen.'.jpg'); //RENOMBRA LOS ARCHIVOS OLD_NAME, NEW_NAME

				$query=$this->db->query('INSERT INTO imagenes_banco
                                    (id_caso, n_pregunta, posicion, especialidad)
                                    VALUES
                                    ('.$id_caso.',0,'.$ord_pos_img.', "'.$var_especialidad.'")
                                ');

				//$resultado=array('estatus' =>TRUE);
				$resultado= true;
				
			}else{
				echo FALSE;
				$resultado= false;
			}

			$ord_pos_img += 1;
			
		}

		return $resultado;

/* 		if($id_caso){
			return $id_caso;
		}else{
			return false;
		} */

	}

	public function eliminarCasoClinico($id_caso){

		$query = $this->db->query("DELETE FROM ".$this->session->especialidad."_casos_clinicos
		WHERE id_caso_clinico = ".$id_caso.";
		");

		return $query;

	}

	public function getCaso($id_caso){
		$query = $this->db->query("SELECT cc.*, t.id_area, a.id_division FROM 
		".$this->session->especialidad."_casos_clinicos cc
		INNER JOIN temas t ON t.id_tema = cc.id_tema
		INNER JOIN areas a ON a.id_area = t.id_area
		WHERE id_caso_clinico = ".$id_caso."
		");

		return $query->result_array();
	}

	public function editarCaso($casoEditado){

		$query = $this->db->query("UPDATE 
		".$this->session->especialidad."_casos_clinicos SET
		modificacion = '".$casoEditado['modificacion']."',
		id_estatus = '".$casoEditado['id_estatus']."',
		id_accion = '".$casoEditado['id_accion']."',
		caso_clinico ='".$casoEditado['caso_clinico']."',
		id_tema = '".$casoEditado['id_tema']."'
		WHERE id_caso_clinico =  ".$casoEditado['id_caso']."
		");

		return $query;

	}

	public function preguntasCaso($id_caso){
       
        $query = $this->db->query(
			"SELECT cc.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave
			FROM ".$this->session->especialidad."_cc_preguntas cc
			INNER JOIN catalogo_estatus e ON e.id_estatus = cc.id_estatus
			INNER JOIN catalogo_accion a ON a.id_accion = cc.id_accion
			LEFT JOIN pregunta_pc p ON (cc.id_pregunta = p.id_pregunta AND id_especialidad = '".$this->session->cg."')
			WHERE id_caso = ".$id_caso." 
			GROUP BY cc.id_pregunta");
        //var_dump($query->result_array());

        return $query->result_array();
    }

	
}