<?php
include_once("../resources/config/geral.php");
include_once($daoSelectOption); // Classe DAO

if(isset($_POST['responsibleArea'])){
	
	$selectOptionDAO = new SelectOptionDAO();
	$cod = $_POST['responsibleArea'];
	$problem = $selectOptionDAO->problem($cod);
	
	echo json_encode($problem);

}

if(isset($_POST['problem'])){

	$selectOptionDAO = new SelectOptionDAO();
	$cod = $_POST['problem'];
	$codArea = $_POST['responsibleAreaSub'];
	$subProblem = $selectOptionDAO->subProblem($cod,$codArea);

	echo json_encode($subProblem);

}

if(isset($_POST['idName'])){

	$selectOptionDAO = new SelectOptionDAO();
	$cod = $_POST['idName'];
	$subProblem = $selectOptionDAO->catchEmail($cod);

	echo json_encode($subProblem);

}
?>	