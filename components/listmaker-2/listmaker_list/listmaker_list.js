
var lml_intoolstd = "";

$(document).ready(function(){
	//
	// mouse over effect on TR
	$('.tools-td').on("mouseenter", function(){
		lml_intoolstd = "in";
		// cl(lml_intoolstd);
	});
	$('.tools-td').on("mouseleave", function(){
		lml_intoolstd = "out";
		// cl(lml_intoolstd);
	});

	// allow links in td,th to be clicked.
	$('.listmaker_list td a , .listmaker_list th a').on('click', function(){
		cl( 'kk');
		lml_intoolstd = 'in';
		setTimeout( function(){
			lml_intoolstd = 'out';
		} , 500 );
	});


	// big_button - check all
	$('.listmaker_list_head th input[name="big_button_listHead"]').on('click', function(){
		if( $(this).prop('checked') == true ){
			cl( 'checked');
			$(this).closest('.listmaker_list').find('.listmaker_list_record .big_button .big_button_checkbox').each(function(index, el) {
				$(this).prop('checked', true);
			});
		
		} else {
			cl( 'unchecked');
			$(this).closest('.listmaker_list').find('.listmaker_list_record .big_button .big_button_checkbox').each(function(index, el) {
				$(this).prop('checked', false);
			});
		}
	});

	// big_button - execute
	$('.listmaker_list .big_button_theButton').on('click', function(){
		var slug = $(this).attr('slug');
		var fm = $(this).closest('.listmaker_list_form');
		var fm_formAction = fm.find('input[type="hidden"][name="do"]');
		fm_formAction.val( slug );
		fm.submit();
	});

})


