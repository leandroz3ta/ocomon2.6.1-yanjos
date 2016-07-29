<?php
//carrega as configurações iniciais
require_once("../../resources/config/geral.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			//carrega as configurações iniciais
			include("../geral/head.php");			
		?>

		<script src="<?php echo $pathVALIDATE;?>/formOpenTicket.js"></script>
	</head>
	<body class="bg-red">
	
		<?php
			//carrega as configurações iniciais
			include("../geral/body.php");			
		?>
		<div class="body">		
			<form action="demo-order-process.php" method="post" enctype="multipart/form-data" id="sky-form" class="sky-form">
				<header><?php echo $LANG["OpenTicket"]; ?></header>
					
				<fieldset>					
					
						<section>
							<label class="label"><?php echo $LANG["Operator"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" value="admin" disabled>
							</label>
						</section>						
					

					<div class="row">
						<section class="col col-6">
							<label class="label"><?php echo $LANG["Name"]; ?></label>
							<label class="select">
								<select name="interested">
									<option value="none" >Admin</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Subsidiary"]; ?></label>
							<label class="select">
								<select name="interested">
									<option value="none" >Sp</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Email"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" placeholder="E-mail">
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Branch"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="tel" name="number" placeholder="Phone">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Department"]; ?></label>
							<label class="select">
								<select name="interested">
									<option value="none" >RH</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
							<label class="label"><?php echo $LANG["Tag"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" placeholder="Etiqueta">
								<img style=" position: relative; top: 5px;" title="Consulta os equipamentos cadastrados para esse Departamento!" width="25" height="25" src="http://localhost/ocomon2.6.1-yanjos/includes/icons/forms/search.png" onclick="teste()" border="0">
								<img style=" position: relative; top: 5px;" title="Consulta os equipamentos cadastrados para esse Departamento!" width="25" height="25" src="http://localhost/ocomon2.6.1-yanjos/includes/icons/forms/clock.png" onclick="teste()"border="0">
							</label>

						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Status"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="text" name="email" value="Aberto">
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Replicate"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="tel" name="phone" value="0">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
							<label class="label"><?php echo $LANG["OpenDate"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="start" id="start" value="14/07/2016">
							</label>
						</section>
						<section class="col col-6">
							<label class="label"><?php echo $LANG["ScheduleTicket"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="finish" id="finish" placeholder="Data Agendamento">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Priority"]; ?></label>
							<label class="select">
								<select name="interested">
									<option value="none" >Admin</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Forward"]; ?></label>
							<label class="select">
								<select name="budget">
									<option value="0" >Analista X</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["ResponsibleArea"]; ?></label>
							<label class="select">
								<select name="interested">
									<option value="none" >HelpDesk</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Problem"]; ?></label>
							<label class="select">
								<select name="budget">
									<option value="0" >Impressora</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>
					
					<section>
						<div class="row">
							<div class="col col-3">
								<label class="label"><?php echo $LANG["SubProblem"]; ?></label>
								<label class="radio"><input type="radio" name="checkbox"><i></i>Sem Tonner</label>
								<label class="radio"><input type="radio" name="checkbox"><i></i>Papel Stolado</label>
							</div>
							<div class="col col-3">
								<label class="label"><?php echo $LANG["SLA"]; ?></label>
								<label class="label">4 Horas</label>
								<label class="label">2 Horas</label>
							</div>
							<div class="col col-3">
								<label class="label">Tipo</label>
								<label class="label">Solicitação</label>
								<label class="label">Problema</label>
							</div>
						</div>
					</section>

					
					<section>
						<label class="textarea">
							<i class="icon-append fa fa-comment"></i>
							<textarea rows="5" name="comment" placeholder="Descreva o problema"></textarea>
						</label>
					</section>

					<section>
						<label for="file" class="input input-file">
							<div class="button"><input type="file" name="file" multiple onchange="this.parentNode.nextSibling.value = this.value"><?php echo $LANG["Find"]; ?></div><input type="text" placeholder="Include some file" readonly>
							<img style=" position: relative; top: 5px;" title="Consulta os equipamentos cadastrados para esse Departamento!" width="25" height="25" src="http://localhost/ocomon2.6.1-yanjos/includes/icons/forms/icon_more.png" onclick="teste()" border="0">
						</label>
					</section>

					<section>
						<label class="label"><?php echo $LANG["Email"]; ?></label>
						<div class="inline-group">
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked disabled><i></i><?php echo $LANG["Requester"]; ?></label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked disabled><i></i><?php echo $LANG["ResponsibleArea"]; ?></label>							
						</div>					
					</section>

				</fieldset>
				<footer>
					<button type="submit" class="button"><?php echo $LANG["OpenTicket"]; ?></button>
					<div class="progress"></div>
				</footer>				
			</form>			
		</div>
		
</body>
</html>
