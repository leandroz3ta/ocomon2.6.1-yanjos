<?php
//carrega as configuraÃ§Ãµes iniciais
require_once("../../resources/config/geral.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			//carrega as configuraÃ§Ãµes iniciais
			include("../geral/head.php");			
		?>
	</head>
	<body class="bg-red">
	
		<?php
			//carrega as configuraÃ§Ãµes iniciais
			include("../geral/body.php");			
		?>
<div class="body body-s">		
			<form action="" id="sky-form" class="sky-form">
				<header>Problemas</header>
				
					
				<fieldset>
					
					<section>
						<label class="label">Categoria</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>Aplicativos</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<a href="#cadastroProblema" class="modal-opener">Cadastrar</a>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">Area</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>Suporte</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">SLA</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>1 hora</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">item</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>acrobat</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">serviço</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>instalação</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<i></i>
						</label>
					</section>
					
					<section>
						<label class="label">tipo</label>
						<label class="select">
							<select name="gender">
								<option value="0" selected>solicitação</option>
								<option value="1">Male</option>
								<option value="2">Female</option>
								<option value="3">Other</option>
							</select>
							<i></i>
						</label>
						
					</section>
					
					<section>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="5" name="comment" placeholder="Descreva o problema"></textarea>
						</label>
					</section>


				</fieldset>
				<footer>
					<button type="submit" class="button">Submit</button>
				</footer>
			</form>		
			
				
		</div>
		
	<form action="" id="cadastroProblema" class="sky-form sky-form-modal">
			<header>Problema</header>
			
			<fieldset>					
				<section>
					<div class="row">
						<label class="label col col-4">Problema</label>
						<div class="col col-8">
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="problema">
							</label>
						</div>
					</div>
				</section>
				
			</fieldset>
			<footer>
				<button type="submit" class="button">Cadastrar</button>
				<a href="#" class="button button-secondary modal-closer">Fechar</a>
			</footer>				
	</form>
	
	</body>
</html>