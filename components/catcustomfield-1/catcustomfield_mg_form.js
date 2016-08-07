
$(document).ready(function($) {
	
	function catcustomfield_mg_form_check(){

		select_value = $('#lmfe_catcustomfield_mg_form_type').val();
		
		if( select_value=='select' || select_value=='radio' ){
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

