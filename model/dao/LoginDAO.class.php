<?php

require_once("../model/bean/Login.class.php");
require_once("dbconfig.php"); // Classe conexao com o banco

class LoginDAO{
	
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	function autenticaUsuario($user){
		
		try
		{
			$login = $user->getLogin();
			$password = $user->getPassword();
			$stmt = $this->conn->prepare("SELECT login,password FROM usuarios WHERE login=:login and password=:password ");
			$stmt->execute(array(':login'=>$login, ':password'=>$password));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				$_SESSION['user_session'] = $userRow['login'];
				return true;
			}
			else
				return false;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}
	
		public function redirect($url)
	{
		header("Location: $url");
	}

}

?>