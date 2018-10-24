<?php 

class Login {
	
	private $connect;

    public function __construct(){
    	date_default_timezone_set('America/Sao_Paulo');
       $this->connect = new mysqli('p:localhost','root','','crud_bd'); //Set access BD
    }

	public function register($form) {
		if($this->connect) {
			if(empty($form['username']) or empty($form['password']) or empty($form['confirm-password'])) { //Verify empty inputs
				session_start();
				$_SESSION['empty-input-register'] = 'Empty inputs';
				header('Location: ../register.php');
				die();
			} else if($form['password'] != $form['confirm-password']) { //Match Password
				session_start();
				$_SESSION['password-not-match'] = 'Passwords do not match';
				header('Location: ../register.php');
				die();
			}
			
			//Verify user exist 
			$username = $form['username'];
			$select_user = $this->connect->query("SELECT username FROM register WHERE username = '$username'");
			if($select_user->num_rows > 0) {
				session_start();
				$_SESSION['user-exist'] = "User already exists";
				header('Location: ../register.php');
				die();
			} else {  
				//Insert Register User
				$insert_user = "INSERT INTO register (username,password,date_register) VALUES ('".$form['username']."','".md5($form['password'])."','".date('Y-m-d H:i')."')"; 
				$resultado = $this->connect->query($insert_user);
				$last_id = $this->connect->insert_id;

				if($resultado) {
					//Insert Login
					$insert_login = "INSERT INTO login (id_user_register,username,password,flg_active) VALUES ('".$last_id."','".$form['username']."','".md5($form['password'])."','1')";
					$result_user = $this->connect->query($insert_login);
					if($result_user) {
						header('Location: ../index.php');
					} else { echo 'Error insert login'; }
				} else { echo 'Error insert user'; }
			}
		} else { echo 'Error connect BD'; }
		$this->connect->close();
	}

	public function login($form) {
		if(empty($form['username']) and empty($form['password'])) { //Verify empty inputs 
			session_start();
			$_SESSION['empty-input'] = 'Empty input fields';
			header('Location: ../index.php');
		}

		$username = $form['username'];
		//Verify user exist
		$select_user = $this->connect->query("SELECT * FROM login WHERE username = '$username'");
		$row = $select_user->fetch_assoc();
		if($select_user->num_rows > 0) {
			$pw = md5($form['password']);
			$password_match = $this->connect->query("SELECT password,flg_active FROM login WHERE password = '$pw' AND flg_active = '1'");
			if($password_match->num_rows > 0) {
				session_start();
				$_SESSION['id_user'] = $row['id_login'];
				$_SESSION['username'] = $row['username'];
				header('Location: ../home.php');
			} else { 
				session_start();
				$_SESSION['password-does-match'] = "Password does not exist"; 
				header('Location: ../index.php');
			}
		} else { 
			session_start();
			$_SESSION['user-not-exist'] = "User does not exist"; 
			header('Location: ../index.php');
		}
		$this->connect->close();
	}

	public function logout() {
		session_start();
		session_destroy();
		header('Location: ../index.php');
	}
}