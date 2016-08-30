<?php

class OpenTicket{

	var $number;
	var $description;
	
	//Number
	function getNumber(){
		return $this -> Number;
	}
	function setNumber($number){
		$this -> number = $number;	
	}
		
	//description
	function getDescription(){
		return $this -> description;
	}
	function setDescription($description){
		$this -> description = md5($description);	
	}

}

?>