<?php
//carrega as configuraÃ§Ãµes iniciais
include_once("../../resources/config/geral.php");
include_once($controllerOpenTicket);

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
				            var html = "<option value='0'>Selecione...</option>";	 
				            for($i=0; $i < retorno.length; $i++){			           
				                html += "<option value="+retorno[$i].prob_id+">"+retorno[$i].problema+"</option>";
				            }
				            $("#problem").html(html);
				            
				        }
				    });
			}); 

			$("#problem").change(function() {
				 var problem = $( "#problem" ).val();	
				 
				    $.ajax({			    
				    	type: "POST",				    	
				        url : "<?php echo $controllerSelectOption;?>",			    
				        dataType : "json",	
				        data: {problem: problem}, 		    
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
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="name" placeholder="Etiqueta">
								<!-- criar função para preencher filial e departamento do produto no onblur -->
							</label>
						</section>						
						<section class="col col-6">
							<label class="label"><?php echo $LANG["Name"]; ?></label>
							<label class="select">
								<select name="name" id="name">
								<!-- criar função, se for operador traz a lista completa, se for usuario apenas o nome ee bloquear campo -->
									<option value="none" a="teste">Admin</option>
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
								<input type="text" name="openDate" id="openDate" value="<?php echo date("d/m/Y");
?>">
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
								<select name="forward">
									<option value="0">Selecione...</option>
								</select>
								<i></i>
							</label>
						</section>
					</div>

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
							<div class="col col-3">
								<label class="label"><?php echo $LANG["SubProblem"]; ?></label>
								<div id="subProblema">
									
								</div>
							</div>
							<div class="col col-3">
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
		<script src="<?php echo $pathVALIDATE;?>/formOpenTicket.js"></script> 
		
</body>
</html>
