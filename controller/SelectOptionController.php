<?php
//carrega as configurações iniciais
include_once("../resources/config/geral.php");
include_once("../model/dao/GeneralDAO.class.php"); 

include_once("../model/dao/SelectOptionDAO.class.php"); // Classe DAO

$selectOptionDAO = new SelectOptionDAO();

	if(isset($_GET['area'])){
		echo json_encode($selectOptionDAO->areaOpenTicket());
	}
	
	if(isset($_GET['filial'])){
		echo json_encode($selectOptionDAO->filialOpenTicket());
	}
	
?>	