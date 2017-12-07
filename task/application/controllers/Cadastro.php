<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function registro()
	{
		$this->load->view('new_task');
	}
}
