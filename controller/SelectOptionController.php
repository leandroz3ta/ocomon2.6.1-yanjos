<?php
include_once("../resources/config/geral.php");
include_once($daoSelectOption); // Classe DAO

if(isset($_POST['responsibleArea'])){
	
	$selectOptionDAO = new SelectOptionDAO();
	$cod = $_POST['responsibleArea'];
	$responsibleArea = $selectOptionDAO->responsibleArea($cod);
	
	echo json_encode($responsibleArea);

}

if(isset($_POST['problem'])){

	$selectOptionDAO = new SelectOptionDAO();
	$cod = $_POST['problem'];
	$subProblem = $selectOptionDAO->subProblem($cod);

	echo json_encode($subProblem);

}

?>	