$.fn.ajax_form_submit = function()
{
	var f = $(this);

	if (f.hasAttr('f-ajax')) return;

	f.attr('f-ajax', '');

	f.on('submit', function ($e)
	{
		var swalInit = swal.mixin({
			buttonsStyling: false,
			customClass: {
				confirmButton: 'btn btn-primary',
				cancelButton: 'btn btn-light',
				denyButton: 'btn btn-light',
				input: 'form-control'
			}
		});

		$e.preventDefault();

		var f = $(this);

		f.closest('.card').find('button').attr('disabled', true);
		f.find(':input.form-control').css('border', '');

		$('.validation-invalid-label').remove();

		//progress_wait();
		waitingDialog.show('Please wait...');

		setTimeout(function () 
		{
			$.ajax({
				type: "POST",
				url: f.attr('action'),
				data: new FormData(f[0]),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function(data, textStatus, jqXHR) {
					waitingDialog.hide();

					setTimeout(function () 
					{
						if (data.status) {
							if (data.message) {
								swalInit.fire({
									title: data.title || 'Success',
									html: data.message,
									icon: 'success',
									didClose: function() {
										if (data.redirect) {
											//progress_wait();
											waitingDialog.show('Please wait...');

											window.location = data.redirect;
										}
										else {
											f.closest('.card').find('button').attr('disabled', false);
										}
									}
								});
							}
						}
						else {
							PNotify.removeAll();
							waitingDialog.hide();

							if (data.form_error) {
								jQuery.each(data.form_error, function(index, item) {
									var i = $('[name="'+index+'"]');

									if (!i.length) i = $('[name="'+index+'[]"]');

									i.css('border', '1px solid #ef5350');

									if (i.length) {
										if (i.attr('id') && $('label[for="'+i.attr('id')+'"]').length) 
										{
											var label = $('label[for="'+i.attr('id')+'"]');
											
											label.parent().find('.validation-invalid-label').remove();
											
											$(item).insertAfter(label);

											console.log(label);
										}
										else 
										{
											i.parent().find('.validation-invalid-label').remove();
											
											$(item).insertAfter(i.parent().find('label'));	
										}
									}
								});

								new PNotify({
				                title: 'Failed',
				                text: 'See form error messages',
				                addclass: 'stack-top-left bg-danger border-danger text-white'
				            });

							}

							if (data.message) {
								swalInit.fire({
									title: data.title || 'Error',
									html: data.message,
									icon: data.icon || 'error',
									didClose: function() {
										if (data.redirect) {
											//progress_wait();
											waitingDialog.show('Please wait...');

											window.location = data.redirect;
										}
										else
											f.closest('.card').find('button').attr('disabled', false);
									}
								});
							}
							else {
								if (data.redirect) {
									//progress_wait();
									waitingDialog.show('Please wait...');
									
									window.location = data.redirect;
								}
								else
									f.closest('.card').find('button').attr('disabled', false);
							}
						}

						if (data.form_key) {
							f.find('[name="'+data.form_key.name+'"]').val(data.form_key.hash);
						}
					},
					300);
				},
				error: function(data, textStatus, jqXHR) {
					swalInit.fire({
						title: 'Error',
						html: 'Something went wrong',
						icon: 'error',
						didClose: function() 
						{
							waitingDialog.show('Please wait...');

							setTimeout(function ()
							{
								location.reload();
							},
							500);

							// window.location = $('meta[name="ctrl_url"]').attr('content');
						}
					});
				},
			});
		},
		1000);
	});
}