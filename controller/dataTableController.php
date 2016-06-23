<?php

	//carrega as configurações iniciais
	require_once("../resources/config/geral.php");
	require_once("../model/dao/GeneralDAO.class.php"); // Classe DAO

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	require_once("../model/bean/Ticket.class.php"); // Classe Bean
	require_once("../model/dao/TicketDAO.class.php"); // Classe DAO
	
	
	$ticketDAO = new TicketDAO();
	$userID=$_SESSION['userID'];
	$allArea=$_SESSION['allArea'];
	$atende=$_SESSION['atende'];
	
	
	if ($atende == 1)
		echo json_encode( 
			$ticketDAO->operatorTicket($_GET,$allArea));
	else
		echo json_encode( 
			$ticketDAO->userTicket($_GET,$userID));

