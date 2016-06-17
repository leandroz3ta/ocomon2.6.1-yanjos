
		<div class="body">		
			<form action="demo-order-process.php" method="post" enctype="multipart/form-data" id="sky-form" class="sky-form">
				<header>Abrir Chamado</header>
					
				<fieldset>					
					
						<section>
							<label class="label">Operador</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" value="admin" disabled>
							</label>
						</section>						
					

					<div class="row">
						<section class="col col-6">
							<label class="label">Nome</label>
							<label class="select">
								<select name="interested">
									<option value="none" >Admin</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label">Filial</label>
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
						<label class="label">Email</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" placeholder="E-mail">
							</label>
						</section>
						<section class="col col-6">
						<label class="label">Ramal</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="tel" name="number" placeholder="Phone">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label">Departamento</label>
							<label class="select">
								<select name="interested">
									<option value="none" >RH</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
							<label class="label">Etiqueta</label>
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
						<label class="label">Status</label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="text" name="email" value="Aberto">
							</label>
						</section>
						<section class="col col-6">
						<label class="label">Replicar</label>
							<label class="input">
								<i class="icon-append fa fa-phone"></i>
								<input type="tel" name="phone" value="0">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
							<label class="label">Data abertura</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="start" id="start" value="14/07/2016">
							</label>
						</section>
						<section class="col col-6">
							<label class="label">Agendar chamado</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="finish" id="finish" placeholder="Data Agendamento">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
						<label class="label">Prioridade</label>
							<label class="select">
								<select name="interested">
									<option value="none" >Admin</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label">Encaminhar</label>
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
						<label class="label">Area responsavel</label>
							<label class="select">
								<select name="interested">
									<option value="none" >HelpDesk</option>
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label">Problema</label>
							<label class="select">
								<select name="budget">
									<option value="0" >Impressora</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>
					
					<section>
						<label class="label">Seleciona o Sub-Problema</label>
						<div class="row">
							<div class="col col-3">
								<label class="label">Sub-Problema</label>
								<label class="radio"><input type="radio" name="checkbox"><i></i>Sem Tonner</label>
								<label class="radio"><input type="radio" name="checkbox"><i></i>Papel Stolado</label>
							</div>
							<div class="col col-3">
								<label class="label">SLA</label>
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
							<div class="button"><input type="file" name="file" multiple onchange="this.parentNode.nextSibling.value = this.value">Procurar</div><input type="text" placeholder="Include some file" readonly>
							<img style=" position: relative; top: 5px;" title="Consulta os equipamentos cadastrados para esse Departamento!" width="25" height="25" src="http://localhost/ocomon2.6.1-yanjos/includes/icons/forms/icon_more.png" onclick="teste()" border="0">
						</label>
					</section>

					<section>
						<label class="label">Email</label>
						<div class="inline-group">
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked disabled><i></i>Solicitante</label>
							<label class="checkbox"><input type="checkbox" name="checkbox-inline" checked disabled><i></i>Area</label>							
						</div>					
					</section>

				</fieldset>
				<footer>
					<button type="submit" class="button">Abrir</button>
					<div class="progress"></div>
				</footer>				
			</form>			
		</div>
		
		<script type="text/javascript">
			$(function()
			{
				// Datepickers
				$('#start').datepicker({
					dateFormat: 'dd/mm/yy',
					prevText: '<i class="fa fa-chevron-left"></i>',
					nextText: '<i class="fa fa-chevron-right"></i>',
				});
				$('#finish').datepicker({
					dateFormat: 'dd/mm/yy',
					prevText: '<i class="fa fa-chevron-left"></i>',
					nextText: '<i class="fa fa-chevron-right"></i>',

				});
				
				// Validation
				$("#sky-form").validate(
				{					
					// Rules for form validation
					rules:
					{
						name:
						{
							required: true
						},
						email:
						{
							required: true,
							email: true
						},
						phone:
						{
							required: true
						},
						interested:
						{
							required: true
						},
						budget:
						{
							required: true
						}
					},
										
					// Messages for form validation
					messages:
					{
						name:
						{
							required: 'Please enter your name'
						},
						email:
						{
							required: 'Please enter your email address',
							email: 'Please enter a VALID email address'
						},
						phone:
						{
							required: 'Please enter your phone number'
						},
						interested:
						{
							required: 'Please select interested service'
						},
						budget:
						{
							required: 'Please select your budget'
						}
					},

					// Ajax form submition
					submitHandler: function(form)
					{
						$(form).ajaxSubmit(
						{
							beforeSend: function()
							{
								$('#sky-form button[type="submit"]').addClass('button-uploading').attr('disabled', true);
							},
					    uploadProgress: function(event, position, total, percentComplete)
					    {
					    	$("#sky-form .progress").text(percentComplete + '%');
					    },
							success: function()
							{
								$("#sky-form").addClass('submited');
								$('#sky-form button[type="submit"]').removeClass('button-uploading').attr('disabled', false);
							}
						});
					},	
					
					// Do not change code below
					errorPlacement: function(error, element)
					{
						error.insertAfter(element.parent());
					}
				});
			});			
		</script>
