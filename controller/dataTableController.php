<?php

	//carrega as configurações iniciais
	include_once("../resources/config/geral.php");
	include_once($controllerGeneral); // Classe DAO

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	include_once($daoDataTable); // Classe DAO
	
	
	$dataTableDAO = new DataTableDAO();
	$userID=$_SESSION['userID'];
	$allArea=$_SESSION['allArea'];
	$atende=$_SESSION['atende'];
	
	
	if ($atende == 1)
		echo json_encode( 
			$dataTableDAO->operatorTicket($_GET,$allArea));
	else
		echo json_encode( 
			$dataTableDAO->userTicket($_GET,$userID));

?>