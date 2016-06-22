<?php

require_once("../model/bean/Login.class.php");
require_once("dbconfig.php"); // Classe conexao com o banco
require_once("GeneralDAO.class.php"); // Classe DAO

class LoginDAO extends GeneralDAO{
	
	
	
	function authenticateUser($user){
		
		try
		{
			$login = $user->getLogin();
			$password = $user->getPassword();
			$stmt = $this->conn->prepare("SELECT * FROM authenticate_user WHERE nivel<>5 AND login=:login and password=:password ");
			$stmt->execute(array(':login'=>$login, ':password'=>$password));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				session_start();
				$_SESSION['user'] = $userRow['login'];
				$_SESSION['userID'] = $userRow['user_id'];
				$_SESSION['nivel'] = $userRow['nivel'];
				$_SESSION['area'] = $userRow['area'];
				$_SESSION['userAdmin'] = $userRow['user_admin'];
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
	

}

?>