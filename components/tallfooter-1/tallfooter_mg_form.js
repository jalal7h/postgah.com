
jQuery(document).ready(function($) {
	$('.tallfooter_mg_list_c .listmaker_list_form .list_addnew_url.submit_button').on('click', function(e){
		
		count_of_types = $('#tallfooter_typelist > .tallfooter_typelist_container > a').length;
		cl( count_of_types);
		the_height = 203 + (count_of_types * 61);
		
		hitbox( $('#tallfooter_typelist').html() , 400, the_height );
		e.preventDefault();

	});
});
