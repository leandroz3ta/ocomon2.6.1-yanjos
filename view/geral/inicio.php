<?php
include("../../resources/config/geral.php");
include($includeLANGUAGE.LANGUAGE);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ocomon</title>
	
	<?php
		include($includeCSS."menu.php");
		include($includeJS."menu.php");
		
		include($includeCSS."forms.php");
		include($includeJS."forms.php");
	?>
	
			
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
	
	
</body>
</html>