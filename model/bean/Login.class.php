<?php

class Login{

	var $login;
	var $password;
	
	//Login
	function getLogin(){
		return $this -> login;
	}
	function setLogin($login){
		$this -> login = $login;	
	}
		
	//Senha
	function getPassword(){
		return $this -> password;
	}
	function setPassword($password){
		$this -> password = md5($password);	
	}

}

?>