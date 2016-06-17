$(function()
			{
				// Validation for login form
				$("#formLogin").validate(
				{					
					// Rules for form validation
					rules:
					{
						formUsuario:
						{
							required: true
							
						},
						formSenha:
						{
							required: true
													}
					},
										
					// Messages for form validation
					messages:
					{
						formUsuario:
						{
							required: 'Favor inserir um usuário'
						},
						formSenha:
						{
							required: 'Favor insira a senha'
						}
					},					
					
					// Do not change code below
					errorPlacement: function(error, element)
					{
						error.insertAfter(element.parent());
					}
				});
				
				
				// Validation for recovery form
				$("#formRecoveryPass").validate(
				{					
					// Rules for form validation
					rules:
					{
						email:
						{
							required: true,
							email: true
						}
					},
										
					// Messages for form validation
					messages:
					{
						email:
						{
							required: 'Insira um E-mail',
							email: 'Insira um endereço de Email válido'
						}
					},
										
					// Ajax form submition					
					submitHandler: function(form)
					{
						$(form).ajaxSubmit(
						{
							beforeSend: function()
							{
								$('#formLogin button[type="submit"]').attr('disabled', true);
							},
							success: function()
							{
								$("#formRecoveryPass").addClass('submited');
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