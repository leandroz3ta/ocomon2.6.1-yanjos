<?php
	
	//carrega as configura��es iniciais
	include("../resources/config/geral.php");

	//Aqui importamos todas as classes que poder�o ser usadas baseado nas solicita��es que forem feitas.
	require_once("../model/bean/Login.class.php"); // Classe Bean
	require_once("../model/dao/LoginDAO.class.php"); // Classe DAO
		
	//Primeiro instanciamos um objeto da classe Bean, para setar os valores informados no formul�rio
	$usuario = new Login();	
	
	/* Agora setamos para a Bean os valores informados,pois ser�o validados na camada DAO, que 
	ir� verificar a consistencia dos dados em um Banco de Dados: MySQL, XML, ou qualquer outra base de dados; e depois retornar para a controller o resultado. */
	$usuario->setLogin($_REQUEST["formUsuario"]);
	$usuario->setPassword($_REQUEST["formSenha"]);
	
	/* Agora vamos instanciar um objeto da classe DAO e um da View, e passaremos para a View o que for retornado pela DAO */		
	$usuarioDAO = new LoginDAO();
	
	//Passaremos para o m�todo de autentica��o da DAO um objeto da classe Usu�rio. Armazenaremos na vari�vel $resultado o que este m�todo retornar. 
	$resultado = $usuarioDAO->autenticaUsuario($usuario);
	
		if($resultado){
			$usuarioDAO->redirect($linkHome);
		}
		else{
			echo '<p class="red">Erro ao efetuar o login. Dados incorretos!</p>';
		}
		
?>