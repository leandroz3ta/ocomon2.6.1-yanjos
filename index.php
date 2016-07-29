<?php
//carrega as configurações iniciais
include("resources/config/geral.php");

?>

<!DOCTYPE html> 
<html>
	<head>
		<title>Ocomon</title>
		
		<meta charset="iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
		
		<?php
			//carrega os CSS utilizado no formulario
			include($includeCSS."forms.php");
			include($includeJS."forms.php");			
		?>
			
		<script src="<?php echo $pathVALIDATE;?>/index.js"></script>
			
	<body class="bg-red">
		<div class="body body-s">		
			<form action="<?php echo $controllerLogin; ?>" id="formLogin" class="sky-form" method="post">
				<header>Login</header>
				
				<fieldset>					
					<section>
						<div class="row">
							<label class="label col col-4"><?php echo $LANG["User"]; ?></label>
							<div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="formUsuario">
								</label>
							</div>
						</div>
					</section>
					
					<section>
						<div class="row">
							<label class="label col col-4"><?php echo $LANG["Password"]; ?></label>
							<div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-lock"></i>
									<input type="password" name="formSenha">
								</label>
								<div class="note"><a href="#formRecoveryPass" class="modal-opener" ><?php echo $LANG["ForgotPass"]; ?></a></div>
							</div>
						</div>
					</section>
					
				</fieldset>
				<footer>
					<button type="submit" class="button" name="login"><?php echo $LANG["Login"]; ?></button>
					<a href="#" class="button button-secondary"><?php echo $LANG["Register"]; ?></a>
				</footer>
			</form>			
		</div>
		
		
		
		<form action="demo-login-process.php" id="formRecoveryPass" class="sky-form sky-form-modal">
			<header><?php echo $LANG["RecoveryPass"]; ?></header>
			
			<fieldset>					
				<section>
					<label class="label"><?php echo $LANG["Email"]; ?></label>
					<label class="input">
						<i class="icon-append fa fa-envelope-o"></i>
						<input type="email" name="email" id="email">
					</label>
				</section>
			</fieldset>
			
			<footer>
				<button type="submit" name="submit" class="button"><?php echo $LANG["Send"]; ?></button>
				<a href="#" class="button button-secondary modal-closer"><?php echo $LANG["Close"]; ?></a>
			</footer>
				
			<div class="message">
				<i class="icon-ok"></i>
				<p>Your request successfully sent!<br><a href="#" class="modal-closer">Close window</a></p>
			</div>
		</form>
		

	</body>
</html>