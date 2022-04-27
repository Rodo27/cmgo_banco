<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importar extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //$this->load->model('Casos_clinicos_model','model');
    }

	public function index()
	{
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"",
				"sbmenu"=>"",
				"contenido"=>$this->load->view("cc/preguntas",array(),true),
				"script"=>$this->load->view("cc/preguntas.js.php",array(),true),
				)
			);
	}
	
	public function leer(){ //Ultima carga se respetó el id de los casos clinicos. El excel de nuevo lo cambió. URO

		$this->load->library("excel");


		//$inputFileType = 'Excel5';
		$inputFileType = 'Excel2007';
		//	$inputFileType = 'Excel2003XML';
		//	$inputFileType = 'OOCalc';
		//	$inputFileType = 'SYLK';
		//	$inputFileType = 'Gnumeric';
		//	$inputFileType = 'CSV';
		$inputFileName = '/Users/madero/Desktop/PreguntasCCURO_NUEVO.xlsx';

		echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);


		echo '<hr />';

		$i = 2;

		$i_especialidad=1;
		$i_division = 1;
		$i_area = 1;
		$i_tema = 1;
		$i_caso = 1;
		$i_pregunta = 1;

		$llenado = array();

		while ($i <= 301) {

			$id_division1 = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
			$index_division1 = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();

			$id_area1 = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
			$index_area1 = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();

			$id_tema1 = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
			$index_tema1 = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();

			$num1 = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
			$index_caso1 = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();

			//$id_pregunta = $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();
			$index_pregunta1 = $objPHPExcel->getActiveSheet()->getCell("N".$i)->getValue();


			//Pregunta
			$numeracion = $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();
			$examen_banco = "BANCO";//$objPHPExcel->getActiveSheet()->getCell("U".$i)->getValue();
			$modificacion = "";//$objPHPExcel->getActiveSheet()->getCell("W".$i)->getValue();

			$a = $objPHPExcel->getActiveSheet()->getCell("O".$i)->getValue();
			$b = $objPHPExcel->getActiveSheet()->getCell("P".$i)->getValue();
			$c = $objPHPExcel->getActiveSheet()->getCell("Q".$i)->getValue();
			$d = $objPHPExcel->getActiveSheet()->getCell("R".$i)->getValue();
			$e = $objPHPExcel->getActiveSheet()->getCell("S".$i)->getValue();
			$respuesta = $objPHPExcel->getActiveSheet()->getCell("T".$i)->getValue();

			//Llenado
			$id_division = trim($id_division1);
			$index_division= trim($index_division1);

			$id_area = trim($id_area1);
			$index_area = trim($index_area1);

			$id_tema = trim($id_tema1);
			$index_tema = trim($index_tema1);

			$num = trim($num1);
			$index_caso = trim($index_caso1);

			$index_pregunta = trim($index_pregunta1);


			$p="P".trim($numeracion);
			$llenado[$index_division][$id_area."__".$index_area][$id_tema."__".$index_tema][$num."__".$index_caso][$p."__".$index_pregunta] = array(
				"numeracion"=>$p,
				"pregunta"=>$index_pregunta,
				"examen_banco"=>strtoupper($examen_banco),
				//"modificacion"=>trim($modificacion),
				"opcion_a"=>trim($a),
				"opcion_b"=>trim($b),
				"opcion_c"=>trim($c),
				"opcion_d"=>trim($d),
				"opcion_e"=>trim($e),
				"respuesta"=>trim($respuesta)
				);
			$i++;
		}

		//print_r($llenado); exit();
		
		foreach ($llenado as $D => $areas) {

			$id_division = $this->getIdDiv($D,6);

			foreach ($areas as $key => $temas) {

				$ar = explode("__", "$key");
				//$id_area = $ar[0];
				$area = $ar[1];
				$id_area = $this->addArea($area,$id_division);

				foreach ($temas as $key2 => $casos) {
					$tm = explode("__", "$key2");
					//$id_tema = $tm[0];
					$tema = $tm[1];
					$id_tema = $this->addTema($id_area,$tema);

					foreach ($casos as $key3 => $preguntas) {
						$cs = explode("__", "$key3");
						$numeracion = $cs[0];
						$caso = $cs[1];
						
						//$estatus = ( $id_caso < 41 ) ? "EXAMEN" : "PILOTO";
						
						$id_caso = $this->addCaso($caso,$id_tema,array("id_caso_clinico"=>str_replace('P', '', $numeracion),"id_tema"=>$id_tema,"numeracion"=>$numeracion,"caso_clinico"=>$caso));

						foreach ($preguntas as $key4 => $row) {
							$row["id_caso"]=str_replace('P', '', $numeracion);
							$this->db->insert("uro2_cc_preguntas",$row);
						}
					}

				}
			}
		}
	}

	private function getIdDiv($division,$especialidad=2){
		$query = $this->db->get_where("divisiones",array("division"=>$division,"id_especialidad"=>$especialidad));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $div) {
				return $div->id_division;
			}
		}else{
			$this->db->insert("divisiones",array("division"=>$division,"id_especialidad"=>$especialidad));
			return $this->db->insert_id();
		}
	}

	public function addArea($area,$id_division){
		$query = $this->db->get_where("areas",array("area"=>$area,"id_division"=>$id_division));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $v) {
				return $v->id_area;
			}
		}else{
			//Crear y retornar ID_AREA
			$add=$this->db->insert("areas",array("area"=>$area,"id_division"=>$id_division));
			return $this->db->insert_id();
		}
	}

	public function addTema($id_area,$tema){
		$query = $this->db->get_where("temas",array("id_area"=>$id_area,"tema"=>$tema));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $v2) {
				return $v2->id_tema;
			}
		}else{
			$add=$this->db->insert("temas",array("id_area"=>$id_area,"tema"=>$tema));
			return $this->db->insert_id();	
		}
	}

	public function addCaso($caso,$id_tema,$data){
		$query = $this->db->get_where("uro2_casos_clinicos",array("id_tema"=>$id_tema,"caso_clinico"=>$caso));
		if($query->num_rows() > 0){
			foreach ($query->result() as $v4) {
				return $v4->id_caso_clinico;
			}
		}else{
			$this->db->insert("uro2_casos_clinicos",$data);
			return $this->db->insert_id();
		}
	}



	public function leer2(){

		$this->load->library("excel");


		//$inputFileType = 'Excel5';
		$inputFileType = 'Excel2007';
		//	$inputFileType = 'Excel2003XML';
		//	$inputFileType = 'OOCalc';
		//	$inputFileType = 'SYLK';
		//	$inputFileType = 'Gnumeric';
		//	$inputFileType = 'CSV';
		$inputFileName = '/Library/WebServer/Documents/banco/application/controllers/PreguntasN.xlsx';
		//$inputFileName = '/var/www/banco/application/controllers/CG_URO.xlsx';

		echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);

		echo '<hr />';

		$i = 2;

		$i_especialidad=1;
		$i_division = 1;
		$i_area = 1;
		$i_tema = 1;
		$i_caso = 1;
		$i_pregunta = 1;

		$especialidades = array();
		$divisiones = array();
		$areas = array();
		$temas = array();
		$casos = array();
		$preguntas = array();
		$llenado = array();

		while ($i <= 301) {

			$id_division1 = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
			$index_division1 = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();

			$id_area1 = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
			$index_area1 = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();

			$id_tema1 = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
			$index_tema1 = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();

			$id_pregunta1 = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
			$index_pregunta1 = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();

			/* EXTRA */
			$accion = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
			$usuario_modificacion = $objPHPExcel->getActiveSheet()->getCell("Q".$i)->getValue();
			$modificacion = $objPHPExcel->getActiveSheet()->getCell("R".$i)->getValue();
			$id_complejidad_cognitiva = $objPHPExcel->getActiveSheet()->getCell("AC".$i)->getValue();
			$id_periodo_vida = $objPHPExcel->getActiveSheet()->getCell("AD".$i)->getValue();
			$id_bibliografia = $objPHPExcel->getActiveSheet()->getCell("AE".$i)->getValue();
			$capitulo = $objPHPExcel->getActiveSheet()->getCell("AF".$i)->getValue();
			$tipo_examen = $objPHPExcel->getActiveSheet()->getCell("AO".$i)->getValue();
			/* END EXTRA */

			$a = $objPHPExcel->getActiveSheet()->getCell("S".$i)->getValue();
			$b = $objPHPExcel->getActiveSheet()->getCell("T".$i)->getValue();
			$c = $objPHPExcel->getActiveSheet()->getCell("U".$i)->getValue();
			$d = $objPHPExcel->getActiveSheet()->getCell("V".$i)->getValue();
			$e = $objPHPExcel->getActiveSheet()->getCell("W".$i)->getValue();
			$respuesta = $objPHPExcel->getActiveSheet()->getCell("X".$i)->getValue();

			//$modificacion = $objPHPExcel->getActiveSheet()->getCell("T".$i)->getValue();

			$estatus = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();

			$id_division = trim($id_division1);
			$index_division = trim($index_division1);

			$id_area = trim($id_area1);
			$index_area = trim($index_area1);

			$id_tema = trim($id_tema1);
			$index_tema = trim($index_tema1);

			$id_pregunta = trim($id_pregunta1);
			$index_pregunta = trim($index_pregunta1);

			$examen_banco="BANCO";
			//$accion="POR_REVISAR";

			/*if( $estatus=="RESERVA" ){
				$examen_banco="BANCO";
				$accion="BANCO_A_PILOTO";
			}*/

			//Llenado
			$llenado[$index_division][$index_area][$index_tema][$index_pregunta."__MAD__".$i] = array(
				"id_pregunta"=>$id_pregunta,
				"numeracion"=>$id_pregunta,
				"pregunta"=>$index_pregunta,
				"examen_banco"=>$examen_banco,
				"modificacion"=>trim($modificacion),
				"opcion_a"=>trim($a),
				"opcion_b"=>trim($b),
				"opcion_c"=>trim($c),
				"opcion_d"=>trim($d),
				"opcion_e"=>trim($e),
				"respuesta"=>trim($respuesta),
				"accion"=>$accion,
				"tipo_examen"=>$tipo_examen,
				"usuario_modificacion"=>$usuario_modificacion,
				"id_complejidad_cognitiva"=>$id_complejidad_cognitiva,
				"id_periodo_vida"=>$id_periodo_vida,
				"id_bibliografia"=>$id_bibliografia,
				"capitulo"=>$capitulo
				);
			$i++;
		}

		//print_r($llenado); exit();

		
		foreach ($llenado as $key0 => $areas) {

			$id_division = $this->getIdDivision($key0);

			foreach ($areas as $key => $temas) {

				$id_area = $this->addArea2($key,$id_division);
				foreach ($temas as $key2 => $preguntas) {
					$id_tema = $this->addTema2($id_area,$key2);
					foreach ($preguntas as $key3 => $row) {
						$row["id_tema"]=$id_tema;
						if( empty($row["pregunta"]) ){
							echo "vacio<br>";
						}else{
							$this->db->insert("uro2_cg_preguntas",$row);
						}
					}
				}

			}
		}
		
	}

	public function getIdDivision($division){
		$query = $this->db->get_where("divisiones",array("division"=>$division,"id_especialidad"=>6));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $div) {
				return $div->id_division;
			}
		}return 0;
	}

	public function addArea2($area,$id_division){
		$query = $this->db->get_where("areas",array("area"=>$area,"id_division"=>$id_division));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $v) {
				return $v->id_area;
			}
		}else{
			//Crear y retornar ID_AREA
			$add=$this->db->insert("areas",array("area"=>$area,"id_division"=>$id_division));
			if( $add ){
				$qa=$this->db->query("select last_insert_id() as id from areas;");
				if($qa->num_rows()>0){
					foreach ($qa->result() as $v33) {
						return $v33->id;
					}
				}
			}
		}
	}

	public function addTema2($id_area,$tema){
		$query = $this->db->get_where("temas",array("id_area"=>$id_area,"tema"=>$tema));
		if( $query->num_rows() > 0 ){
			foreach ($query->result() as $v2) {
				return $v2->id_tema;
			}
		}else{
			$add=$this->db->insert("temas",array("id_area"=>$id_area,"tema"=>$tema));
			if($add){
				$q=$this->db->query("select last_insert_id() as id from temas;");
				if($q->num_rows()>0){
					foreach ($q->result() as $v3) {
						return $v3->id;
					}
				}
			}	
		}
	}

	/* 31 Enero 2019 Excel enviado por correo */
	function cargar_casos_clinicos(){

		$this->load->library("excel");
		$inputFileType = 'Excel2007';
		$inputFileName = '/Library/WebServer/Documents/banco/cargas/2019_01_31.xlsx';

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$objPHPExcel->setActiveSheetIndex(0);

		$casos_clinicos = array();

		$i = 2;

		while ($i <= 121) {

			$a = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue(); //id_tema
			$b = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue(); //numero_caso
			$c = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue(); //caso
			$d = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue(); //examen_banco
			$e = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue(); //accion

			array_push($casos_clinicos,
				array(
				"id_caso_clinico" 	=> ( $d=="EXAMEN" ) ? $b : '',
				"id_tema" 			=> $a,
				"numeracion" 		=> $b,
				"caso_clinico" 		=> $c,
				"estatus" 			=>"Activo",
				"examen_banco" 		=> $d,
				"accion" 			=>$e,
				"accion_comentario" =>"",
				"imagen_url" 		=>"files/cc/pregunta.png",
				"imagen_nombre"		=>"pregunta",
				"modificacion" 		=>""
			)
			);
			
			$i++;
		}

		//$this->db->insert_batch('uropuem_casos_clinicos', $casos_clinicos);
		
	}

	/* 31 Enero 2019 Excel enviado por correo */
	function cargar_preguntas_cc(){

		$this->load->library("excel");
		$inputFileType = 'Excel2007';
		$inputFileName = '/Library/WebServer/Documents/banco/cargas/2019_01_31.xlsx';

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$objPHPExcel->setActiveSheetIndex(1);

		//Obtenermos casos_clinicos
		$query = $this->db->get("uropuem_casos_clinicos");
		$uropuem_casos_clinicos = array();
		foreach ($query->result() as $caso) {
			$uropuem_casos_clinicos[$caso->numeracion.$caso->examen_banco] = $caso;
		}

		$preguntas = array();
		$bibliografias = array();

		$ii = 2;

		while ($ii <= 605) {

			$a = $objPHPExcel->getActiveSheet()->getCell("A".$ii)->getValue(); //numero_caso
			$b = $objPHPExcel->getActiveSheet()->getCell("B".$ii)->getValue(); //numero_pregunta
			$c = $objPHPExcel->getActiveSheet()->getCell("C".$ii)->getValue(); //pregunta
			$d = $objPHPExcel->getActiveSheet()->getCell("D".$ii)->getValue(); //Opcion1
			$e = $objPHPExcel->getActiveSheet()->getCell("E".$ii)->getValue(); //Opcion2
			$f = $objPHPExcel->getActiveSheet()->getCell("F".$ii)->getValue(); //Opcion3
			$g = $objPHPExcel->getActiveSheet()->getCell("G".$ii)->getValue(); //Opcion4
			$h = $objPHPExcel->getActiveSheet()->getCell("H".$ii)->getValue(); //Opcion5
			$i = $objPHPExcel->getActiveSheet()->getCell("I".$ii)->getValue(); //Respuesta
			$j = $objPHPExcel->getActiveSheet()->getCell("J".$ii)->getValue(); //Examen_banco
			$k = $objPHPExcel->getActiveSheet()->getCell("K".$ii)->getValue(); //Accion
			$l = $objPHPExcel->getActiveSheet()->getCell("L".$ii)->getValue(); //Bibliografía
			$m = $objPHPExcel->getActiveSheet()->getCell("M".$ii)->getValue(); //Capítulo

			array_push($preguntas,
				array(
				"id_caso" 			=> $uropuem_casos_clinicos[$a.$j]->id_caso_clinico,
				"numeracion" 		=> $b,
				"pregunta" 			=> $c,
				"estatus" 			=> "Activo",
				"examen_banco" 		=> $j,
				"accion" 			=> $k,
				"accion_comentario" => "",
				"opcion_a" 			=> $d,
				"opcion_b" 			=> $e,
				"opcion_c" 			=> $f,
				"opcion_d" 			=> $g,
				"opcion_e" 			=> $h,
				"respuesta" 		=> $i,
				"id_bibliografia" 	=> "",
				"capitulo" 			=> "",
				"imagen_url" 		=> "files/cc/pregunta.png",
				"imagen_nombre"		=> "pregunta"
			)
			);

			if( $l > 0 ){
				array_push($bibliografias, array( "id_caso"=>$uropuem_casos_clinicos[$a.$j]->id_caso_clinico, "pregunta"=>$b, "bibliografia"=>$m, "capitulo"=>$l, "estatus"=>"Activo"));
			}


			
			$ii++;
		}

		//$this->db->insert_batch('uropuem_cc_preguntas', $preguntas);

		foreach ($bibliografias as $bibliografia) {

			$id_caso = $bibliografia["id_caso"];
			$numero_pregunta = $bibliografia["pregunta"];

			unset($bibliografia["id_caso"]);
			unset($bibliografia["pregunta"]);

			//$this->db->insert("bibliografias", $bibliografia);
			$id_bibliografia = $this->db->insert_id();

			//$this->db->update("uropuem_cc_preguntas", array("id_bibliografia"=>$id_bibliografia), array("id_caso"=>$id_caso, "numeracion"=>$numero_pregunta));
		}
	}

	function cargar_preguntas_cg(){

		$this->load->library("excel");
		$inputFileType = 'Excel2007';
		$inputFileName = '/Library/WebServer/Documents/banco/cargas/2019_01_31.xlsx';

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
		$objPHPExcel->setActiveSheetIndex(2);

		$conocimientos_generales = array();

		$ii = 2;

		while ($ii <= 592) {

			$a = $objPHPExcel->getActiveSheet()->getCell("A".$ii)->getValue(); //id_tema
			$b = $objPHPExcel->getActiveSheet()->getCell("B".$ii)->getValue(); //tema
			$c = $objPHPExcel->getActiveSheet()->getCell("C".$ii)->getValue(); //id_pregunta
			$d = $objPHPExcel->getActiveSheet()->getCell("D".$ii)->getValue(); //pregunta
			$e = $objPHPExcel->getActiveSheet()->getCell("E".$ii)->getValue(); //Opcion1
			$f = $objPHPExcel->getActiveSheet()->getCell("F".$ii)->getValue(); //Opcion2
			$g = $objPHPExcel->getActiveSheet()->getCell("G".$ii)->getValue(); //Opcion3
			$h = $objPHPExcel->getActiveSheet()->getCell("H".$ii)->getValue(); //Opcion4
			$i = $objPHPExcel->getActiveSheet()->getCell("I".$ii)->getValue(); //Opcion5
			$j = $objPHPExcel->getActiveSheet()->getCell("J".$ii)->getValue(); //Respuesta
			$k = $objPHPExcel->getActiveSheet()->getCell("K".$ii)->getValue(); //Examen_banco
			$l = $objPHPExcel->getActiveSheet()->getCell("L".$ii)->getValue(); //Accion

			array_push($conocimientos_generales,
				array(
				"id_pregunta" 		=> $c,
				"id_tema" 			=> $a,
				"numeracion" 		=> $c,
				"pregunta" 			=> $d,
				"opcion_a" 			=> $e,
				"opcion_b" 			=> $f,
				"opcion_c" 			=> $g,
				"opcion_d" 			=> $h,
				"opcion_e" 			=> $i,
				"respuesta" 		=> $j,
				"estatus" 			=>"Activo",
				"examen_banco" 		=> $k,
				"accion" 			=> $l
			)
			);
			
			$ii++;
		}

		$this->db->insert_batch('uropuem_cg_preguntas', $conocimientos_generales);
		
	}

	/* Elimina duplicados de la tabla Bibliografias y actualiza la tabla de preguntas. */
	function quitar_bibliografias(){

		$bibliografias = $this->db->query(' select bibliografia, capitulo from bibliografias where id_bibliografia > 67 group by bibliografia, capitulo ; ');

		foreach ( $bibliografias->result() as $bibliografia ) {

			echo "================ START ============ <br>";
			echo "===[BIBLIOGRAFIA] ".$bibliografia->bibliografia."<br>";
			echo "===[CAPITULO] ".$bibliografia->capitulo."<br>";


			$repetidos = $this->db->get_where("bibliografias",array("bibliografia"=>$bibliografia->bibliografia,"capitulo"=>$bibliografia->capitulo))->result_array();

			echo "===[PRIMERO] __ID:". $repetidos[0]['id_bibliografia'] ." __CAP:". $repetidos[0]['capitulo'] ." __BIB:". $repetidos[0]['bibliografia'] ." <br>";

			$rep = 0;
			foreach ($repetidos as $repetido) {
				if( $repetido['id_bibliografia'] == $repetidos[0]['id_bibliografia'] ){
					echo "===[   M I S MO] __ID:". $repetido['id_bibliografia'] ." __CAP:". $repetido['capitulo'] ." __BIB:". $repetido['bibliografia'] ." <br>";
				}else{
					echo "===[ELIMINANDO] ".$repetido['id_bibliografia']."<br>";
					$this->db->delete("bibliografias",array("id_bibliografia"=>$repetido['id_bibliografia']));
					echo "===[ACTUALIZANDO] ".$repetido['id_bibliografia']." _TO_ ".$repetidos[0]['id_bibliografia']."<br>";
					$this->db->update("uropuem_cc_preguntas",array("id_bibliografia"=>$repetidos[0]['id_bibliografia']),array( "id_bibliografia"=>$repetido['id_bibliografia'] ));
				}
			}
		}
	}
}