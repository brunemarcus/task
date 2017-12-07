<?php 
class Tarefas_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('user_agent');
	}

	public function alltask()
	{
		$query = $this->db->get("tarefas");
		return $query->result_array();
	}

	public function deletar()
	{
		$id = $_GET['id'];
		$this->db->delete('tarefas', array('id' => $id));
		$url = base_url('home');

		header("Location: $url");
	}

	public function editar()
	{
		$id_p = $this->input->post('id');
		$nome = $this->input->post('nome');
		$descricao = $this->input->post('descricao');

		$query = $this->db->query("UPDATE tarefas SET nome = '$nome', descricao = '$descricao'");
		$d_url = $this->agent->referrer();
		header("Location: $d_url");
	}
}
?>