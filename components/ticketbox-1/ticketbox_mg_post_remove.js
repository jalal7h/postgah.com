
jQuery(document).ready(function($) {

	ticketbox_mg_post_remove_instantly_hide = 1;

	// remove button
	$('body').delegate('.ticketbox_view .post .remove', 'click', function() {
	cl('dslkj');	
		
		rm = $(this);
		ps = rm.parent();
		post_id = ps.attr('post_id');

		
		if( ticketbox_mg_post_remove_instantly_hide == 1 ){
			ps.animate({'height':'0','margin':'-10', 'opacity':'0.0'}, 100, function(){
				ps.remove();
			});
		
		} else {
			rm.css({'opacity':'0'});
			ps.css({'opacity':'0.8'});
		}


		$.ajax({
			url: "./?do_action=ticketbox_mg_post_remove&post_id="+post_id

		}).done(function( html ) {
			
			if( html == 'OK' ){
				ps.animate({'height':'0','margin':'-10', 'opacity':'0.0'}, 200, function(){
					ps.remove();
				});
			
			} else if( html == 'NULL' ){
				location.href = './?page=admin&cp=ticketbox_mg';

			} else {
				rm.css({'opacity':'1'});
				// ps.css({'opacity':'1'});
			}

		});

	});

});




