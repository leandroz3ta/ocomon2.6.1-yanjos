<?php
	
	include_once($daoGeneral); 

	$generalDAO = new GeneralDAO();
	

	$generalDAO->validateUser($linkLogin);
?>