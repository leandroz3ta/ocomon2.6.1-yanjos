<?php
	
	//carrega as configurações iniciais
	include("../resources/config/geral.php");

	//Aqui importamos todas as classes que poderão ser usadas baseado nas solicitações que forem feitas.
	require_once("../model/bean/Login.class.php"); // Classe Bean
	require_once("../model/dao/LoginDAO.class.php"); // Classe DAO
		
	//Primeiro instanciamos um objeto da classe Bean, para setar os valores informados no formulário
	$usuario = new Login();	
	
	/* Agora setamos para a Bean os valores informados,pois serão validados na camada DAO, que 
	irá verificar a consistencia dos dados em um Banco de Dados: MySQL, XML, ou qualquer outra base de dados; e depois retornar para a controller o resultado. */
	$usuario->setLogin($_REQUEST["formUsuario"]);
	$usuario->setPassword($_REQUEST["formSenha"]);
	
	/* Agora vamos instanciar um objeto da classe DAO e um da View, e passaremos para a View o que for retornado pela DAO */		
	$usuarioDAO = new LoginDAO();
	
	//Passaremos para o método de autenticação da DAO um objeto da classe Usuário. Armazenaremos na variável $resultado o que este método retornar. 
	$resultado = $usuarioDAO->autenticaUsuario($usuario);
	
		if($resultado){
			$usuarioDAO->redirect($linkHome);
		}
		else{
			echo '<p class="red">Erro ao efetuar o login. Dados incorretos!</p>';
		}
		
?>