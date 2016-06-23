<?php

//carrega as configurações iniciais
include("../../resources/config/geral.php");


?>

<!DOCTYPE html> 
<html>
	<head>
		<title>Error</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		<?php 
			include($includeCSS."forms.php");
			include($includeJS."forms.php");
		?>
	</head>
	
	<body class="bg-purple">
		<div class="body">		
			<form action="<?php echo $linkLogin; ?>" id="sky-form" class="sky-form">
				<header>Error</header>
				
				<fieldset>					
					<div class="label">You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.</div>
				</fieldset>
				
				<footer>
					<button type="submit" class="button" >Continue</button>
				</footer>
			</form>			
		</div>
		
	</body>
</html>