
jQuery(document).ready(function($) {
	
	$('.tallfooter_mg_list_c .listmaker_list_form .list_addnew_url.submit_button').on('click', function(e){
		hitbox( $('#tallfooter_typelist').html() , 500, 500 );
		e.preventDefault();
	});

	$('body').delegate('.tallfooter_typelist_container > a', 'click', function(e){
		dehitbox_do();
		// e.preventDefault();
	})
});
