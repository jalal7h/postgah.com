
jQuery(document).ready(function($) {
	$('#listmaker_list_tallfooter_form .list_addnew_url.btn').on('click', function(e){
		
		count_of_types = $('#tallfooter_typelist > .tallfooter_typelist_container > a').length;
		cl( count_of_types);
		the_height = 203 + (count_of_types * 61);
		
		hitbox( $('#tallfooter_typelist').html() , 400, the_height );
		e.preventDefault();

	});
});
