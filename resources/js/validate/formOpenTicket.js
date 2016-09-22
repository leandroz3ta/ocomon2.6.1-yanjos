$(function()
			{
				// Datepickers
				$('#openDate').datepicker({
					dateFormat: 'dd/mm/yy',
					prevText: '<i class="fa fa-chevron-left"></i>',
					nextText: '<i class="fa fa-chevron-right"></i>',
				});
				
				$('#scheduleTicket').datepicker({
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
						teste:
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
						teste:
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