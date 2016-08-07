
$(document).ready(function($) {

	$('.kwordbanned_mg_list #kwordbanned_mg_list_checkbox_head').on('click', function(){
		
		if( $(this).prop("checked")==true ){
			$('.kwordbanned_mg_list input[name="kwordbanned_mg_list_checkbox[]"]').prop( "checked", true );
		
		} else {
			$('.kwordbanned_mg_list input[name="kwordbanned_mg_list_checkbox[]"]').prop( "checked", false );
		}

		e.preventDefault();
	});


	$('.kwordbanned_mg_list tr input[name="kwordbanned_mg_list_checkbox[]"]').on("mouseenter", function(){
		lml_intoolstd = "in";
		console.log(lml_intoolstd);
	});
	$('.kwordbanned_mg_list tr input[name="kwordbanned_mg_list_checkbox[]"]').on("mouseleave", function(){
		lml_intoolstd = "out";
		console.log(lml_intoolstd);
	});

	$('.kwordbanned_mg_list tr').on('click', function(){

		if( lml_intoolstd!='in' ){
			
			this_input = $(this).find('input[name="kwordbanned_mg_list_checkbox[]"]');
			
			if( this_input.prop("checked")==true ){
				this_input.prop( "checked", false );
			
			} else {
				this_input.prop( "checked", true );
			}

		}

	});		


	$('.kwordbanned_mg_list').parent().find('.listmaker_list_paging').css({'position':'relative','top':'20px'});
	
	$('#kwordbanned_mg_list_remove_selected').on('click', function(){
		$('#listmaker_list_kwordbanned_mg_list_form').submit();
	});

	if( $('.listmaker_list_paging').length ){
		$('#kwordbanned_mg_list_remove_selected').css({'top':'-50px'});
	}

});


