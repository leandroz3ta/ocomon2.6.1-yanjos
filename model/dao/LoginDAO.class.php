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
				$_SESSION['atende'] = $userRow['sis_atende'];
				$_SESSION['allArea'] = self::areaUser( $userRow['user_id'] );
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

}

?>