<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function do_upload()
	{	
		$config['upload_path'] = FCPATH.'libs/upload/';
		$config['allowed_types'] = 'pdf';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('file'))
		{	
			echo "Erro upload";
			exit();
		}
		else
		{
			$data_arquivo = $this->upload->data();
			$nome_arquivo = $data_arquivo['file_name'];
			
			$dados = array(
						"nome" => $this->input->post('nome'),
						"descricao" => $this->input->post("descricao"),
						"upload" => $nome_arquivo
			);

			$this->load->model('cadastro_model');
			$returnData = $this->cadastro_model->register($dados);
		}
	}
}
