
jQuery(document).ready(function($) {
	
	$('#lmfe_pgShop_user_form_path').on('keydown', function(e){

		cl(e.keyCode);

		the_domain = _DOMAIN+'/';

		subd = $(this).val().substr( the_domain.length );

		if( e.keyCode >=37 && e.keyCode <=40 ){
			return true;

		} if( e.keyCode == 8 ){
			if( e.keyCode==8 && $(this).val() == the_domain ){
				e.preventDefault();
			}

		} else if( e.keyCode==13 ){
			//
		} else if( (e.keyCode >= 65 && e.keyCode <= 90) || ( e.keyCode >= 48 && e.keyCode <= 57 ) ) {
			
			// ignore
			if( ctrl_pressed == 1 ){
				cl('ctrl is presssed');
				return true;
			}

			// stop
			if(  shift_pressed == 1  ||  alt_pressed == 1  ){
				cl('shift / alt is presssed');
				e.preventDefault();
				return true;
			}

			$(this).val( the_domain + subd + e.key );

			e.preventDefault();
	
		} else {
			e.preventDefault();
		}

	});

});

// 65 - 90 , 48 - 57