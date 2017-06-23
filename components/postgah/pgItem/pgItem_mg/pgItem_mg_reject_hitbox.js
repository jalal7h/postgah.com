
jQuery(document).ready(function($) {
	
	$("body").delegate( ".pgItem_mg_reject_hitbox", "submit", function( e ) {
		
		item_id = $(this).attr('item_id');
		text = $(this).find('textarea').val();


		if( text == '' ){
			//
		
		} else {
			
			$.ajax({
				url: _URL+'/?do_action=pgItem_mg_reject&item_id='+item_id,
				type: 'POST',
				data: {'text': text},
			
			}).done(function( html ) {
				cl( html );
				location.href = '';
			});
			
		}

		e.preventDefault();
		return false;
		
	});
	
});

