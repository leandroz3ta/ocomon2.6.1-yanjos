<?php
	
	//carrega as configurações iniciais
	require_once("../../resources/config/geral.php");
	
	require_once("../../model/dao/GeneralDAO.class.php"); // Classe DAO

	$generalDAO = new GeneralDAO();
	

	$generalDAO->validateUser($linkLogin);
?>