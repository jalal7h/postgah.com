	
function catcustomfield_mg_form_check(){
$(document).ready(function($) {

	sel_val = $('#lmfe_formdd96d1_type').val();

	$('#lmfe_inDiv_formdd96d1_name').show();
	// if( $('#lmfe_formdd96d1_name').val() == '---' ){
	// 	$('#lmfe_formdd96d1_name').val('');
	// }

	if( sel_val=='hr' ){
		$('.catcustomfield_mg_form .option_list').hide();
		$('#lmfe_inDiv_formdd96d1_name').hide();
		// $('#lmfe_formdd96d1_name').val('---');
		
	} else if( $.inArray( sel_val, ccf_haveOptions ) !== -1 ){
		$('.catcustomfield_mg_form .option_list').show();
	
	} else {
		$('.catcustomfield_mg_form .option_list').hide();			
	}

});
}



$(document).ready(function($) {

	$("body").delegate('.catcustomfield_mg_form select[name="type"]', "change", function() {
		catcustomfield_mg_form_check();
	} );

	catcustomfield_mg_form_check();

});



