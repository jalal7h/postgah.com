
$(document).ready(function($) {
	
	function catcustomfield_mg_form_check(){

		sel_val = $('#lmfe_catcustomfield_mg_form_type').val();

		$('#lmfe_inDiv_catcustomfield_mg_form_name').show();
		if( $('#lmfe_catcustomfield_mg_form_name').val() == '---' ){
			$('#lmfe_catcustomfield_mg_form_name').val('');
		}

		if( sel_val=='hr' ){
			$('.catcustomfield_mg_form .option_list').hide('fast');
			$('#lmfe_inDiv_catcustomfield_mg_form_name').hide();
			$('#lmfe_catcustomfield_mg_form_name').val('---');
			
		} else if( sel_val=='select' || sel_val=='radio' ){
			$('.catcustomfield_mg_form .option_list').show('fast');
		
		} else {
			$('.catcustomfield_mg_form .option_list').hide('fast');			
		}

	}

	$('#lmfe_catcustomfield_mg_form_type').on('change', function(){
		catcustomfield_mg_form_check();
	} );

	catcustomfield_mg_form_check();

});

