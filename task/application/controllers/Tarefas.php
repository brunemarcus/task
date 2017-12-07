<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('download');
	}

	public function home()
	{
		$this->load->model("tarefas_model");
		$data['index'] = $this->tarefas_model->alltask();
		$this->load->view('task', $data);
	}

	public function drop()
	{
		$this->load->model("tarefas_model");
		$this->tarefas_model->deletar();
	}

	public function view()
	{
		$id = $_GET['id'];
		$this->db->select("*");
		$this->db->where("id",$id);
		$query['dados'] = $this->db->get("tarefas")->result_array();
		$this->load->view("visualizar",$query);
	}

	public function download()
	{
		//Download Anexo
		$name_arquivo = $_GET['up'];

		force_download($name_arquivo, file_get_contents("../../libs/upload/".$name_arquivo));
	}

	public function editar()
	{
		$id_p = $_GET['id'];
		$this->db->select("*");
		$this->db->where("id",$id_p);
		$query['dados'] = $this->db->get("tarefas")->result_array();
		$this->load->view('edit', $query);
	}

	public function edit()
	{
		$this->load->model("tarefas_model");
		$this->tarefas_model->editar();
	}
}
