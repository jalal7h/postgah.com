
var you_want_to_have_popup_user_login = false;

$(document).ready(function($) {
	
	if( you_want_to_have_popup_user_login ){

		// login
		wlp = window.location.pathname;
		this_page = wlp.substr( wlp.length -6 , 6 );
		if( this_page!='/login' ){
			$('a[href="'+_URL+'/login"]').on('mousedown', function(e){
				hitbox('<iframe scrolling=no src="./?do_action=user_login_form&covered=1&popup=1"></iframe>', 600, 469 );
				$('#offer_new_item_hitbox a').css( {'background-color':'#'+the_list_of_dynamic_colors[0]} );
				e.preventDefault();
			}).on('click', function(e){
				e.preventDefault();
			});
		}

	}

});

