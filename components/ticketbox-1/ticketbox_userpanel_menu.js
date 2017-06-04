
/*footer*/

jQuery(document).ready(function($) {
	
	umtuls = $('.userpanel_menu_ticketbox_user_list span');
	if( umtuls.length ){
		
		$.ajax({
			url: './?do_action=ticketbox_userpanel_menu_countOfNewMessages',
		
		}).done(function( count ) {
			if(! isNaN(count) ){
				if( count > 0 ){
					umtuls.append('<span class=\"umtuls_conm\">'+ count +'</span>');
				}
			}
		})
		
	}
	
});