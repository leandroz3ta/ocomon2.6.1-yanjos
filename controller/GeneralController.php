<?php
	
	//carrega as configurações iniciais
	include_once("../../resources/config/geral.php");
	
	include_once("../../model/dao/GeneralDAO.class.php"); // Classe DAO

	$generalDAO = new GeneralDAO();
	

	$generalDAO->validateUser($linkLogin);
?>