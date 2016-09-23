<?php
//carrega as configuraÃ§Ãµes iniciais
include_once("../../resources/config/geral.php");
include_once($daoSelectOption); // Classe DAO

$selectOptionDAO = new SelectOptionDAO();

$area = $selectOptionDAO->area();

$filial = $selectOptionDAO->filial();

$localizacao = $selectOptionDAO->localizacao();

$user = $selectOptionDAO->allUsers();
?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			//carrega menu
			include("../geral/head.php");			
		?>
		
		<!-- <script type="text/javascript">
		$(document).ready(function() {			
			    $.ajax({			    
			        url : "<?php echo $controllerSelectOption;?>?area=1",			    
			        dataType : "json",			    
			        success : function(data){			       
			            var html = "";	 
			            for($i=0; $i < data.length; $i++){			           
			                html += "<option value="+data[$i].codArea+">"+data[$i].nameArea+"</option>";
			            }
			            $("#area").html(html);
			        }
			    });

			    $.ajax({			    
			        url : "<?php echo $controllerSelectOption;?>?filial=1",			    
			        dataType : "json",			    
			        success : function(data){			       
			            var html = "";	 
			            for($i=0; $i < data.length; $i++){			           
			                html += "<option value="+data[$i].codFilial+">"+data[$i].nameFilial+"</option>";
			            }
			            $("#subsidiary").html(html);
			        }
			    });
			    
			});
		</script> -->
		
		<script type="text/javascript">
	
		$(document).ready(function(){
			$("#responsibleArea").change(function() {
				 var responsibleArea = $( "#responsibleArea" ).val();	
				 	$("#subProblema").empty();
		            $("#SLA").empty();
		            $("#tipo").empty();
		            
		            
				    $.ajax({			    
				    	type: "POST",				    	
				        url : "<?php echo $controllerSelectOption;?>",			    
				        dataType : "json",	
				        data: {responsibleArea: responsibleArea}, 		    
				        success : function(retorno){			       
				            var problema = "<option value='0'>Selecione...</option>";	 
				            for($i=0; $i < retorno[0].length; $i++){			           
				            	problema += "<option value="+retorno[0][$i].probt0_cod+">"+retorno[0][$i].probt0_desc+"</option>";
				            }				            
				            $("#problem").html(problema);
				            
				            var encaminhar = "<option value='0'>Selecione...</option>";	
				            for($i=0; $i < retorno[1].length; $i++){			           
				            	encaminhar += "<option value="+retorno[1][$i].user_id+">"+retorno[1][$i].nome+"</option>";
				            }
				            $("#forward").html(encaminhar);
				        }
				    });

				    
				    
			}); 

			$("#problem").change(function() {
				 var problem = $( "#problem" ).val();	
				 var responsibleAreaSub = $( "#responsibleArea" ).val();	
				    $.ajax({			    
				    	type: "POST",				    	
				        url : "<?php echo $controllerSelectOption;?>",			    
				        dataType : "json",	
				        data: {problem: problem, responsibleAreaSub: responsibleAreaSub}, 		    
				        success : function(retorno){
				        			       
				            var radio = "";	 
				            var SLA = "";
				            var tipo = "";	 
				            for($i=0; $i < retorno.length; $i++){			           
				            	radio += "<label class='radio'><input type='radio' name='subProblem' value="+retorno[$i].prob_id+"><i></i>"+retorno[$i].probt1_desc+"</label>";
				            	SLA += "<label class='label'>"+retorno[$i].slas_desc+"</label>";
				            	tipo += "<label class='label'>"+retorno[$i].probt2_desc+"</label>";
				            }
				            $("#subProblema").html(radio);
				            $("#SLA").html(SLA);
				            $("#tipo").html(tipo);
				        }
				    });
			}); 


			$("#name").change(function() {
				 var idName = $( "#name" ).val();	
				 
				    $.ajax({			    
				    	type: "POST",				    	
				        url : "<?php echo $controllerSelectOption;?>",			    
				        dataType : "json",	
				        data: {idName: idName}, 		    
				        success : function(retorno){
				        	var email = retorno[0].email;				            
				            $("#email").val(email);
				            
				        }
				    });
			}); 
			
		});
		</script> 
	</head>
	<body class="bg-red">
	
		<?php
			//carrega as configuraÃ§Ãµes iniciais
			include("../geral/body.php");			
		?>
		<div class="body">		
			<form action="demo-order-process.php" method="post" enctype="multipart/form-data" id="sky-form" class="sky-form">
				<header><?php echo $LANG["OpenTicket"]; ?></header>
					
				<fieldset>					
					
					<div class="row">
						<section class="col col-6">
						<label class="label"><?php echo $LANG["ResponsibleArea"]; ?></label>
							<label class="select">
								<select name="responsibleArea" id="responsibleArea">
								<option value="0">Selecione...</option>
								<?php
									foreach($area as $row)
									{									  
									  echo "<option value='".$row['sis_id']."'>".utf8_encode($row['sistema'])."</option>";
									} 
								?>
									
								</select>
								<i></i>
							</label>
						</section>
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Problem"]; ?></label>
							<label class="select">
								<select name="problem" id="problem">
									<option value="0">Selecione a area</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>
					
					<section>
						<div class="row">
							<div class="col col-4">
								<label class="label"><?php echo $LANG["SubProblem"]; ?></label>
								<div id="subProblema">
									
								</div>
							</div>
							<div class="col col-2">
								<label class="label"><?php echo $LANG["SLA"]; ?></label>
								<div id="SLA">
									
								</div>
							</div>
							<div class="col col-3">								
								<label class="label">Tipo</label>
								<div id="tipo">
									
								</div>	
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
							<img style=" position: relative; top: 5px;" width="25" height="25" src="http://localhost/ocomon2.6.1-yanjos/includes/icons/forms/icon_more.png" onclick="teste()" border="0">
						</label>
					</section>
					
						<section>
							<label class="label"><?php echo $LANG["Operator"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" value="admin" disabled>
							</label>
						</section>						
					

					<div class="row">
						<section class="col col-6">
							<label class="label"><?php echo $LANG["Tag"]; ?></label>
							<label class="input">								
								<input type="text" name="name" placeholder="Etiqueta">
								<!-- criar uma função para verificar o nome do pc e ja trazer as informações necessarias, departamento, filial, adicionar um campo só para visualização do nome recuperado.
								criar função para preencher filial e departamento do produto no onblur e nome -->
							</label>
						</section>						
						<section class="col col-6">
							<label class="label"><?php echo $LANG["Name"]; ?></label>
							<label class="select">
								<select name="name" id="name"> 
									<?php
									foreach($user as $row)
									{	
										if($row['user_id'] == $_SESSION['userID'])
									  		echo "<option value='".$row['user_id']."' selected>".utf8_encode($row['nome'])."</option>";
										else
											echo "<option value='".$row['user_id']."'>".utf8_encode($row['nome'])."</option>";
									} 
								?>
								</select>
								<i></i>
							</label>
						</section>
					</div>
					
					<div class="row">
						<section class="col col-6">
						<!-- função para trazer o email do usuario; atualizar sempre que o campo nome for alterado se for operador -->
						<label class="label"><?php echo $LANG["Email"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-envelope-o"></i>
								<input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $_SESSION['email']; ?>">
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
						<label class="label"><?php echo $LANG["Subsidiary"]; ?></label>
							<label class="select">
								<select name="subsidiary" id="subsidiary" >
								<option value="0">Selecione...</option>
								<?php
									foreach($filial as $row)
									{									  
									  echo "<option value='".$row['inst_cod']."'>".utf8_encode($row['inst_nome'])."</option>";
									} 
								?>
								</select>
								<i></i>
							</label>
						</section>
						
						<section class="col col-6">
						<label class="label"><?php echo $LANG["Department"]; ?></label>
							<label class="select">
								<select name="department" id="department">
								<option value="0">Selecione...</option>
								<?php
									foreach($localizacao as $row)
									{									  
									  echo "<option value='".$row['loc_id']."'>".utf8_encode($row['local'])."</option>";
									} 
								?>
								</select>
								<i></i>
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
								<input type="tel" name="phone" value="0">
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-6">
							<label class="label"><?php echo $LANG["OpenDate"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="openDate" id="openDate" value="<?php echo date("d/m/Y");?>" disabled>
							</label>
						</section>
						<section class="col col-6">
							<label class="label"><?php echo $LANG["ScheduleTicket"]; ?></label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="scheduleTicket" id="scheduleTicket" placeholder="Data Agendamento">
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
								<select name="forward" id="forward">
									<option value="0">Selecione...</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>

					

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
		<script src="<?php echo $pathVALIDATE;?>/formOpenTicket.js"></script> 
		
</body>
</html>
