
$(document).ready(function(){
	
	$('#smsletter_mg_list_of_cell_checkbox').on('click', function(){
		$('#nlmg_list_of_cell').toggle();		
	});

	$('.smsletter_mg_send_form').on('submit', function(e){

		//
		// if no subject
		if( $('#smsletter_mg_send_form_subject').val()=='' ) {
			// $(this).focus();
			e.preventDefault();
		}

		//
		// if no text
		if( $('#smsletter_mg_send_form_text').val()=='' ) {
			// $(this).focus();
			e.preventDefault();
		}

		//
		// if no checkbox checked
		if( (document.getElementById('users_email_list').checked) || (document.getElementById('smsletter_mg_list_of_cell_checkbox').checked) ){
			console.log('its ok');
		} else {
			e.preventDefault();
		}
	})

});

