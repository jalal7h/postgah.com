
$(document).ready(function($) {

	$('.kword_mg_list #kword_mg_list_checkbox_head').on('click', function(){
		
		if( $(this).prop("checked")==true ){
			$('.kword_mg_list input[name="kword_mg_list_checkbox[]"]').prop( "checked", true );
		
		} else {
			$('.kword_mg_list input[name="kword_mg_list_checkbox[]"]').prop( "checked", false );
		}

		e.preventDefault();
	});


	$('.kword_mg_list tr input[name="kword_mg_list_checkbox[]"]').on("mouseenter", function(){
		lml_intoolstd = "in";
		console.log(lml_intoolstd);
	});
	$('.kword_mg_list tr input[name="kword_mg_list_checkbox[]"]').on("mouseleave", function(){
		lml_intoolstd = "out";
		console.log(lml_intoolstd);
	});

	$('.kword_mg_list tr').on('click', function(){

		if( lml_intoolstd!='in' ){
			
			this_input = $(this).find('input[name="kword_mg_list_checkbox[]"]');
			
			if( this_input.prop("checked")==true ){
				this_input.prop( "checked", false );
			
			} else {
				this_input.prop( "checked", true );
			}

		}

	});		


	$('.kword_mg_list').parent().find('.listmaker_list_paging').css({'position':'relative','top':'20px'});
	
	$('#kword_mg_list_remove_selected').on('click', function(){
		$('#listmaker_list_kword_mg_list_form').submit();
	});

	if( $('.listmaker_list_paging').length ){
		$('#kword_mg_list_remove_selected').css({'top':'-50px'});
	}

});


