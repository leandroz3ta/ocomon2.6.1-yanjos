<?php
	
	//carrega as configurações iniciais
	include_once("../resources/config/geral.php");
	
	include_once($daoLogin); // Classe Bean
	include_once($beanLogin); // Classe DAO
	
	$usuarioDAO = new LoginDAO();
	
	if(isset($_POST['login'])){		
		$usuario = new Login();
		$usuario->setLogin($_REQUEST["formUsuario"]);
		$usuario->setPassword($_REQUEST["formSenha"]);	
		$userRow = $usuarioDAO->authenticateUser($usuario);
		if($userRow == false)
			$usuarioDAO->redirect($linkError);
		else {
			session_start();
			$_SESSION['user'] = $userRow['login'];
			$_SESSION['userID'] = $userRow['user_id'];
			$_SESSION['nivel'] = $userRow['nivel'];
			$_SESSION['area'] = $userRow['area'];
			$_SESSION['userAdmin'] = $userRow['user_admin'];
			$_SESSION['atende'] = $userRow['sis_atende'];
			$_SESSION['allArea'] = $usuarioDAO->areaUser( $userRow['user_id'] );	
			$_SESSION['modal'] = 1;
			$_SESSION['email'] = $userRow['email'];
			$usuarioDAO->redirect($linkTickets); 
			}
			
	}
	
	if(isset($_GET['logoff'])){
		$usuarioDAO->logoff($linkLogin);
	}

		
?>