	
function catcustomfield_mg_form_check(){
$(document).ready(function($) {

	sel_val = $('#lmfe_formdd96d1_type').val();

	if( sel_val == 'hr' ){
		$('#lmfe_inDiv_formdd96d1_name').hide();
	} else {
		$('#lmfe_inDiv_formdd96d1_name').show();
	}
	
	if( $.inArray( sel_val, ccf_displayAsFilter ) !== -1 ){
		$('#lmfe_inDiv_formdd96d1_display_as_filter').show();
	
	} else {
		$('#lmfe_inDiv_formdd96d1_display_as_filter').hide();
	}
	
	if( $.inArray( sel_val, ccf_haveOptions ) !== -1 ){
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



