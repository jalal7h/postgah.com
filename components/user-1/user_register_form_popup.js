
var you_want_to_have_popup_user_register = false;

$(document).ready(function($) {
	
	if( you_want_to_have_popup_user_register ){
		
		// register
		wlp = window.location.pathname;
		this_page = wlp.substr( wlp.length -9 , 9 );
		if( this_page!='/register' ){
			$('a[href="'+_URL+'/register"]').on('mousedown', function(e){
				hitbox('<iframe scrolling=no src="./?do_action=user_register_form&covered=1&popup=1"></iframe>', 600, 522 );
				$('#offer_new_item_hitbox a').css( {'background-color':'#'+the_list_of_dynamic_colors[0]} );
				e.preventDefault();
			}).on('click', function(e){
				e.preventDefault();
			});
		}

	}

});

