<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocimientos_generales extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Conocimientos_generales_model','model');
        $this->load->library('bcrypt');
    }


    public function guardar_rubrica(){

    	$id_pregunta=$_GET['id_pregunta'];
    	$rubrica1=$_GET['rubrica1'];
    	$rubrica2=$_GET['rubrica2'];
    	$rubrica3=$_GET['rubrica3'];
    	$rubrica4=$_GET['rubrica4'];
    	$rubrica5=$_GET['rubrica5'];
    	$rubrica6=$_GET['rubrica6'];
    	$rubrica7=$_GET['rubrica7'];
    	$rubrica8=$_GET['rubrica8'];
    	$rubrica9=$_GET['rubrica9'];
    	$rubrica10=$_GET['rubrica10'];
    	$rubrica11=$_GET['rubrica11'];
    	$rubrica12=$_GET['rubrica12'];
    	$rubrica13=$_GET['rubrica13'];
    	$rubrica14=$_GET['rubrica14'];
    	$rubrica15=$_GET['rubrica15'];
    	$rubrica16=$_GET['rubrica16'];
    	$rubrica17=$_GET['rubrica17'];
    	$rubrica18=$_GET['rubrica18'];
    	$rubrica19=$_GET['rubrica19'];
    	$rubrica20=$_GET['rubrica20'];
    	$rubrica21=$_GET['rubrica21'];
    	$rubrica22=$_GET['rubrica22'];
    	$rubrica23=$_GET['rubrica23'];
    	$rubrica24=$_GET['rubrica24'];
    	$rubrica25=$_GET['rubrica25'];
    	$rubrica26=$_GET['rubrica26'];
    	$rubrica27=$_GET['rubrica27'];


    	$guardar = $this->model->guardar_rubrica($id_pregunta, $rubrica1, $rubrica2, $rubrica3, $rubrica4, $rubrica5, $rubrica6,
    		$rubrica7, $rubrica8, $rubrica9, $rubrica10, $rubrica10, $rubrica11, $rubrica12, $rubrica13, $rubrica14, $rubrica15, $rubrica16, $rubrica17, $rubrica18, $rubrica19, $rubrica20, $rubrica21, $rubrica22, $rubrica23, $rubrica24, $rubrica25, $rubrica26, $rubrica27

    	);
		echo json_encode($guardar);

    }

    public function get_rubrica(){

    	$id_pregunta=$_GET['id_pregunta'];

    	$rubrica = $this->model->get_rubrica($id_pregunta);
		echo json_encode($rubrica);

    }


    public function get_preguntas_aprobadoID(){

    	$id_pregunta=$_GET['id_pregunta'];

    	$pregunta = $this->model->get_preguntas_aprobadoID($id_pregunta);
		echo json_encode($pregunta);

    }

    public function get_preguntas_aprobado(){

    	$especialidad_tipo=$_GET['especialidad'];
    	$tipo_reactivo=$_GET['tipo_reactivo'];
    	$version_examen=$_GET['version_examen'];

    	$preguntas = $this->model->get_preguntas_aprobado($especialidad_tipo, $tipo_reactivo,$version_examen);
		$vista = $this->load->view("conocimientos_generales/tabla_preguntas_aprobado",array("preguntas"=>$preguntas),true);
		echo json_encode($vista);

    }

    public function preguntacg_aprobado(){

    	// $preguntas = $this->model->get_preguntas_aprobado();

    	$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"conocimientos_generales",
				"sbmenu"=>"cg_preguntas",
				"contenido"=>$this->load->view("conocimientos_generales/preguntas/preguntas_aprobado",array(
					// "examen"=>$preguntas,
					),true),
				"script"=>$this->load->view("conocimientos_generales/preguntas/preguntascg_aprobado.js.php",array(),true),
				)
			);
    }

    public function aprobar_reactivo(){

    	$id_pregunta=$_GET['id_pregunta'];
    	$password=$_GET['password'];
    	$director=$_GET['director'];

    	$password_bd= $this->model->get_password();

    	$check_password= $this->bcrypt->check_password($password, $password_bd['password']);

    	if ($check_password) {
    		

    		$clonar= $this->model->clonar_pregunta($id_pregunta, $director);

    		if ($clonar) {

    			echo json_encode(array('estatus' => TRUE, 'msg' => 'AUTORIZACIÓN EXITOSA'));
    			
    		}else{
    			echo json_encode(array('estatus' => FALSE, 'msg' => 'YA HAY UN REGISTRO DE ESTA PREGUNTA'));	
    		}

    	}else{
    		echo json_encode(array('estatus' => FALSE, 'msg' => 'PASSWORD INCORRECTO'));
    	}

    	// $aprobar=$this->model->aprobar_reactivo($id_pregunta, $password);
    	// echo json_encode($aprobar);

    }

    public function get_pregunta_examen_actual_cg(){

    	$id_pregunta=$_GET['id_pregunta'];
    	$contenido=$this->model->get_pregunta_examen_actual_cg($id_pregunta);
    	echo json_encode($contenido);

    }

	public function index()
	{	
		$this->acceso();
		$id_especialidad = $this->session->cg;
		$especialidad = $this->model->getEspecialidad($id_especialidad);
		$divisiones = $this->model->getIdsDivisiones($id_especialidad,"SI");
		
		$preguntas_piloto = $this->model->get_preguntas_piloto();
		$preguntas_examen = $this->model->get_preguntas_examen();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"conocimientos_generales",
				"sbmenu"=>"cg_temas",
				"contenido"=>$this->load->view("conocimientos_generales/temas",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					"divisiones"=>$divisiones,
					"piloto"=>$preguntas_piloto,
					"examen"=>$preguntas_examen
					),true),
				"script"=>$this->load->view("conocimientos_generales/temas.js.php",array("id_especialidad"=>$id_especialidad),true),
				)
			);
	}

	public function getCombo(){
		$this->acceso();
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$filtro = $this->security->xss_clean($this->input->post("filtro"));
		$filtro2 = $this->security->xss_clean($this->input->post("filtro2"));
		$todas = $this->security->xss_clean($this->input->post("todas"));


		$ids="";
		switch ($tipo) {
			case 'especialidades':
				$ids = $this->model->getIdsEspecialidades(); //No se utiiza
				break;
			case 'divisiones':
				$ids = $this->model->getIdsDivisiones($filtro,$todas);
				break;
			case 'areas':
				$ids = $this->model->getIdsAreas($filtro,$filtro2,$todas);
				break;
			case 'temas':
				$ids = $this->model->getIdsTemas($filtro,$todas);
				break;
			case 'CC':
				$ids = $this->model->getComplejidadesCognitivas(); //No se usa
				break;
			case 'PV':
				$ids = $this->model->getPeriodosVida(); //No se usa
				break;
		}
		echo json_encode($ids);
	}

	public function getTabla(){
		$this->acceso();
		$tipo=$this->security->xss_clean($this->input->post("tipo"));
		$vista = "";
		$id_tema = $this->security->xss_clean($this->input->post("tema"));
		$id_area = $this->security->xss_clean($this->input->post("area"));
		$id_division = $this->security->xss_clean($this->input->post("division"));
		$id_especialidad = $this->security->xss_clean($this->input->post("especialidad"));

		$pagina_temas = $this->security->xss_clean($this->input->post("pagina_temas"));
		$pagina_preguntas = $this->security->xss_clean($this->input->post("pagina_preguntas"));

		$estatus = $this->security->xss_clean($this->input->post("nfEstatus")); (empty($estatus)) ? $estatus="TODAS" : "" ;
		$accion = $this->security->xss_clean($this->input->post("nfAccion")); (empty($accion)) ? $accion="TODAS" : "" ;
		// $version = $this->security->xss_clean($this->input->post("nfVersion")); (empty($version)) ? $version="TODAS" : "" ;

		switch ($tipo) {
			/*case 'especialidades':
				$especialidades = $this->model->getEspecialidades();
				$vista = $this->load->view("cc/tabla_especialidades",array("especialidades"=>$especialidades),TRUE);
				break;
			case 'divisiones':
				$divisiones = $this->model->getDivisiones();
				$vista = $this->load->view("cc/tabla_divisiones",array("divisiones"=>$divisiones),TRUE);
				break;
			case 'areas':
				$areas = $this->model->getAreas();
				$vista = $this->load->view("cc/tabla_areas",array("areas"=>$areas),TRUE);
				break;*/
			case 'temas': 
				$temas = $this->model->getTemas($id_area,$id_division,$id_especialidad);
				$vista = $this->load->view("conocimientos_generales/tabla_temas",array("temas"=>$temas,"pagina"=>($pagina_temas*10)),TRUE);
				break;
			case 'preguntas': 
				$preguntas = $this->model->getPreguntas($id_tema,$id_area,$id_division,$id_especialidad,$estatus,$accion);
				$vista = $this->load->view("conocimientos_generales/tabla_preguntas_nw_old",array("preguntas"=>$preguntas,"pagina"=>($pagina_preguntas*100)),TRUE);
				break;
			/*case 'puntos_clave':
				$puntos_clave = $this->model->getPuntosClave();
				$vista = $this->load->view("cc/tabla_puntos_clave",array("puntos_clave"=>$puntos_clave),TRUE);
				break;
			case 'objetivos':
				$objetivos = $this->model->getObjetivos();
				$vista = $this->load->view("cc/tabla_objetivos",array("objetivos"=>$objetivos),TRUE);
				break;
			case 'casos_clinicos':
				$casos_clinicos = $this->model->getCasosClinicos();
				$vista = $this->load->view("cc/tabla_casos_clinicos",array("casos_clinicos"=>$casos_clinicos),TRUE);
				break;*/
		}
		echo json_encode($vista);
	}

	public function delRow(){
		$this->acceso();
		$id = $this->security->xss_clean($this->input->post("id"));
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$del = FALSE;
		switch($tipo){
			/*case 'especialidades':
				$del = $this->model->delEspecialidad($id);
				break;
			case 'divisiones':
				$del = $this->model->delDivision($id);
				break;
			case 'areas':
				$del = $this->model->delArea($id);
				break;*/
			case 'temas':
				$del = $this->model->delTema($id);
				break;
			case 'puntos_clave':
				$del = $this->model->delPuntoClave($id);
				break;
			case 'preguntas':
				$del = $this->model->delPregunta($id);
				break;
			/*case 'objetivos':
				$del = $this->model->delObjetivo($id);
				break;
			case 'casos_clinicos':
				$del = $this->model->delCasoClinico($id);
				break;*/
		}
		if($del){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro eliminado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"No se pudo quitar el registro."));
		}
	}

	public function addTema(){
		$this->acceso();
		$form=array(
			"tema"=>array("reglas"=>"trim|required|min_length[5]|max_length[255]","validaciones"=>array("trim"=>"Campo tema requerido.","required"=>"Campo tema requerido.","min_length"=>"Ingrese 5 caracteres o más en el campo tema.","max_length"=>"Ha rebasado el límite de caracteres permitidos para el campo tema.")),
			"id_area"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione un área.","required"=>"Seleccione un área.","is_natural_no_zero"=>"Seleccione un área.")),
			"objetivo"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Ingrese un objetivo.","required"=>"Ingrese un objetivo."))
			);
		$data_tema=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("add_input_temas_$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"add_input_temas_$key"));exit(0);
			}else{
				$data_tema["$key"]=$this->security->xss_clean($this->input->post("add_input_temas_$key"));
			}
		}

		if( empty( $this->security->xss_clean($this->input->post("PC")) ) ){
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Agregue puntos clave","input"=>"addValor"));exit(0);
		}else{
			unset($data_tema["objetivo"]);
			$id_tema = $this->model->addTema($data_tema);
			if($id_tema){

				$data_puntos_clave=array();
				$pts=array();

				$pts=$this->security->xss_clean($this->input->post("PC"));
				$cont=0;
				foreach($pts as $value){
					$aux1=array();
					$aux1=explode("_",$value);
					if( array_key_exists(0, $aux1) && array_key_exists(1, $aux1) ){
						$data_puntos_clave[$cont]["id_tema"]=$id_tema;
						$data_puntos_clave[$cont]["numeracion"]="PC".$aux1[0];
						$data_puntos_clave[$cont]["punto_clave"]=$aux1[1];
					}else{
						echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar los puntos clave, edite el tema.","input"=>"add_input_temas_punto_clave"));exit(0);
					}
					$cont++;
				}

				$addPC = $this->model->addPuntosClave($data_puntos_clave);
				if(!$addPC){
					echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar los puntos clave, edite el tema.","input"=>"add_input_temas_punto_clave"));exit(0);
				}

				$data_objetivo["id_tema"]=$id_tema;
				$data_objetivo["objetivo"]=$this->security->xss_clean($this->input->post("add_input_temas_objetivo"));
				$addObjetivo = $this->model->addObjetivo($data_objetivo);

				if(!$addObjetivo){
					echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar los puntos clave, edite el tema.","input"=>"add_input_temas_punto_clave"));exit(0);
				}
				echo json_encode(array("estatus"=>TRUE,"msg"=>"Se agregó nuevo registro."));
			}else{
				echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>""));
			}
		}
	}

	public function updTema(){
		$this->acceso();
		if( $this->session->rol =="admin" ){

			$form=array(
				"tema"=>array("reglas"=>"trim|required|min_length[5]|max_length[255]","validaciones"=>array("trim"=>"Campo tema requerido.","required"=>"Campo tema requerido.","min_length"=>"Ingrese 5 caracteres o más en el campo tema.","max_length"=>"Ha rebasado el límite de caracteres permitidos para el campo tema.")),
				"id_area"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione un área.","required"=>"Seleccione un área.","is_natural_no_zero"=>"Seleccione un área.")),
				"objetivo"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Ingrese un objetivo.","required"=>"Ingrese un objetivo."))
				);
			$data_tema=array();
			foreach($form as $key => $value){
				$this->form_validation->set_rules("upd_input_temas_$key","$key",$value["reglas"],$value["validaciones"]);
				if($this->form_validation->run()==FALSE){
					echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"upd_input_temas_$key"));exit(0);
				}else{
					$data_tema["$key"]=$this->security->xss_clean($this->input->post("upd_input_temas_$key"));
				}
			}
			$objetivo = $data_tema["objetivo"];
			unset($data_tema["objetivo"]);
			$id_tema = $this->security->xss_clean($this->input->post("upd_input_temas_id_tema"));
			$upd = $this->model->updTema($id_tema,$data_tema);
			$this->model->updObjetivo($id_tema,array("id_tema"=>$id_tema,"objetivo"=>$objetivo));


		}else{


			$form=array(
				"objetivo"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Ingrese un objetivo.","required"=>"Ingrese un objetivo."))
				);
			$data_tema=array();
			foreach($form as $key => $value){
				$this->form_validation->set_rules("upd_input_temas_$key","$key",$value["reglas"],$value["validaciones"]);
				if($this->form_validation->run()==FALSE){
					echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"upd_input_temas_$key"));exit(0);
				}else{
					$data_tema["$key"]=$this->security->xss_clean($this->input->post("upd_input_temas_$key"));
				}
			}
			$objetivo = $data_tema["objetivo"];
			$id_tema = $this->security->xss_clean($this->input->post("upd_input_temas_id_tema"));
			$upd=$this->model->updObjetivo($id_tema,array("id_tema"=>$id_tema,"objetivo"=>$objetivo));


		}

			
		if($upd){
			
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro modificado."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al editar el registro.","input"=>""));exit(0);
		}
	}

	public function getRow(){
		$this->acceso();
		$id = $this->security->xss_clean($this->input->post("id"));
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$info = array();
		switch ($tipo) {
			case 'especialidades':
				$info = $this->model->getEspecialidad($id);
				break;
			case 'divisiones':
				$info = $this->model->getDivision($id);
				break;
			case 'areas':
				$info = $this->model->getArea($id);
				break;
			case 'temas':
				$info = $this->model->getTema($id);
				break;
			case 'puntos_clave':
				$info = $this->model->getPuntoClave($id);
				break;
			case 'objetivos':
				$info = $this->model->getObjetivo($id);
				break;
			case 'casos_clinicos':
				$info = $this->model->getCasoClinico($id);
				break;
			case 'addOperativos': //Carga datos operativos al Agregar Pregunta[id_tema]
				$info = $this->model->getDatosOperativos($id);
				break;
			case 'preguntas_caso': //Carga datos de CASO al editar pregunta[id_caso]
				//$info = $this->model->getCasoPreguntas($id);
				break;
			case 'pregunta': //Carga datos y combos para casos la edición de preguntas[id_pregunta]
				$info = $this->model->getPregunta($id);
				break;
		}
		echo json_encode($info);
	}

	public function addPC(){
		$this->acceso();
		$form=array(
			"id_tema"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Tema requerido.","required"=>"Tema requerido.","is_natural_no_zero"=>"Tema requerido.")),
			"numeracion"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Número requerido.","required"=>"Número requerido.")),
			"punto_clave"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Punto clave rquerido.","required"=>"Punto clave rquerido."))
			);
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("$key"));
			}
		}
		$addPC = $this->model->addPuntoClave($data);
		if($addPC){
			echo json_encode(array("estatus"=>TRUE,"msg"=>$addPC));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar punto clave.","input"=>"add_input_temas_punto_clave"));exit(0);
		}
	}

	public function updPreguntaPC(){
		$this->acceso();
		$id_pregunta = $this->security->xss_clean($this->input->post("idp"));
		$id_punto_clave = $this->security->xss_clean($this->input->post("idpc"));
		$tipo = $this->security->xss_clean($this->input->post("tipo"));
		$upd = $this->model->updPreguntaPC($id_pregunta,$id_punto_clave,$tipo);echo $upd;
		if($upd){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Se agregó nuevo registro."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>""));
		}
	}

	public function addPregunta(){
		$this->acceso();
		$form=array(
			"id_tema"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Tema requerido.","required"=>"Tema requerido.","is_natural_no_zero"=>"Tema requerido.")),
			"pregunta"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Pregunta requerida.","required"=>"Pregunta requerida.")),
			"examen_banco"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Seleccione un estatus.","required"=>"Seleccione un estatus.")),
			"opcion_a"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_b"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_c"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_d"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			//"opcion_e"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"respuesta"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Respuesta requerida.","required"=>"Respuesta requerida.")),
			//"dificultad"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Campo dificultad requerida.","required"=>"Campo dificultad requerida.")),
			"id_complejidad_cognitiva"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una complejidad cognitiva.","required"=>"Seleccione una complejidad cognitiva.","is_natural_no_zero"=>"Seleccione una complejidad cognitiva.")),
			"id_periodo_vida"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione un periodo de vida.","required"=>"Seleccione un periodo de vida.","is_natural_no_zero"=>"Seleccione un periodo de vida."))
			);
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("upd_preguntas_$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"$key"."2"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("upd_preguntas_$key"));
			}
		}

		$pts=array();
		/*if( empty( $this->security->xss_clean($this->input->post("pc")) ) ){
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Seleccione al menos un punto clave","input"=>"pc"));exit(0);
		}else{
			$pts=$this->security->xss_clean($this->input->post("pc"));
		}*/

		$data["opcion_e"]=$this->security->xss_clean($this->input->post("upd_preguntas_opcion_e"));
		$data["id_bibliografia"]=$this->security->xss_clean($this->input->post("upd_preguntas_id_bibliografia"));
		$data["capitulo"]=$this->security->xss_clean($this->input->post("upd_preguntas_capitulo"));
		$data["usuario_creacion"]=$this->session->usuario;

		$addPregunta = $this->model->addPregunta($data,$pts);
		if($addPregunta){
			echo json_encode(array("estatus"=>TRUE,"msg"=>"Se agregó nuevo registro."));
		}else{
			echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al agregar el registro.","input"=>"pregunta2"));exit(0);
		}
	}

	public function updPregunta(){
		$this->acceso();
		$form=array(
			"id_tema"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Tema requerido.","required"=>"Tema requerido.")),
			"pregunta"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Pregunta requerida.","required"=>"Pregunta requerida.")),
			//"examen_banco"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Seleccione un estatus.","required"=>"Seleccione un estatus.")),
			"opcion_a"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_b"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_c"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"opcion_d"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			//"opcion_e"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Llene todas las opciones","required"=>"Llene todas las opciones.")),
			"modificacion"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Indique las modificaciones que realizó.","required"=>"Indique las modificaciones que realizó.")),
			"respuesta"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Respuesta requerida.","required"=>"Respuesta requerida.")),
			//"dificultad"=>array("reglas"=>"trim|required","validaciones"=>array("trim"=>"Campo dificultad requerida.","required"=>"Campo dificultad requerida.")),
			"id_complejidad_cognitiva"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione una complejidad cognitiva.","required"=>"Seleccione una complejidad cognitiva.","is_natural_no_zero"=>"Seleccione una complejidad cognitiva.")),
			"id_periodo_vida"=>array("reglas"=>"trim|required|is_natural_no_zero","validaciones"=>array("trim"=>"Seleccione un periodo de vida.","required"=>"Seleccione un periodo de vida.","is_natural_no_zero"=>"Seleccione un periodo de vida."))
			);
		$data=array();
		foreach($form as $key => $value){
			$this->form_validation->set_rules("upd_preguntas_$key","$key",$value["reglas"],$value["validaciones"]);
			if($this->form_validation->run()==FALSE){
				echo json_encode(array("estatus"=>FALSE,"msg"=>validation_errors(),"input"=>"upd_preguntas_$key"));exit(0);
			}else{
				$data["$key"]=$this->security->xss_clean($this->input->post("upd_preguntas_$key"));
			}
		}

		$data["opcion_e"]=$this->security->xss_clean($this->input->post("upd_preguntas_opcion_e"));
		$data["id_bibliografia"]=$this->security->xss_clean($this->input->post("upd_preguntas_id_bibliografia"));
		$data["capitulo"]=$this->security->xss_clean($this->input->post("upd_preguntas_capitulo"));
		$data["usuario_modificacion"]=$this->session->usuario;
		$data["tipo_examen"]=$this->security->xss_clean($this->input->post("tipo_examen"));
		$id_pregunta=$this->security->xss_clean($this->input->post("upd_preguntas_id_pregunta"));

		//Acción.
		$accion = "POR_REVISAR";
		$accion_comentario = "";
		$examen_banco = $this->security->xss_clean($this->input->post("upd_preguntas_examen_banco"));
		if( $examen_banco == "EXAMEN" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_examen"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_EXAMEN"));
		}

		if( $examen_banco == "EXAMEN_2020" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_examen_2020"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_EXAMEN_2020"));
		}
		if( $examen_banco == "EXAMEN_2019" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_examen_2019"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_EXAMEN_2019"));
		}

		if( $examen_banco == "BANCO" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_banco"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_BANCO"));
		}

		if( $examen_banco == "PILOTO" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_piloto"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_PILOTO"));
		}
		if( $examen_banco == "PILOTO_2020" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_piloto_2020"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_PILOTO_2020"));
		}

		if( $examen_banco == "RESERVA" ){
			$accion = $this->security->xss_clean($this->input->post("upd_preguntas_accion_reserva"));
			$accion_comentario = $this->security->xss_clean($this->input->post("upd_preguntas_accion_comentario_RESERVA"));
		}
		$data['examen_banco']=$examen_banco;
		$data['accion']=$accion;
		$data['accion_comentario']=$accion_comentario;

		$updPregunta = $this->model->updPregunta($data,$id_pregunta);
		if($updPregunta['upd']==="NO"){
			echo json_encode(array("estatus"=>FALSE,"msg"=>$updPregunta['msg']));
		}else{
			if($updPregunta['upd']){
				echo json_encode(array("estatus"=>TRUE,"msg"=>"Registro modificado."));
			}else{
				echo json_encode(array("estatus"=>FALSE,"msg"=>"Error al editar el registro.","input"=>""));exit(0);
			}
		}
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}

	public function preguntas(){
		$this->acceso();
		$id_especialidad = $this->session->cc;
		$especialidad = $this->model->getEspecialidad($id_especialidad);
		$divisiones = $this->model->getIdsDivisiones($id_especialidad,"SI");
		$divisiones2 = $this->model->getIdsDivisiones($id_especialidad,"NO");

		$preguntas_piloto = $this->model->get_preguntas_piloto();
		$preguntas_examen = $this->model->get_preguntas_examen();

		$complejidad_cognitiva = $this->model->getComplejidadesCognitivas();
		$periodo_vida = $this->model->getPeriodosVida();
		$bibliografia = $this->model->getBibliografias();
		$this->load->view('index',
			array(
				"titulo"=>"PLANTILLA DE COMITÉS",
				"menu"=>"conocimientos_generales",
				"sbmenu"=>"cg_preguntas",
				"contenido"=>$this->load->view("conocimientos_generales/preguntas/preguntas",array(
					"id_especialidad"=>$id_especialidad,
					"especialidad"=>strtoupper($especialidad),
					"divisiones"=>$divisiones,
					"divisiones2"=>$divisiones2,
					"piloto"=>$preguntas_piloto,
					"examen"=>$preguntas_examen,

					"complejidad_cognitiva"=>$complejidad_cognitiva,
					"periodo_vida" => $periodo_vida,
					"bibliografia"=>$bibliografia
					),true),
				"script"=>$this->load->view("conocimientos_generales/preguntas/preguntas.js.php",array(),true),
				)
			);
	}
}