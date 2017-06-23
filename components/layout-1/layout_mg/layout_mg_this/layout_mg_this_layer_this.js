
jQuery(document).ready(function($) {
	
	// set flag
	$('.layout_mg_this_layer > .tools > a.flag').on('click', function(e){
		$(this).toggleClass('off');
		$(this).parent().parent().toggleClass('layout_mg_this_layer_off');

		$.ajax({
			url: './?do_action=layout_mg_this_layer_this_setflag&id=' + $(this).attr('layer_id'),
		}).done(function(){
			cl('done');

		}).fail(function() {
			$(this).toggleClass('off');
			$(this).parent().parent().toggleClass('layout_mg_this_layer_off');
		});
		
	});

	// remove
	$('.layout_mg_this_layer > .tools > a.remove').on('click', function(e){
		if( confirm( $(this).attr('text_remove') ) ){
			
			the_layer = $(this).parent().parent();

			$.ajax({
				url: './?do_action=layout_mg_this_layer_this_remove&id=' + $(this).attr('layer_id'),
			
			}).done(function( html ){
				if( html == "OK" ){
					the_layer.hide();
				} else {
					// the_layer.show();
					alerty( html );
				}
			});

		}
	});


});

