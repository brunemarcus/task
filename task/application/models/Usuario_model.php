<?php 
class Usuario_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
		$this->load->library('user_agent');
	}

	public function sendUser()
	{

		//Compara Senha
		$senha = md5($this->input->post("senha"));
		$conf_senha = md5($this->input->post("conf_senha"));

		if($senha != $conf_senha)
		{
			echo "Senhas diferentes";
			exit();
		}

		$data = array(
			"email" => $this->input->post("email"),
			"senha" => $senha,
			"conf_senha" => $conf_senha
			);

		$login = array(
			"email" => $this->input->post("email"),
			"senha" => $senha
			);

		$this->db->insert('registro',$data);
		$this->db->insert('login', $login);

		echo "Cadastrado com sucesso";
	}

	public function loginopen()
	{
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));

		$this->db->select("email");
		$this->db->where('email',$email);
		$login = $this->db->get('login');
		$result = $login->num_rows();

		if($result > 0)
		{
			//Verifica Senha
			$query = $this->db->query("SELECT * FROM login WHERE senha = '$senha'");
			$row = $query->row();

			if(isset($row))
			{
				$session = array(
							"email" => $email,
							"id" => $id
				);

				$this->session->set_userdata($session);
				$domain = base_url('home');

				header("Location: $domain");
			}
			else
			{
				$url = base_url();
				header("Location: $url");
				exit();
			}
		}
		else
		{
			$backUrl = $this->agent->referrer();
			header("Location: $backUrl");
			exit();
		}
	}

	public function deslogado()
	{
		$close = array('email', 'id');
		$this->session->unset_userdata($close);

		$domain = base_url();
		header("Location: $domain");
	}
}
?>