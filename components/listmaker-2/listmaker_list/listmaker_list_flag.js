
jQuery(document).ready(function($) {
	
	$('.listmaker_list_record a.setflag').on('click', function(e){

		the_href = $(this).attr('href');
		$.ajax({ url: the_href });
		$(this).toggleClass('off');
		$(this).parent().parent().toggleClass('listmaker_list_record_inactive');

		e.preventDefault();

	});

});
