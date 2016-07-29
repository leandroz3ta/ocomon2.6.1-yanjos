<?php
	
	//carrega as configurações iniciais
	require_once("../resources/config/geral.php");
	
	require_once("../model/bean/Login.class.php"); // Classe Bean
	require_once("../model/dao/LoginDAO.class.php"); // Classe DAO
	
	$usuarioDAO = new LoginDAO();
	
	if(isset($_POST['login'])){		
		$usuario = new Login();
		$usuario->setLogin($_REQUEST["formUsuario"]);
		$usuario->setPassword($_REQUEST["formSenha"]);	
		$usuarioDAO->authenticateUser($usuario,$linkTickets,$linkError);
	}
	
	if(isset($_GET['logoff'])){
		$usuarioDAO->logoff($linkLogin);
	}

		
?>