<?php

	//carrega as configurações iniciais
	include("../resources/config/geral.php");

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	require_once("../model/bean/Ticket.class.php"); // Classe Bean
	require_once("../model/dao/TicketDAO.class.php"); // Classe DAO
	
	$ticketDAO = new TicketDAO();
	
	echo json_encode(
		$ticketDAO->operatorTicket($_GET,1)
	);

