
/*print*/

jQuery(document).ready(function($) {
	
	$('.ticketbox_mg_list .tools-td a[name="move_to_archive"]').on('click', function(e){
		if(! confirm( $(this).attr('text_archivePrompt') ) ){
			e.preventDefault();
			return false;
		}
	});
	
});


