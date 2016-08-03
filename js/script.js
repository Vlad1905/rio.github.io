$(document).ready(function(){

	$('.order-trigger').on('click', function(){

		var errors = [];
		var data = {};
		var parent = $(this).closest('.order');
		$.each(parent.find('.var'), function(){
			if($(this).hasClass('required')) {
				if($(this).val() == "") {
					$(this).css('border', '1px solid red');
					errors.push(1);
				} else {
					$(this).css('border', '1px solid #ccc');
					data[$(this).attr('name')] = $(this).val();
				}
			}
		});


		if(errors.length === 0) {
			// ajax
			$.ajax({
			  type: "POST",
			  url: "mail.php",
			  data: data
			}).done(function( msg ) {
				console.log(msg);
			  	parent.html('<div class="alert alert-success"><h2>Заявка отправлена ! Совсем скоро с Вами свяжемся, спасибо !</h2></div>');
			});
		} else {
			parent.find('.error-place').html('<div class="alert alert-error">Необходимо указать Имя и телефон</div>');
		}
	});
});