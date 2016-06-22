<?php
	//carrega as configurações iniciais
	include("../../resources/config/geral.php");

	# Inicnando a variavel que vai indentificar se temos que exibir o modal ou não
	$exibirModal = true;
	# Verificando se não existe o cookie
	if(!isset($_COOKIE["usuarioVisualizouModal"]))
	{
	# Caso não exista entra aqui.

	# Vamos criar o cookie com duração de 1 semana</pre>
	setcookie('usuarioVisualizouModal', 'SIM');

	# Seto nossa variavel de controle com o valor TRUE ( Verdadeiro)
	$exibirModal = true;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ocomon</title>
	
	<?php
		//carrega os CSS e JS utilizado no menu
		include($includeCSS."menu.php");
		include($includeJS."menu.php");
		//carrega os CSS e JS utilizado no formulario
		include($includeCSS."forms.php");
		include($includeJS."forms.php");
	?>
	
		<?php if($exibirModal === true) : ?>
		<!-- Jquery para abrir modal com os avisos do sistema -->
			<script type="text/javascript" language="javascript">
			$(document).ready(function() {
			if( !$('#sky-form-modal-overlay').length )
		{
			$('body').append('<div id="sky-form-modal-overlay" class="sky-form-modal-overlay"></div>');
		}		
	
		$('#sky-form-modal-overlay').on('click', function()
		{
			$('#sky-form-modal-overlay').fadeOut();
			$('.sky-form-modal').fadeOut();
		});
		
		form = $($('#avisos'));
		$('#sky-form-modal-overlay').fadeIn();
		form.css('top', '50%').css('left', '50%').css('margin-top', -form.outerHeight()/2).css('margin-left', -form.outerWidth()/2).fadeIn();
		
		return false;
		} );
		</script>
		
		<?php endif;?>
			
	<script type="text/javascript">
	function clique(href){		
		$.ajax({
			url: href,
			beforeSend: function () {
			$("#container").html('<img src="loading.gif" style="border: 0;width: 100px;margin-top: 100px;" />');
			},
			success: function( response ){
				$('#container').html(response);
			}
		});
		return false;
	}
	
	function teste(){		
		alert("teste");
	}	
	
        
	
	
	</script>


</head>
<body class="bg-red">

	<!-- HTML Markup for Top Navigation Menu -->	
	<nav>
		<ul id="topMenu">
			<li><a href="#" class="icon icon-menu" id="btn-menu">Menu</a></li>
			<li><a href="<?php echo $linkOpenTicket;?>" onclick="return clique(this.href)">Abrir Chamado</a></li>
			<li><a href="<?php echo $linkTickets;?>" onclick="return clique(this.href)">Meus Chamados</a></li>
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
			</li>
			<li><a href="#" class="icon icon-social"><span>Social Media</span></a>
				<ul>
				<li><a href="#"><span>Facebook</span></a></li>
				<li><a href="#"><span>Twitter</span></a></li>								
				</ul>	  -->		
			</li>
		</ul>	
	</div>	
	
	
	<!-- Demo Page Description -->
	<div id="container" class="container">
		

		
	</div>
	
	<form action="demo-login-process.php" id="avisos" class="sky-form sky-form-modal">
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
		
</body>
</html>