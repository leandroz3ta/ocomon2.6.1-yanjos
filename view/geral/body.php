<?php
	//carrega as configurações iniciais
	require_once("../../resources/config/geral.php");	
	require_once($controllerGeneral);
?>
<!DOCTYPE HTML>


	<!-- HTML Markup for Top Navigation Menu -->	
	<nav>
		<ul id="topMenu">
			<li><a href="#" class="icon icon-menu" id="btn-menu">Menu</a></li>
			<li><a href="<?php echo $linkOpenTicket;?>">Abrir Chamado</a></li>
			<li><a href="<?php echo $linkTickets;?>">Meus Chamados</a></li>
			<li><a href="<?php echo $controllerLogin;?>?logoff=1" >LogOff</a></li>
		</ul>
	</nav>

	<!-- HTML Markup for Sidebar Slide Out Menu -->
	<div id="sideNav">
		<ul>
			<li class="searchForm"><a href="#" class="icon icon-search"><span><input type="text" placeholder="Consulta" class="search" /></span></a></li>
			<li><a href="#" class="icon icon-home" ><span>Meus Chamados</span></a></li>
			<li><a href="#" class="icon icon-articles"><span>Abrir Chamados</span></a>
			<!--	<ul>
					<li><a href="#"><span>Web Design</span></a></li>
					<li><a href="#"><span>Web Development</span></a></li>
				</ul>
			</li>-->	
			<li><a href="#" class="icon icon-social"><span>Social Media</span></a>
				<ul>
				<li><a href="<?php echo $linkConfigGeral;?>" ><span>Facebook</span></a></li>
				<li><a href="#"><span>Twitter</span></a></li>								
				</ul>	  	
			</li>
		</ul>	
	</div>	
	
	
	<div id="container" class="container">
		

		
	</div>
	
	<form action="" id="avisos" class="sky-form sky-form-modal">
			<header>Avisos</header>
			
			<fieldset>					
				<section>
					<label class="label">data</label>
					<label class="label">mensagem xyz</label>
				</section>
			</fieldset>
			
			<footer>
				<a href="#" class="button button-secondary modal-closer"><?php echo $LANG["Close"]; ?></a>
			</footer>
				
	</form>
		
