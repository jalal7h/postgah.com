
$(document).ready(function($) {
	
	$('.position_management_list_new').on('submit', function(e){

		// name
		if( $(this).find('input[name="name"]').val()=='' ){
			e.preventDefault();			

		// parent
		} else if( $('#position_management_list_new_parent').val()==null ) {
			e.preventDefault();
		}
	});

	// after change parent, focus on input
	$('#position_management_list_new_parent').on('change', function(){
		$('.position_management_list_new input[name="name"]').focus();
	});


});