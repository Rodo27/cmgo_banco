<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Conocimientos_generales_model_nw extends CI_Model {

    function __construct()
    {
        $this->load->model('Conocimientos_generales_model_nw', 'model');
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

       
        $query = $this->db->query("SELECT cg.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave FROM 
        ".$this->session->especialidad."_cg_preguntas cg
        INNER JOIN catalogo_estatus e ON e.id_estatus = cg.id_estatus
        INNER JOIN catalogo_accion a ON a.id_accion = cg.id_accion
        INNER JOIN temas t ON t.id_tema = cg.id_tema
        INNER JOIN areas ar ON ar.id_area = t.id_area
        LEFT JOIN pregunta_pc p ON (cg.id_pregunta = p.id_pregunta AND id_especialidad = '".$this->session->cg."')
        WHERE ar.id_division ".$like_division." AND ar.id_area ".$like_area." 
        AND t.id_tema ".$like_tema." 
        AND cg.id_estatus ".$like_estatus."
        AND cg.id_accion ".$like_accion."
        GROUP BY cg.id_pregunta
        ORDER BY cg.id_pregunta");
         //print_r($this->db->last_query());
 
        return $query->result_array();
    }

    public function getTablaPregunta($id_tema){

		$query = $this->db->query("SELECT cg.*, e.catalogo_estatus, a.catalogo_accion, p.id_punto_clave FROM 
        ".$this->session->especialidad."_cg_preguntas cg
        INNER JOIN catalogo_estatus e ON e.id_estatus = cg.id_estatus
        INNER JOIN catalogo_accion a ON a.id_accion = cg.id_accion
        INNER JOIN temas t ON t.id_tema = cg.id_tema
        INNER JOIN areas ar ON ar.id_area = t.id_area
        LEFT JOIN pregunta_pc p ON (cg.id_pregunta = p.id_pregunta AND id_especialidad = '".$this->session->cg."')
        WHERE t.id_tema = ".$id_tema."
        GROUP BY cg.id_pregunta
        ORDER BY cg.id_pregunta");
			//print_r($this->db->last_query());
	
		return $query->result_array();

	}

    public function getPuntosClave($id_tema){
        $query = $this->db->query("SELECT tpc.id_punto_clave, tpc.numeracion, tpc.punto_clave FROM
         temas_puntos_clave tpc INNER JOIN temas t ON tpc.id_tema = t.id_tema WHERE tpc.id_tema = ".$id_tema."");

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

    public function getBiblios(){
        $query = $this->db->query('SELECT id_bibliografia, bibliografia FROM bibliografias');
        return $query->result_array();
    }

    public function registroPreguntaCG($datos){

        $query = $this->db->query('INSERT INTO '.$this->session->especialidad.'_cg_preguntas
        (id_estatus,id_accion,id_tema,id_complejidad_cognitiva,id_periodo_vida,
        pregunta,opcion_a,opcion_b,opcion_c,opcion_d,opcion_e,respuesta,id_bibliografia,capitulo)
        VALUES('.$datos['id_estatus'].','.$datos['id_accion'].','.$datos['id_tema'].','.$datos['id_complejidad_cognitiva'].
        ','.$datos['id_periodo_vida'].',"'.$datos['pregunta'].'","'.$datos['opcion_a'].
        '","'.$datos['opcion_b'].'","'.$datos['opcion_c'].'","'.$datos['opcion_d'].'","'.$datos['opcion_e'].
        '","'.$datos['respuesta'].'",'.$datos['id_bibliografia'].',"'.$datos['capitulo'].'")');

        $id_pregunta_nueva = $this->db->insert_id();

        $pc = explode(",", $datos['puntos_clave']);
        unset($pc[0]);

        $registro_puntos_clave = false;

        foreach($pc as $row){

            $query2 = $this->db->query('INSERT INTO pregunta_pc (id_pregunta,id_punto_clave, id_especialidad)
                                        VALUES(
                                            '.$id_pregunta_nueva.',
                                            '.$row.',
                                            '.$this->session->cg.')
                                        ON DUPLICATE KEY UPDATE
                                        id_pregunta = '.$id_pregunta_nueva.',
                                        id_punto_clave = '.$row.',
                                        id_especialidad = '.$this->session->cg.'');
            
            if($query2){
                $registro_puntos_clave =  true;
            }
            else{
                $registro_puntos_clave = false;
            }

        }
        

        if($registro_puntos_clave){
            return true;
        }
        else{
            return false;
        }
    }

    public function actualizarPregunta($datos){
    
        $query = $this->db->query('UPDATE '.$this->session->especialidad.'_cg_preguntas SET
        id_estatus = '.$datos['id_estatus'].',
        id_accion = '.$datos['id_accion'].',
        id_tema = '.$datos['id_tema'].',
        id_complejidad_cognitiva = '.$datos['id_complejidad_cognitiva'].',
        id_periodo_vida = '.$datos['id_periodo_vida'].',
        pregunta = "'.$datos['pregunta'].'",
        opcion_a = "'.$datos['opcion_a'].'",
        opcion_b = "'.$datos['opcion_b'].'",
        opcion_c = "'.$datos['opcion_c'].'",
        opcion_d = "'.$datos['opcion_d'].'",
        opcion_e ="'.$datos['opcion_e'].'",
        respuesta = "'.$datos['respuesta'].'",
        id_bibliografia = '.$datos['id_bibliografia'].',
        capitulo = "'.$datos['capitulo'].'" 
        WHERE id_pregunta = '.$datos['id_pregunta'].'');

        $pc = explode(",", $datos['puntos_clave']);
        unset($pc[0]);

        $actualizacion_puntos_clave = false;

        foreach($pc as $row){

            $query2 = $this->db->query('INSERT INTO
                                        pregunta_pc (id_pregunta,id_punto_clave, id_especialidad)
                                        VALUES(
                                            '.$datos['id_pregunta'].',
                                            '.$row.',
                                            '.$this->session->cg.')
                                        ON DUPLICATE KEY UPDATE
                                        id_pregunta = '.$datos['id_pregunta'].',
                                        id_punto_clave = '.$row.',
                                        id_especialidad = '.$this->session->cg.'');
            
            if($query2){
                $actualizacion_puntos_clave =  true;
            }
            else{
                $actualizacion_puntos_clave = false;
            }

        }

        
        if($actualizacion_puntos_clave){
            return true;
        }
        else{
            return false;
        }

    }

    public function getIdPreguntaCG($id_pregunta){

        $query = $this->db->query('SELECT cg.*, d.id_division, a.id_area FROM '.$this->session->especialidad.'_cg_preguntas cg
        INNER JOIN temas t ON t.id_tema = cg.id_tema
        INNER JOIN areas a ON a.id_area = t.id_area
        INNER JOIN divisiones d ON d.id_division = a.id_division
        INNER JOIN catalogo_estatus e ON e.id_estatus = cg.id_estatus
        INNER JOIN catalogo_accion ac ON ac.id_accion = cg.id_accion
        WHERE id_pregunta = '.$id_pregunta.';');

        return $query->row_array();
    }

    public function getPuntosChecked($id_pregunta){

        $query = $this->db->query('SELECT id_punto_clave FROM pregunta_pc
                                WHERE id_pregunta = '.$id_pregunta.'
                                AND id_especialidad = '.$this->session->cg.'');

        return $query->result_array();
    }

    public function getCotejoChecked($id_pregunta){

        $query = $this->db->query('SELECT n_rubrica, criterio FROM rubrica_pregunta
                                WHERE id_pregunta = '.$id_pregunta.' AND id_especialidad = '.$this->session->cg.'');

        return $query->result_array();
    }


    public function eliminarPuntoClave($id_pregunta,$id_punto_clave){

        $query = $this->db->query('DELETE FROM pregunta_pc WHERE
        id_pregunta = '.$id_pregunta.' AND
        id_punto_clave = '.$id_punto_clave.'
        AND id_especialidad = '.$this->session->cg.'
        ');

        if($query){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function guardarListaDeCotejo($rubricas, $id_pregunta){

        $numero = 1;

        foreach($rubricas as $rubrica){

            $query = $this->db->query('INSERT INTO rubrica_pregunta(id_especialidad,id_pregunta,n_rubrica,tipo_examen,criterio)
                                        VALUES(
                                            '.$this->session->cg.',
                                            '.$id_pregunta.',
                                            '.$numero.',
                                            "banco",
                                            "'.$rubrica.'")
                                        ON DUPLICATE KEY UPDATE
                                        id_especialidad = '.$this->session->cg.',
                                        id_pregunta = '.$id_pregunta.',
                                        n_rubrica = '.$numero.',
                                        tipo_examen = "banco",
                                        criterio = "'.$rubrica.'"');


            $numero += 1;
            
            if($query){
                $actualizacion_rubricas =  true;
            }
            else{
                $actualizacion_rubricas = false;
            }

        }

        return $actualizacion_rubricas;

    }

    public function getPreguntaAprobada($id_pregunta){
       
        $query = $this->db->query('SELECT * FROM preguntacg_aprobado
        WHERE id_pregunta_banco = '.$id_pregunta.' AND id_especialidad = '.$this->session->cg.'');

        return $query->row_array();
    }

}