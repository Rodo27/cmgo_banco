<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Analisis extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Analisis_model','model');
    }

	public function index(){
		$this->acceso();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"admin",
				"sbmenu"=>"analisis",
				"contenido"=>$this->load->view("analisis/analisis",array(
					"title"=>"DATOS OPERATIVOS -> ANÁLISIS",			
					),true),
				"script"=>$this->load->view("analisis/analisis.js.php",array(),true)
			)
		);
	}

	public function casos_clinicos(){

		if(empty($_FILES['cc']['name'])){
			$this->form_validation->set_rules("cc","cc",'required',array('required'=>'Agregue un archivo.'));
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"cc"));exit(0);
			}
		}else{
			if(isset($_FILES['cc']) && $_FILES['cc']['error']==0){
	           	$allowed=array('xlsx');
	            $extension=pathinfo($_FILES['cc']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){
	            	if( $_FILES['cc']['name'] == "CALIBRACION_CC.xlsx"){

		            	$archivo="files/calibracion/temp/".$_FILES['cc']['name'];
			            if(move_uploaded_file($_FILES['cc']['tmp_name'],$archivo)){
			            		
		            		$nuevo="files/calibracion/".date("YmdHis").".".$extension;
		                	copy($archivo,$nuevo);
		                	unlink($archivo);
		                	$tipo = $this->security->xss_clean($this->input->post("tipo"));

		                	//Procesar...
		                	$x=$this->procesar_cc($nuevo,$tipo);
		                	if( $x=="0" ){
		                		echo json_encode(array('estatus'=>FALSE,'msg'=>'Filas procesadas: '.$x));
		                	}else{
		                		echo json_encode(array('estatus'=>TRUE,'msg'=>'Filas procesadas: '.$x));
		                	}
			            	
			            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al copiar el archivo.'));}

			        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Archivo incorrecto.'));}

	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}
		}
	}

	public function conocimientos_generales(){

		if(empty($_FILES['cg']['name'])){
			$this->form_validation->set_rules("cg","cg",'required',array('required'=>'Agregue un archivo.'));
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"cg"));exit(0);
			}
		}else{
			if(isset($_FILES['cg']) && $_FILES['cg']['error']==0){
	           	$allowed=array('xlsx');
	            $extension=pathinfo($_FILES['cg']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){
	            	if( $_FILES['cg']['name'] == "CALIBRACION_CG.xlsx"){

	            		$archivo="files/calibracion/temp/".$_FILES['cg']['name'];
			            if(move_uploaded_file($_FILES['cg']['tmp_name'],$archivo)){
			            		
		            		$nuevo="files/calibracion/".date("YmdHis").".".$extension;
		                	copy($archivo,$nuevo);
		                	unlink($archivo);
		                	$tipo = $this->security->xss_clean($this->input->post("tipo"));

		                	//Procesar...
		                	$x=$this->procesar_cg($nuevo,$tipo);
		                	if( $x=="0" ){
		                		echo json_encode(array('estatus'=>FALSE,'msg'=>'Filas procesadas: '.$x));
		                	}else{
		                		echo json_encode(array('estatus'=>TRUE,'msg'=>'Filas procesadas: '.$x));
		                	}
			            	
			            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al copiar el archivo.'));}

	            	}else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Archivo incorrecto.'));}
	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}
		}
	}

	public function casos_clinicos_uso(){

		if(empty($_FILES['cc_uso']['name'])){
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Incluir archivo.","input"=>"cc_uso"));exit(0);
		}else{
			if(isset($_FILES['cc_uso']) && $_FILES['cc_uso']['error']==0){
	           	$allowed=array('xlsx');
	            $extension=pathinfo($_FILES['cc_uso']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){

	            	$tableToUpdate = $this->security->xss_clean($this->input->post("tipo"));

	            	
	            	$this->load->library("excel");
	            	$file = $_FILES['cc_uso']["tmp_name"];
	            	$inputFileType = PHPExcel_IOFactory::identify($file);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($file);

                    //get only the Cell Collection
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    
                    //extract to a PHP readable array format
                    $caso=0;
                    $pregunta=0;
                    $opcion = 0;
                    $uso=0;
                    $porcentaje=0;
                    //---
                    $casos=array();
                    $preguntas=array();
                    $opciones=array();

                    foreach ($cell_collection as $cell)
                    {
                        $column     = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row        = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                        if( $column != "A" && $row == 1 && !empty($data_value) ){
                        	
                        	$casos[$column]=$data_value;

                        }

                        if( $column != "A" && $row == 2 && !empty($data_value) ){
                        	
                        	$preguntas[$column]="P".$data_value;

                        }

                        if( $column != "A" && $row == 3 && !empty($data_value) ){
                        	
                        	$porcentaje_uso = $objPHPExcel->getActiveSheet()->getCell($column."4")->getValue();
                        	$opciones[$column]=array(
                        		"opcion"=>"uso_".strtolower($data_value),
                        		"porcentaje_uso"=>round( ($porcentaje_uso/1040)*100 ));

                        }
                    }

                    $data=array();
                    foreach ($opciones as $key => $opcion) {

                    	if( array_key_exists("$key", $preguntas) ){
                    		$pregunta = $preguntas[$key];
                    	}

                    	if( array_key_exists("$key", $casos) ){
                    		$caso = $casos[$key];
                    	}

                    	$data[$caso][$pregunta][$opcion['opcion']]=$opcion;
                    }
                    $data2=array();
                    $r=0;
                    $d=0;
                    foreach ($data as $key => $pg) {
                    	$caso = $key;
                    	foreach ($pg as $key2 => $opc) {
                    		$pregunta = $key2;
                    		$ar=array();
                    		foreach ($opc as $key3 => $dts) {
                    			$ar[$key3]=$dts['porcentaje_uso'];
                    			$upd = $this->db->update($tableToUpdate."_cc_preguntas",array("$key3"=>$dts['porcentaje_uso']),array("id_caso"=>$caso,"numeracion"=>$pregunta));
                    			if( $upd ){
                    				$r++;
                    			}else{
                    				$d++;
                    			}
                    		}
                    	}
                    }
                    echo json_encode(array('estatus'=>TRUE,'msg'=>'Campos actualizados: '.$r.", ignorados: ".$d));

	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}
		}
	}

	public function conocimientos_generales_uso(){

		if(empty($_FILES['cg_uso']['name'])){
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Incluir archivo.","input"=>"cg_uso"));exit(0);
		}else{
			if(isset($_FILES['cg_uso']) && $_FILES['cg_uso']['error']==0){
	           	$allowed=array('xlsx');
	            $extension=pathinfo($_FILES['cg_uso']['name'],PATHINFO_EXTENSION);
	            if( in_array( strtolower($extension), $allowed) ){

	            	$tableToUpdate = $this->security->xss_clean($this->input->post("tipo"));
		            	
	            	$this->load->library("excel");
	            	$file = $_FILES['cg_uso']["tmp_name"];
	            	$inputFileType = PHPExcel_IOFactory::identify($file);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($file);

                    //get only the Cell Collection
                    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                    
                    //extract to a PHP readable array format
                    $caso=0;
                    $pregunta=0;
                    $opcion = 0;
                    $uso=0;
                    $porcentaje=0;
                    //---
                    $preguntas=array();
                    $opciones=array();
                    $r=0;
                    $d=0;
                    foreach ($cell_collection as $cell)
                    {
                        $column     = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                        $row        = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                        $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

                        if( $column != "A" && $row == 2 && !empty($data_value) ){

                        	$pregunta = $objPHPExcel->getActiveSheet()->getCell($column."1")->getValue();
                        	$porcentaje_uso = $objPHPExcel->getActiveSheet()->getCell($column."4")->getValue();
                        	$uso = "uso_".strtolower($data_value);
                        	$pc_uso = round(str_replace("%","",$porcentaje_uso )*100);

                        	$upd = $this->db->update($tableToUpdate."_cg_preguntas",array("$uso"=>$pc_uso),array("id_pregunta"=>$pregunta));
                        	if( $upd ){
                				$r++;
                			}else{
                				$d++;
                			}
                        }
                    } 
                    echo json_encode(array('estatus'=>TRUE,'msg'=>'Campos actualizados: '.$r.", ignorados: ".$d));

	            }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Formato de archivo no válido.'));}
	        }else{echo json_encode(array('estatus'=>FALSE,'msg'=>'Error al cargar el archivo.'));}
		}
	}

	public function procesar_cc($file,$tipo){

		$this->load->library("excel");
		$inputFileType = 'Excel2007';
		$inputFileName = $file;

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);

		$data = TRUE;
		$i = 2;

		while ($data) {

			$caso = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
			$pregunta = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
			$dif = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
			$infit = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
			$outfit = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
			$dis = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
			if( !empty($caso) && !empty($pregunta) /*&& !empty($dif) && !empty($dis)*/ ){
				$this->model->updateMaxMinCC($tipo,$caso,"P".$pregunta,$dif,$dis,$infit,$outfit);
			}
			else{ 
				$data=FALSE; 
			}
			$i++;
		} return $i-3;
	}

	public function procesar_cg($file,$tipo){

		$this->load->library("excel");
		$inputFileType = 'Excel2007';
		$inputFileName = $file;

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);

		$data = TRUE;
		$i = 2;

		while ($data) {

			$id_pregunta = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
			$dif = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
			$infit = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
			$outfit = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
			$dis = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
			if( !empty($id_pregunta) /*&& !empty($dif) && !empty($dis)*/ ){
				$this->model->updateMaxMinCG($tipo,$id_pregunta,$dif,$dis,$infit,$outfit);
			}
			else{ 
				$data=FALSE; 
			}
			$i++;
		} return $i-3;
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}
}