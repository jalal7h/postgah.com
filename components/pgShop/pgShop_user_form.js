
jQuery(document).ready(function($) {
	
	$('#lmfe_pgShop_user_form_path').on('keydown', function(e){

		// cl(e.keyCode);

		if( e.keyCode==8 || e.keyCode==13 ){
			//
		} else if( (e.keyCode >= 65 && e.keyCode <= 90) || ( e.keyCode >= 48 && e.keyCode <= 57 ) ) {
		
			the_domain = 'postgah.com';
			the_domain_l = the_domain.length;
			this_val = $(this).val();

			subd = $(this).val().slice( 0, -1 * (the_domain_l+1) );

			$(this).val( subd + e.key + "." + the_domain );

			this.setSelectionRange( subd.length+1 , subd.length+1 );

			e.preventDefault();
	
		} else {
			e.preventDefault();
		}

	});

});

// 65 - 90 , 48 - 57