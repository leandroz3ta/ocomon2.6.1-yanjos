<meta charset="UTF-8">
<title>Ocomon</title>

<?php
//carrega os CSS e JS utilizado no menu
include($includeCSS."menu.php");
include($includeJS."menu.php");
//carrega os CSS e JS utilizado no formulario
include($includeCSS."forms.php");
include($includeJS."forms.php");


# Verificando se não existe o cookie
if($_SESSION['atende'] == 1)
{
?>
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
<?php
	$_SESSION['atende'] = 0;
}
?>
			
