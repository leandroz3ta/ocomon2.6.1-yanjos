<?php

include_once("dbconfig.php"); // Classe conexao com o banco
include_once("GeneralDAO.class.php"); // Classe DAO

class LoginDAO extends GeneralDAO{
	
	
	function authenticateUser($user){
		
		try
		{
			$login = $user->getLogin();
			$password = $user->getPassword();
			$stmt = $this->conn->prepare("SELECT * FROM authenticate_user WHERE nivel<>5 AND login=:login and password=:password ");
			$stmt->execute(array(':login'=>$login, ':password'=>$password));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			return $userRow;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
	}
	
	function areaUser($userID){
				
		try
		{	
			$stmt = $this->conn->prepare("SELECT uarea_uid,uarea_sid FROM usuarios_areas WHERE uarea_uid=:userID ");
			$stmt->execute(array(':userID'=>$userID));
			$userRow=$stmt->fetchAll();
			
			$areaReturn='';
			if($stmt->rowCount() > 1){
				for ( $i=0, $j=count($userRow) ; $i<$j ; $i++ ) {
					$n= $j-1;
					if($i == $n)
						$areaReturn.=$userRow[$i]['uarea_sid'];
					else
						$areaReturn.=$userRow[$i]['uarea_sid'].",";
				}
				return $areaReturn;				
			}
			else
				return $areaReturn;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}		
		
		
	}
	
	function logoff($linkLogin){
	
		try
		{	
			
			session_destroy();
					
			self::redirect($linkLogin);
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	
	
	}

}

?>