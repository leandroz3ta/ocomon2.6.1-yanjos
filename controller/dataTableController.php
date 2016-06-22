<?php

	//carrega as configurações iniciais
	include("../resources/config/geral.php");
	require_once("../model/dao/GeneralDAO.class.php"); // Classe DAO

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	require_once("../model/bean/Ticket.class.php"); // Classe Bean
	require_once("../model/dao/TicketDAO.class.php"); // Classe DAO
	
	$ticketDAO = new TicketDAO();
	$area=array(1,3);
	echo json_encode(
		$ticketDAO->operatorTicket($_GET,$area)
	);

