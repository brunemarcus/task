<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() 
	{
    	parent::__construct();
    	$this->load->database();
    	$this->load->helper('date');
	}

	public function send()
	{
		$this->load->model('usuario_model');
		$this->usuario_model->sendUser();
	}

	public function login()
	{
		$this->load->model("usuario_model");
		$this->usuario_model->loginopen();
	}

	public function sair()
	{
		$this->load->model("usuario_model");
		$this->usuario_model->deslogado();
	}
}
