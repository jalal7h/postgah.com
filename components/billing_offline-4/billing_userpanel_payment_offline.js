
$(document).ready(function(){
	
	$('form.billing_userpanel_payment_offline').on('submit', function(e){
		
		if( $(this).find('input[name="transaction"]').val()=='' ){
			alert( $(this).find('input[name="transaction"]').attr('alert') );
		
		} else if( $(this).find('input[name="date"]').val()=='' ){
			alert( $(this).find('input[name="date"]').attr('alert') );
		
		} else {
			return true;
		}

		e.preventDefault();

	});

});

