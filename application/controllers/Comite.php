<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comite extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		redirect("Login");
	}

	public function gyo()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","gyo");
		$this->session->set_userdata("cc","2");
		$this->session->set_userdata("cg","2");
		redirect("Login");
	}

	public function brh()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","brh");
		$this->session->set_userdata("cc","3");
		$this->session->set_userdata("cg","3");
		redirect("Login");
	}

	public function mmf()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","mmf");
		$this->session->set_userdata("cc","4");
		$this->session->set_userdata("cg","4");
		redirect("Login");
	}

	public function uro()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","uro");
		$this->session->set_userdata("cc","5");
		$this->session->set_userdata("cg","5");
		redirect("Login");
	}

	public function uro2()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","uro2");
		$this->session->set_userdata("cc","6");
		$this->session->set_userdata("cg","6");
		redirect("Login");
	}

	public function uropuem()
	{	
		$this->acceso();
		$this->session->set_userdata("especialidad","uropuem");
		$this->session->set_userdata("cc","7");
		$this->session->set_userdata("cg","7");
		redirect("Login");
	}

	private function acceso(){
		if( !$this->session->logged ){
			redirect("login");
		}
	}
}