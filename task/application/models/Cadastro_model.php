<?php 
class Cadastro_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register($returnData)
	{
		$this->db->insert("tarefas", $returnData);	
	
		header("Location: home?cadastrado=sucesso");
	}
}
?>