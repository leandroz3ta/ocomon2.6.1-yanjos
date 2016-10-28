<?php
//carrega as configurações iniciais
include_once("../../resources/config/geral.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			//carrega as configurações iniciais
			include("../geral/head.php");			
		?>
	</head>
	<body class="bg-red">
	
		<?php
			//carrega as configurações iniciais
			include("../geral/body.php");			
		?>
		<div class="body body-s">		
			<form action="" id="sky-form" class="sky-form">
			<header>Configuracoes gerais</header>
			
			<fieldset>
												
				<!-- 
				<section>
						<div class="row">
							<div class="col col-4">Permitir que o administrador altere datas manualmente</div>
							<div class="col col-8">
								<label class="checkbox"><input type="checkbox" name="remember" disabled><i></i></label>
							</div>
						</div>
						<div class="note"><strong>OBS:</strong>Desativado para evitar erros de calculo no SLA</div>
				</section>
				 -->
				 <label class="label">Chamados</label>
				 <section>
						<div class="row">
							<div class="col col-4">Justificar Chamados com Tempo de Solu��o Acima do SLA</div>
							<div class="col col-8">
								<label class="checkbox"><input type="checkbox" name="remember"><i></i></label>
							</div>
						</div>						
				</section>
				
				<section>
						<div class="row">
							<div class="col col-4">Permitir Reabertura de Chamado</div>
							<div class="col col-8">
								<label class="checkbox"><input type="checkbox" name="remember"><i></i></label>
							</div>
						</div>						
				</section>
				<section>
					<div class="row">
						<label class="label col col-4">Quantidade de dias para reabertura</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
					
				</section>
				
				<label class="label">Anexos</label>
				<section>
					<div class="row">
						<label class="label col col-4">Tamanho Maximo</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
					
				</section>
				
				<section>
					<div class="row">
						<label class="label col col-4">Tipos de Arquivo</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
				</section>
				
				<label class="label">Categoria de Problemas</label>
				<section>
					<div class="row">
						<label class="label col col-4">Categoria 1</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
				</section>
				
				<section>
					<div class="row">
						<label class="label col col-4">Categoria 2</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
				</section>
				
				<section>
					<div class="row">
						<label class="label col col-4">Categoria 3</label>
						<div class="col col-8">
							<label class="input">								
								<input type="text" name="problema">
							</label>
						</div>
					</div>
				</section>
				
					
					
				
			</fieldset>
			<footer>
				<button type="submit" class="button">Salvar</button>
				<a href="#" class="button button-secondary modal-closer">Voltar</a>
			</footer>				
			</form>
		</div>
	
	</body>
</html>